<?php
/**
 * ShopEx licence
 *
 * @copyright  Copyright (c) 2005-2010 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license  http://ecos.shopex.cn/ ShopEx License
 */


class friends_mdl_content extends dbeav_model{
    var $has_tag = true;
    // var $defaultOrder = array('regtime','DESC');
    var $has_many = array(
        'praise'=>'praise:append:msg_id^msg_id',
        'comment'=>'comment:append:msg_id^msg_id',
    );

    var $subSdf = array(
        'delete' => array(
                'praise'=>array('*'),
                'comment'=>array('*'),
        ),
    );

    function __construct($app){
        parent::__construct($app);
       
    }
    //生成唯一id
    function gen_id(){
        return md5(rand(0,9999).microtime());
    }
    /*
    删除前删除七牛配置信息
     */
    /*public function pre_recycle($filter=array()){
      // suf_recycle  删除后的处理
        // if (!$filter){
        //     $filter = $_GET['p'][0];
        //     $this->del_qiniu($filter);
        // }
        // error_log(var_export($filter, true), 3,'log/ffflisis.log');
        foreach ($filter as $key => $value) {
             $this->del_qiniu($value['msg_id']);
        }
        return true;
    }*/

    /*
    删除回收站后删除七牛相关
     */
    public function pre_delete($data){
        $this->recy_qiniu($data);
        return true;
    }
    /*
    回收站数据删除时，删除七牛相关视频图片信息
     */
    public function recy_qiniu($msg_item)
    {
        $qiniu = kernel::single('qiniu_base');
        $domain = app::get('qiniu')->getConf('domain');
        if ($msg_item['imges']) {
          foreach ($msg_item['imges'] as &$im_item) {
            $is_img=strpos($im_item,$domain);
            if ($is_img!==false) {
              $im_item=str_replace($domain,'',$im_item);
              $qiniu->del($im_item);
            }
          }
        }
        $is_qiniu=strpos($msg_item['video'],$domain);
        if ($is_qiniu!==false) {
          $recover['video']=str_replace($domain,'',$msg_item['video']);
          $qiniu->del($recover['video']);
        }
        $is_tul=strpos($msg_item['thumbnail'],$domain);
        if ($is_tul!==false) {
          $recover['thumbnail']=str_replace($domain,'',$msg_item['thumbnail']);
          $qiniu->del($recover['thumbnail']);
        }
        return true;
    }
    /**
     * 根据博文id删除博文与七牛相关的视频图片信息
     * @param string $value [description]
     */
    public function del_qiniu($msg_id)
    {
        $qiniu = kernel::single('qiniu_base');
        $domain = app::get('qiniu')->getConf('domain');
        $msg_item=$this->getRow('imges,video,thumbnail',array('msg_id'=>$msg_id));
        // error_log(var_export($msg_item,true),3,'log/msg_item.log');
        if ($msg_item) {
           if ($msg_item['imges']) {
               foreach ($msg_item['imges'] as &$im_item) {
                $is_img=strpos($im_item,$domain);
                   if ($is_img!==false) {
                       $im_item=str_replace($domain,'',$im_item);
                       $qiniu->del($im_item);
                   }
               }
               // $recover['imges']=$msg_item['imges'];
           }
           $is_qiniu=strpos($msg_item['video'],$domain);
           if ($is_qiniu!==false) {
               $recover['video']=str_replace($domain,'',$msg_item['video']);
                $qiniu->del($recover['video']);
           }
           $is_tul=strpos($msg_item['thumbnail'],$domain);
           if ($is_tul!==false) {
               $recover['thumbnail']=str_replace($domain,'',$msg_item['thumbnail']);
               $qiniu->del($recover['thumbnail']);
           }
            return true;
        }else{
            return false;
        }
    }

}
