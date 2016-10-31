<?php
class friends_finder_member{

    var $pagelimit = 10;

    public function __construct($app)
    {
        $this->app = $app;
        $this->controller = app::get('b2c')->controller('admin_member');
        $this->column_uname = app::get('b2c')->_('用户名');
        $this->column_email = app::get('b2c')->_('EMAIL');
        $this->column_mobile = app::get('b2c')->_('手机');
        $this->userObject = kernel::single('b2c_user_object');
    }


    var $column_uname_order = 11;
    public function column_uname($row){
        $pam_member_info = $this->userObject->get_members_data(array('account'=>'login_account'),$row['member_id']);
        $name_type=$pam_member_info['account'];
         $this->pam_member_info[$row['member_id']] = $pam_member_info;
        if ($name_type['local'] && !empty($name_type['login_account'])) {
            return $name_type['local'];
        }
        if ($name_type['mobile'] && !empty($name_type['mobile'])) {
            return $name_type['mobile'];
        } 

        if ($name_type['thired'] && empty($name_type['login_account'])) {
            return $name_type['thired'];
        }
         if ($name_type['email'] && !empty($name_type['email'])) {
            return $name_type['email'];
        }
       
        // return $pam_member_info['account']['local'];
    }

    var $column_email_order = 12;
    public function column_email($row){
        if(!$this->pam_member_info[$row['member_id']]){
            $pam_member_info = $this->userObject->get_members_data(array('account'=>'login_account'),$row['member_id']);
        }else{
            $pam_member_info = $this->pam_member_info[$row['member_id']];
        }
        return $pam_member_info['account']['email'];
    }

    var $column_mobile_order = 13;
    public function column_mobile($row){
        if(!$this->pam_member_info[$row['member_id']]){
            $pam_member_info = $this->userObject->get_members_data(array('account'=>'login_account'),$row['member_id']);
        }else{
            $pam_member_info = $this->pam_member_info[$row['member_id']];
        }
        return $pam_member_info['account']['mobile'];
    }

}

