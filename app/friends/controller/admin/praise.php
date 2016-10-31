<?php
class friends_ctl_admin_praise extends desktop_controller{
     public function __construct($app)
    {
        parent::__construct($app);
        header("cache-control: no-store, no-cache, must-revalidate");
    }

   function index(){
        // $custom_actions[] = array('label'=>app::get('friends')->_('审核'),'href'=>'index.php?app=friends&ctl=admin_content&act=add','target'=>'_blank');
        // $custom_actions[] =  array('label'=>app::get('friends')->_('编辑仓库'),'submit'=>'index.php?app=friends&ctl=admin_content&act=store_add','target'=>'dialog::{title:\''.app::get('b2c')->_('编辑仓库').'\',width:700,height:400}');
        $actions_base['actions'] = $custom_actions;
        $actions_base['allow_detail_popup'] = true;
        $actions_base['use_buildin_set_tag'] = true;
        $actions_base['use_buildin_export'] = true;
        $actions_base['use_buildin_filter'] = true;
        $actions_base['use_view_tab'] = true;

        $this->finder('friends_mdl_praise',$actions_base);

    }

}