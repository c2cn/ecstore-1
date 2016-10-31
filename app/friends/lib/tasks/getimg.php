<?php
/*
*e助erp商品库存同步
*/
class friends_tasks_getimg extends base_task_abstract implements base_interface_task
{
    public function exec($params=null){
    	$content_mdl=app::get('friends')->model('content');
    	// $friends_list=$content_mdl->getList('*',array('is_video'=>'true','persistentId|noequal'=>null,'thumbnail|nequal'=>null));
        $pat_qiniu_url='http://api.qiniu.com/status/get/prefop?id=';
        $core_http = kernel::single('base_httpclient'); 
        $domain = app::get('qiniu')->getConf('domain');
        $sql="select msg_id,persistentId,thumbnail from sdb_friends_content where is_video='true' and persistentId is not NULL and thumbnail is NULL";
        $friends_list=kernel::database()->select($sql);
         // error_log(var_export($friends_list, true), 3,'log/friends_list.log');
        foreach ($friends_list as $key => $value) {
            $geturl=$pat_qiniu_url.$value['persistentId'];
            $pic_json=$core_http->get($geturl);
            $pics=$this->object_array(json_decode($pic_json));
            if ($pics['id']==$value['persistentId']) {
                if (isset($pics['items'][1]['key'])) {
                    $thumbnail_url=$domain.$pics['items'][1]['key'];
                    $content_mdl->update(array('thumbnail'=>$thumbnail_url),array('msg_id'=>$value['msg_id']));
                }
            }

        }
    }
    public function object_array($array) {
        
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
}
