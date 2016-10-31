<?php
class friends_finder_comment{
    var $detail_edit = '详情';
    public $detail_edit_order = COLUMN_IN_HEAD;
    public $detail_edit_width = 30;
    public function detail_edit($id){
        $render = app::get('friends')->render(); 
        $comment_mdl=app::get('friends')->model('comment');
        $comment_info=$comment_mdl->getRow('*',array('comment_id'=>$id));

        $forcomlist=$comment_mdl->getList('*',array('for_comment_id'=>$id));
        
        $render->pagedata['comment'] = $comment_info;
        $render->pagedata['forcomlist'] = $forcomlist;
        return $render->display('admin/commentdetail.html');
    }

}

