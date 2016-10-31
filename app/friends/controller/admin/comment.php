<?php
class friends_ctl_admin_comment extends desktop_controller{
     public function __construct($app)
    {
        parent::__construct($app);
        header("cache-control: no-store, no-cache, must-revalidate");
    }

   function index(){
        $shenhe= app::get('friends')->getConf('friends.comment_setting');
        if ($shenhe=='true') {
            $custom_actions[] = array('label'=>app::get('friends')->_('审核发布'),'submit'=>'index.php?app=friends&ctl=admin_comment&act=pub','target'=>'refresh'); 
            $custom_actions[] = array('label'=>app::get('friends')->_('取消审核'),'submit'=>'index.php?app=friends&ctl=admin_comment&act=pub_del','target'=>'refresh');
        }
        $custom_actions[] = array('label'=>app::get('friends')->_('是否开启评论审核'),'href'=>'index.php?app=friends&ctl=admin_comment&act=setting','target'=>'dialog::{title:\''.app::get('b2c')->_('是否开启评论审核').'\',width:700,height:400}');
        $actions_base['orderBy'] = 'comment_id desc';
        $actions_base['base_filter'] =array('for_comment_id' => 0);
        $actions_base['title'] ='评论列表';
        $actions_base['actions'] = $custom_actions;
        $actions_base['allow_detail_popup'] = true;
        $actions_base['use_buildin_set_tag'] = true;
        $actions_base['use_buildin_export'] = true;
        $actions_base['use_buildin_filter'] = true;
        $actions_base['use_view_tab'] = true;
        $this->finder('friends_mdl_comment',$actions_base);
    }
    function _views(){
        $comment_mdl = app::get('friends')->model('comment');
        //全部
        $all_filter = array('for_comment_id'=>0);
        $today_reg = $comment_mdl->count($all_filter);
        $sub_menu[0] = array('label'=>app::get('friends')->_('全部'),'optional'=>true,'filter'=>$all_filter,'addon'=>$today_reg,'href'=>'index.php?app=friends&ctl=admin_comment&act=index&view=0&view_from=dashboard');
        $succ_filter = array(
                'display'=>'false',
                'for_comment_id'=>0,
                );
        $succ_reg = $comment_mdl->count($succ_filter);
        $sub_menu[1] = array('label'=>app::get('friends')->_('待审核'),'optional'=>true,'filter'=>$succ_filter,'addon'=>$succ_reg,'href'=>'index.php?app=friends&ctl=admin_comment&act=index&view=1&view_from=dashboard');
         $fail_filter = array(
                'display'=>'true',
                'for_comment_id'=>0,
                );
        $fail_reg = $comment_mdl->count($fail_filter);
        $sub_menu[2] = array('label'=>app::get('friends')->_('已审核'),'optional'=>true,'filter'=>$fail_filter,'addon'=>$fail_reg,'href'=>'index.php?app=friends&ctl=admin_comment&act=index&view=2&view_from=dashboard');

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
    public function setting()
    {   
        $this->begin('index.php?app=friends&ctl=admin_comment&act=index');
        if ($_POST) {
            app::get('friends')->setConf('friends.comment_setting',$_POST['comment_setting']);
            $this->end(true, app::get('friends')->_('操作成功！'));
        }
        $this->pagedata['comment_setting'] = app::get('friends')->getConf('friends.comment_setting');
        $this->display('admin/commentsetting.html');
    }
    public function pub()
    {
        $comment_mdl=app::get('friends')->model('comment');
        // echo "<pre>";print_r($_POST);die();
        $this->begin('index.php?app=friends&ctl=admin_comment&act=index');
        $friend_list=$comment_mdl->getList("*",$_POST);
         #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                $olddata =$friend_list;
            }
            #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        foreach ($friend_list as $key => $value) {
            $comment_mdl->update(array('display'=>'true','time'=>time()),array('comment_id'=>$value['comment_id']));
        }
        #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                if(method_exists($obj_operatorlogs,'detail_comment_log')){
                    $newdata=$comment_mdl->getList("*",$_POST);
                    $obj_operatorlogs->detail_comment_log($newdata,$olddata);
                }
            }
        #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        $this->end(true, app::get('friends')->_('操作成功！'));
    }
    public function pub_del()
    {
       $comment_mdl=app::get('friends')->model('content');
        // echo "<pre>";print_r($_POST);die();
        $this->begin('index.php?app=friends&ctl=admin_comment&act=index');
        $friend_list=$comment_mdl->getList("*",$_POST);
         #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                $olddata =$friend_list;
            }
            #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        foreach ($friend_list as $key => $value) {
            $comment_mdl->update(array('display'=>'false'),array('comment_id'=>$value['comment_id']));
        }
         #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                if(method_exists($obj_operatorlogs,'detail_comment_log')){
                    $newdata=$comment_mdl->getList("*",$_POST);
                    $obj_operatorlogs->detail_comment_log($newdata,$olddata);
                }
            }
        #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        $this->end(true, app::get('friends')->_('操作成功！'));
    }
    /*
    回复评论
     */
    public function to_reply()
    {
      $this->begin("javascript:finderGroup["."'".$_GET["finder_id"]."'"."].refresh()");
      $comment_id = $_POST['comment_id'];
      $comment = $_POST['reply_content'];
       $comment_mdl=app::get('friends')->model('comment');
       $content_mdl=app::get('friends')->model('content');
      if($comment_id&&$comment){
        $row=$comment_mdl->getRow('*',array('comment_id'=>$comment_id));
        $frient_info=$content_mdl->getRow('msg_id,author_id,author',array('msg_id'=>$row['msg_id']));
         $sdf['for_comment_id'] = $comment_id;
         $sdf['to_id'] = $row['author_id'];
         $sdf['to_uname'] = $row['author'];
         $sdf['msg_id'] = $row['msg_id'];
         $sdf['author_id'] =$frient_info['author_id'];
         $sdf['author'] = $frient_info['author'];
         $sdf['display'] = 'true';
         $sdf['time'] = time();
         $sdf['content'] = $comment;
         #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                    if(method_exists($obj_operatorlogs,'reply_comment')){
                       $obj_operatorlogs->reply_comment($sdf);
                    }
                }
        #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
         $comment_mdl->save($sdf);
         $this->end(true,app::get('b2c')->_('操作成功！'));
      }
      else{
         $this->end(false,app::get('b2c')->_('内容不能为空'));
      }
    }

    /*
    删除评论
     */
    function delete_reply($comment_id){
        $this->begin("javascript:finderGroup["."'".$_GET["finder_id"]."'"."].refresh()");

        $comment_mdl=app::get('friends')->model('comment');
                 #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        $resforlog=$comment_mdl->getRow('*',array('comment_id'=>$comment_id));
        if($comment_mdl->delete(array('comment_id' => $comment_id))){
           #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if($obj_operatorlogs = kernel::service('operatorlog.friends')){
            if(method_exists($obj_operatorlogs,'delete_comment')){
                $obj_operatorlogs->delete_comment($resforlog);
            }
        }
        #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            $this->end(true,app::get('b2c')->_('操作成功'));
        }
        else{
            $this->end(fasle,app::get('b2c')->_('操作失败'));
        }
    }

}