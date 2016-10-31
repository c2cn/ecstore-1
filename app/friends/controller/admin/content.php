<?php
class friends_ctl_admin_content extends desktop_controller{
     public function __construct($app)
    {
        parent::__construct($app);
        header("cache-control: no-store, no-cache, must-revalidate");
        $this->admin = $this->user->user_data['account']['login_name'];
    }

   function index(){
        $custom_actions[] = array('label'=>app::get('friends')->_('添加博文'),'href'=>'index.php?app=friends&ctl=admin_content&act=add','target'=>'_blank');
        $shenhe= app::get('friends')->getConf('friends.content_setting');
        if ($shenhe=='true') {
            $custom_actions[] = array('label'=>app::get('friends')->_('审核发布'),'submit'=>'index.php?app=friends&ctl=admin_content&act=pub','target'=>'refresh'); 
            $custom_actions[] = array('label'=>app::get('friends')->_('取消审核'),'submit'=>'index.php?app=friends&ctl=admin_content&act=pub_del','target'=>'refresh');
        }
        if ($_GET['view']==3) {
             $custom_actions[] = array('label'=>app::get('friends')->_('恢复博文'),'submit'=>'index.php?app=friends&ctl=admin_content&act=recover','target'=>'refresh');
        }
        $custom_actions[] = array('label'=>app::get('friends')->_('是否开启朋友圈审核'),'href'=>'index.php?app=friends&ctl=admin_content&act=setting','target'=>'dialog::{title:\''.app::get('b2c')->_('是否开启朋友圈审核').'\',width:700,height:400}'); 
        $actions_base['orderBy'] = 'pubtime desc';
        $actions_base['actions'] = $custom_actions;
        $actions_base['allow_detail_popup'] = true;
        $actions_base['use_buildin_set_tag'] = true;
        $actions_base['use_buildin_export'] = true;
        $actions_base['use_buildin_filter'] = true;
        // $actions_base['use_buildin_recycle'] = true;//系统删除
        $actions_base['use_view_tab'] = true;
        $this->finder('friends_mdl_content',$actions_base);

    }
    function _views(){
        $member_mdl = app::get('friends')->model('content');
        //全部日志
        $all_filter = array('recover'=>'false');
        $today_reg = $member_mdl->count($all_filter);
        $sub_menu[0] = array('label'=>app::get('friends')->_('全部'),'optional'=>true,'filter'=>$all_filter,'addon'=>$today_reg,'href'=>'index.php?app=friends&ctl=admin_content&act=index&view=0&view_from=dashboard');
        //成功
        $succ_filter = array(
                'ifpub'=>'false',
                'recover'=>'false'
                );
        $succ_reg = $member_mdl->count($succ_filter);
        $sub_menu[1] = array('label'=>app::get('friends')->_('待发布'),'optional'=>true,'filter'=>$succ_filter,'addon'=>$succ_reg,'href'=>'index.php?app=friends&ctl=admin_content&act=index&view=1&view_from=dashboard');
        //失败
         $fail_filter = array(
                'ifpub'=>'true',
                'recover'=>'false'
                );
        $fail_reg = $member_mdl->count($fail_filter);
        $sub_menu[2] = array('label'=>app::get('friends')->_('已发布'),'optional'=>true,'filter'=>$fail_filter,'addon'=>$fail_reg,'href'=>'index.php?app=friends&ctl=admin_content&act=index&view=2&view_from=dashboard');
        //删除的
        $recover_filter = array(
                'recover'=>'true',
                );
        $recover_reg = $member_mdl->count($recover_filter);
        $sub_menu[3] = array('label'=>app::get('friends')->_('已删除'),'optional'=>true,'filter'=>$recover_filter,'addon'=>$recover_reg,'href'=>'index.php?app=friends&ctl=admin_content&act=index&view=3&view_from=dashboard');

        ksort($sub_menu);
        $show_menu = $sub_menu;
        foreach($show_menu as $k=>$v){
            if($v['optional']==false){
            }elseif(($_GET['view_from']=='dashboard')&&$k==$_GET['view']){
                $show_menu[$k] = $v;
            }
            // if (!$v['addon']) {unset($show_menu[$k]);}
        }
        return $show_menu;
    }
    /*
    恢复删除的博文
     */
    public function recover()
    {
        $content_mdl=app::get('friends')->model('content');
        // echo "<pre>";print_r($_POST);die();
        $this->begin('index.php?app=friends&ctl=admin_content&act=index');
        $friend_list=$content_mdl->getList("*",$_POST);
        foreach ($friend_list as $key => $value) {
            $content_mdl->update(array('recover'=>'false','pubtime'=>time()),array('msg_id'=>$value['msg_id']));
        }
        $this->end(true, app::get('friends')->_('操作成功！'));
    }
    public function add()
    {
        $this->pagedata['image_dir'] = app::get('image')->res_url;
        $this->pagedata['member_filter'] = array('is_author'=>'true','name|noequal'=>'');
        $this->singlepage('admin/add.html');
    }
    public function setting($value='')
    {
        $this->begin('index.php?app=friends&ctl=admin_content&act=index');
        if ($_POST) {
            app::get('friends')->setConf('friends.content_setting',$_POST['content_setting']);
            $this->end(true, app::get('friends')->_('操作成功！'));
        }
        $this->pagedata['content_setting'] = app::get('friends')->getConf('friends.content_setting');
        $this->display('admin/friend_setting.html');
    }
    public function pub()
    {
        $content_mdl=app::get('friends')->model('content');
        // echo "<pre>";print_r($_POST);die();
        $this->begin('index.php?app=friends&ctl=admin_content&act=index');
        $friend_list=$content_mdl->getList("*",$_POST);
        foreach ($friend_list as $key => $value) {
            $content_mdl->update(array('ifpub'=>'true','pubtime'=>time()),array('msg_id'=>$value['msg_id']));
        }
        $this->end(true, app::get('friends')->_('操作成功！'));
    }
    public function pub_del()
    {
       $content_mdl=app::get('friends')->model('content');
        // echo "<pre>";print_r($_POST);die();
        $this->begin('index.php?app=friends&ctl=admin_content&act=index');
        $friend_list=$content_mdl->getList("*",$_POST);
        foreach ($friend_list as $key => $value) {
            $content_mdl->update(array('ifpub'=>'false'),array('msg_id'=>$value['msg_id']));
        }
        $this->end(true, app::get('friends')->_('操作成功！'));
    }
    public function save()
    {   
		$this->begin('index.php?app=friends&ctl=admin_content&act=index');
		$back_url='index.php?app=friends&ctl=admin_content&act=index';
		$pat_qiniu_url='http://api.qiniu.com/status/get/prefop?id=';
		$core_http = kernel::single('base_httpclient');
        $data=array();
       //视频上传
        // print_r($_FILES);
        $file=$_FILES['video'];
        if ($_POST['is_video']=='true') {
            if ($_POST['video_link']=='' || empty($_POST['video_link'])) {
                 if (empty($_FILES['video'])) {
                $this->end(false, app::get('friends')->_('图片上传错误，请稍后重试！!'),$back_url);
                }
                if ($_FILES['video']['size'] > 15728640) {
                    $this->end(false, app::get('friends')->_('上传文件不能超过15M！'),$back_url);
                }
                if ($_FILES['video']['error'] != 0 || $_FILES['video']['name'] == '') {
                    $this->end(false, app::get('friends')->_('图片上传错误，请稍后重试！!'),$back_url);
                }
                $type = array("AVI", "wma", "rmvb", "rm", "flash", "mp4","mid","3GP");
                if (!in_array(strtolower($this->fileext($_FILES['video']['name'])), $type)) {
                    $text = implode(",", $type);
                    $this->end(false, app::get('friends')->_('您只能上传以下类型文件') . $text,$back_url);
                }
                // $vidio_pyth=$this->mkfile_path($file["tmp_name"],$file["name"]);
                $vidio_pyth=$this->mkfile_path($_FILES['video']['tmp_name'],$file["name"]);
                $data['video']=$vidio_pyth['url'];
                $data['persistentId']=$vidio_pyth['persistentId'];
                //获取缩略图地址
                $geturl=$pat_qiniu_url.$vidio_pyth['persistentId'];
                $pic_json=$core_http->get($geturl);
                 // error_log(var_export($pic_json, true), 3,'log/pic_json.log');
                $pics=$this->object_array(json_decode($pic_json));
                if (isset($pics['items'][1]['key'])) {
                    $data['thumbnail']=$pics['items'][1]['key'];
                }
            }else{
                  $data['video']=$_POST['video_link'];
            }
           
        }
        $content_mdl=app::get('friends')->model('content');
        $data['content']=$this->br2nl($_POST['content']);
        $data['pubtime']=time();
        $data['ifpub']=$_POST['ifpub'];
        $data['links']=$_POST['links'];
        if (!empty($_POST['thumbnail'])) {
             
             $data['thumbnail']=base_storager::image_path($_POST['thumbnail']);
        }
        //视频信息
        $data['is_video']=$_POST['is_video'];
        $data['imges']=$_POST['goods']['images'];
         // error_log(var_export($params, true), 3,'log/params_iss.log');
        if (empty($data['content']) && empty($data['imges']) && empty($data['video']) ) {
            $this->end(false, app::get('friends')->_('添加失败，内容不能为空!'),$back_url);
        }
       if (!empty($_POST['msg_id']) && $_POST['msg_id']>0) {
          $data['msg_id']=$_POST['msg_id'];
       }
       /*增加用会员对象发表信息*/
       if ($_POST['author_id']) {
            $data['author_id']=$_POST['author_id'];
            $members_opj=app::get('b2c')->model('members');
            $member_temp=$members_opj->getRow('member_id,name',array('member_id'=>$_POST['author_id']));
            $data['author']=$member_temp['name'];
       }else{
             $this->end(false, app::get('friends')->_('添加失败!'),$back_url);
            // $data['author_id']=0;
            // $data['author']=$this->admin;
       }
        #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if($obj_operatorlogs = kernel::service('operatorlog.friends')){
            if(method_exists($obj_operatorlogs,'detail_edit_log')){
                $obj_operatorlogs->detail_edit_log($data,$data['msg_id']);
            }
        }
        // error_log(var_export($_FILES, true), 3,'log/_FILES.log');
        $is_save=$content_mdl->save($data);
        if ($is_save) {
            $this->end(true, app::get('friends')->_('添加成功!'),$back_url);
        }else{
            $this->end(false, app::get('friends')->_('添加失败!'),$back_url);
        }
        
        
    }
    function br2nl($string)
    {
        $string=trim($string);
        $string1=preg_replace('/\<br(.*?)?\/?\>/i', "\n", $string);
        $string2=strip_tags($string1);
        $string3=str_replace("&nbsp;",'',$string2);
        return $string3;
    }
    public function edit()
    {   
        $content_mdl=app::get('friends')->model('content');
        $content_info=$content_mdl->getRow('*',array('msg_id'=>$_GET['msg_id']));
        $this->pagedata['content'] = $content_info;
        $imges=$content_info['imges'];
        foreach ($imges as $key => $value) {
            $newimgs[]['image_id']=$value;
        }
        $this->pagedata['member_filter'] = array('is_author'=>'true','name|noequal'=>'');
        $this->pagedata['goods']['images'] = $newimgs;
        $this->pagedata['image_dir'] = app::get('image')->res_url;
        $this->pagedata['author_id'] =$content_info['author_id'];
        $this->singlepage('admin/add.html');
    }
    public function mkfile_path($tmp_name,$name,$use_qiniu=ture)
    {   
        $paths="public/app/friends/video/";
        $pat_qiniu_url='http://api.qiniu.com/status/get/prefop?id=';
        $domain = app::get('qiniu')->getConf('domain');
        $tiems=app::get('friends')->model('content')->gen_id();
        $result=array();
        // $tiems=time();
        if (is_dir($paths)) {
             move_uploaded_file($tmp_name,$paths."/" .$tiems.$name);
        }else{
            mkdir($paths, 0777, true);
            move_uploaded_file($tmp_name,$paths."/" .$tiems.$name);
        }
        // add by andy 2016-02-03 增加七牛云存储 start
        $file=$paths.$tiems.$name;
        if(app::get('qiniu')->getConf('enable') === 'true' && $use_qiniu){
            $qiniu = kernel::single('qiniu_base');
            $qiniu_result = $qiniu->upvideo($file,$file);
               // error_log(var_export($qiniu_result, true), 3,'log/qiniu_result.log');
            if($qiniu_result != false){
                $url = $domain.$qiniu_result['key'];
                $result['persistentId']=$qiniu_result['persistentId'];
            }else{
                $url=$paths."/" .$tiems.$name;
            }
        }else{
             $url=$paths."/" .$tiems.$name;
        }
        if (substr($url,0,4)=='http') {
            if (file_exists($file)) {
               unlink($file);
            }
            
        }
          // error_log(var_export($result, true), 3,'log/result.log');
        $result['url']=$url;
        
        return $result;
        // return $paths."/" .$tiems.$name;
        
    }
   
    function object_array($array) {
        
        if (is_object($array)) {
            $array = (array)$array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = $this->object_array($value);
            }
        }
        return $array;
    }
    //检测视频格式
    private function fileext($filename) {
        return substr(strrchr($filename, '.'), 1);
    }

}