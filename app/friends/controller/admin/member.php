<?php
class friends_ctl_admin_member extends desktop_controller{
     var $workground = 'friends.wrokground.friends_member';
     public function __construct($app)
    {
        parent::__construct($app);
        header("cache-control: no-store, no-cache, must-revalidate");
    }

   function index(){
        $custom_actions[] = array('label'=>app::get('friends')->_('设置为作者会员'),'submit'=>'index.php?app=friends&ctl=admin_member&act=add_author','target'=>'refresh');        
        $custom_actions[] = array('label'=>app::get('friends')->_('解除作者会员'),'submit'=>'index.php?app=friends&ctl=admin_member&act=del_author','target'=>'refresh');
        $actions_base['actions'] = $custom_actions;
        $actions_base['allow_detail_popup'] = true;
        $actions_base['use_buildin_set_tag'] = true;
        $actions_base['use_buildin_export'] = true;
        $actions_base['use_buildin_filter'] = false;
        $actions_base['use_buildin_recycle'] = false;//删除按钮
        $actions_base['use_view_tab'] = true;
        $actions_base['orderBy'] = 'regtime desc';
        $this->finder('friends_mdl_members',$actions_base);

    }
    function _views(){
        $member_mdl = app::get('b2c')->model('members');
        //全部日志
        $all_filter = array();
        $today_reg = $member_mdl->count($all_filter);
        $sub_menu[0] = array('label'=>app::get('friends')->_('全部'),'optional'=>true,'filter'=>$all_filter,'addon'=>$today_reg,'href'=>'index.php?app=friends&ctl=admin_member&act=index&view=0&view_from=dashboard');
        //成功
        $succ_filter = array(
                'is_author'=>'true',
                );
        $succ_reg = $member_mdl->count($succ_filter);
        $sub_menu[1] = array('label'=>app::get('friends')->_('作者会员'),'optional'=>true,'filter'=>$succ_filter,'addon'=>$succ_reg,'href'=>'index.php?app=friends&ctl=admin_member&act=index&view=1&view_from=dashboard');
        //失败
         $fail_filter = array(
                'is_author'=>'false',
                );
        $fail_reg = $member_mdl->count($fail_filter);
        $sub_menu[2] = array('label'=>app::get('friends')->_('普通会员'),'optional'=>true,'filter'=>$fail_filter,'addon'=>$fail_reg,'href'=>'index.php?app=friends&ctl=admin_member&act=index&view=2&view_from=dashboard');

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
    //设置为作者会员
    public function add_author($value='')
    {
        $members_mdl=app::get('friends')->model('members');
        // echo "<pre>";print_r($_POST);die();
        $this->begin('index.php?app=friends&ctl=admin_member&act=index');
        $member_list=$members_mdl->getList("*",$_POST);
         #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                $olddata =$member_list;
            }
        #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        foreach ($member_list as $key => $value) {
            $members_mdl->update(array('is_author'=>'true'),array('member_id'=>$value['member_id']));
        }
         #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                if(method_exists($obj_operatorlogs,'detail_addauthor_log')){
                    $newdata=$members_mdl->getList("*",$_POST);
                    $obj_operatorlogs->detail_addauthor_log($newdata,$olddata);
                }
            }
        #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        $this->end(true, app::get('friends')->_('操作成功！'));
        
    }
    public function del_author($value='')
    {
        $members_mdl=app::get('friends')->model('members');
        // echo "<pre>";print_r($_POST);die();
        $this->begin('index.php?app=friends&ctl=admin_member&act=index');
        $member_list=$members_mdl->getList("*",$_POST);
         #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                $olddata =$member_list;
            }
        #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        foreach ($member_list as $key => $value) {
            $members_mdl->update(array('is_author'=>'false'),array('member_id'=>$value['member_id']));
        }
        #↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓记录管理员操作日志@lujy↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if($obj_operatorlogs = kernel::service('operatorlog.friends')){
                if(method_exists($obj_operatorlogs,'detail_addauthor_log')){
                    $newdata=$members_mdl->getList("*",$_POST);
                    $obj_operatorlogs->detail_addauthor_log($newdata,$olddata);
                }
            }
        #↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑记录管理员操作日志@lujy↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        $this->end(true, app::get('friends')->_('操作成功！'));
    }

}
