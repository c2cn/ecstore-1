<?php
class friends_finder_content{
	var $column_control = '操作';
    function column_control($row){
          // echo "<pre>";print_r($row);die();
    	 $temp= ' <a href="index.php?app=friends&ctl=admin_content&act=edit&msg_id='.$row['msg_id'].'"  " target="_blank" >编辑</a>';
    	return $temp;
    }
    var $detail_edit = '详情';
    public $detail_edit_order = COLUMN_IN_HEAD;
    public $detail_edit_width = 30;
    public function detail_edit($id){
        $render = app::get('friends')->render(); 
        $friends_mdl=app::get('friends')->model('content');

        $content_info=$friends_mdl->getRow('*',array('msg_id'=>$id));
        $render->pagedata['content'] = $content_info;
        $imges=$content_info['imges'];
        // echo "<pre>";print_r($imges);die();
        foreach ($imges as $key => $value) {
            $newimgs[]['image_id']=$value;
        }

        $render->pagedata['goods']['images'] = $newimgs;
        // echo "<pre>";print_r($content_info);die();
        return $render->display('admin/detail.html');
    } 
     var $column_control2 = '是否有缩略图';
    function column_control2($row){
       $msg_id=$row['msg_id'];
       $friends_mdl=app::get('friends')->model('content');
       $content_info=$friends_mdl->getRow('*',array('msg_id'=>$msg_id));
       if ($content_info['is_video']=='true') {
           if (!empty($content_info['thumbnail'])) {
               return "<span style='color:black'>是</span>";
           }else{
                return "<span style='color:red'>否</span>";
           }
       }else{
            return "无图";
       }
      
      
    }

}

