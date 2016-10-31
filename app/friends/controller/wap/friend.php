<?php
/**
 * ShopEx licence
 *
 * @copyright  Copyright (c) 2005-2013 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license  http://ecos.shopex.cn/ ShopEx License */

class friends_ctl_wap_friend extends wap_frontpage{
    var $seoTag=array('shopname','friend');

    function __construct($app){
        parent::__construct($app);
        $shopname = app::get('wap')->getConf('wap.shopname');
        $this->verify_member();
        $this->pagesize = 2;
        $this->action = $this->_request->get_act_name();
        $this->member = $this->get_current_member();
    }
    public function index($nPage=1)
    {   
        //检测登录
        if ($member_id) {
            # code...
        }
           // echo "<pre>";print_r($this->member);die();
       $friends_mdl=app::get('friends')->model('content');
       $friend_count=$friends_mdl->getList('*',array('ifpub'=>'true'));
       $count = count($friend_count);
        $aPage = $this->get_start($nPage,$count);
        $friend_list= $friends_mdl->getList('*',array('ifpub'=>'true'),$aPage['start'],$this->pagesize,'pubtime desc');
        $params['page'] = $aPage['maxPage'];
        $this->pagination($nPage,$params['page'],'index');
       $local=kernel::base_url(1)."/";
       // echo $local;
       foreach ($friend_list as $key => $value) {
           $friend_list[$key]['video']=$local.$value['video'];
       }
        $this->pagedata['friend_list'] = $friend_list;
        $this->page('wap/friend.html');

    }
    //点赞
    public function praise($msg_id)
    {   
         // echo "<pre>";print_r($_POST);die();
        $praise_mdl=app::get('friends')->model('praise');
        $msg_id=$_POST['msg_id'];
        $pratype=$_POST['pratype']?$_POST['pratype']:'true';
        $date=array();
        $date['author_id']=$this->member['member_id'];
        $date['author']=$this->member['local_uname'];
        $date['msg_id']=$msg_id;
        $date['time']=time();
        $date['pratype']='true';
        $date['ip']=base_request::get_remote_addr();

        $fams= array('suc' => '成功','file' => '失败');
        $state=$praise_mdl->save($date);
        if ($state) {
             echo json_encode($fams['suc']);
        }else{
            echo json_encode($fams['file']);
        }
       

        
    }
    //评论
    public function comment($value='')
    {
        # code...
    }
        /*
     *本控制器公共分页函数
     * */
    function pagination($current,$totalPage,$act,$arg='',$app_id='friends',$ctl='wap_friend'){ //本控制器公共分页函数
        if (!$arg){
            $this->pagedata['pager'] = array(
                'current'=>$current,
                'total'=>$totalPage,
                'link' =>$this->gen_url(array('app'=>$app_id, 'ctl'=>$ctl,'act'=>$act,'args'=>array(($tmp = time())))),
                'token'=>$tmp,
                );
        }else{
            $arg = array_merge($arg, array(($tmp = time())));
            $this->pagedata['pager'] = array(
                'current'=>$current,
                'total'=>$totalPage,
                'link' =>$this->gen_url(array('app'=>$app_id, 'ctl'=>$ctl,'act'=>$act,'args'=>$arg)),
                'token'=>$tmp,
                );
        }
    }

    function get_start($nPage,$count){
        $maxPage = ceil($count / $this->pagesize);
        if($nPage > $maxPage) $nPage = $maxPage;
        $start = ($nPage-1) * $this->pagesize;
        $start = $start<0 ? 0 : $start;
        $aPage['start'] = $start;
        $aPage['maxPage'] = $maxPage;
        return $aPage;
    }

}

