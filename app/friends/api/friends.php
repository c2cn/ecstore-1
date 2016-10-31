<?php
/**
 * 七牛云存储api
 */

class mobileapi2_rpc_friends extends mobileapi_frontpage
{
    
    /**
     * 构造方法
     * @param object application
     */
    public function __construct()
    {
        Header("Access-Control-Allow-Origin:*");//添加跨域解析 binbin_song 2016.9.22
		$this->app->rpcService = kernel::single('base_rpc_service');
        $this->content_setting=app::get('friends')->getConf('friends.content_setting');
        $this->comment_setting=app::get('friends')->getConf('friends.comment_setting');
        $this->pagesize =10;
    }
    public function friendlisttext($value='')
    {
    	$lists=array(
    		'0'=>array(
    				'content'=>"我的第一条朋友圈",
    				'imgs'=>array(
    					// '0'=>'https://ss0.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=1984953868,1942880379&fm=21&gp=0.jpg',
    					// '1'=>'https://ss0.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=1984953868,1942880379&fm=21&gp=0.jpg',
    					// '2'=>'https://ss0.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=1984953868,1942880379&fm=21&gp=0.jpg',
    					),
                     'type'=>'1',
    				'video'=>'http://mvvideo2.meitudata.com/56e823637ec8e7196.mp4',
    				'head_pic'=>'http://f3.topitme.com/3/46/03/11875446195c803463m.jpg',
    				'author'=>'张三',
    				'time'=>'1429632000',
    				'discuss'=>array(
    					'0'=>array(
    						'author'=>'李莎莎',
    						'reply'=>'哈哈哈哈，我看到了你的',

    						),
    					'1'=>array(
    						'author'=>'王珊珊',
    						'reply'=>'呵呵呵呵，我也看到了',

    						),
    					'2'=>array(
    						'author'=>'张甜甜',
    						'reply'=>'呼呼呼，我睡着了',

    						),

    					),
    			),
			'1'=>array(
    				'content'=>"我的天马行空",
    				'imgs'=>array(
    					'0'=>'http://f10.topitme.com/m/201012/27/12934524535787.jpg',
    					'1'=>'http://f10.topitme.com/m/201012/27/12934524535787.jpg',
    					'2'=>'http://f4.topitme.com/4/21/a9/1192966838a0aa9214m.jpg',
    					),
                    // 'video'=>'http://js.t.sinajs.cn/t5/album/static/swf/video/player.swf?v1441960309059836241438531542',
                     'type'=>'2',
    				'video'=>'',
    				'head_pic'=>'http://f10.topitme.com/m/201007/15/12792052807248.jpg',
    				'author'=>'一世幸福',
    				'time'=>'1458807638',
    				'discuss'=>array(
    					'0'=>array(
    						'author'=>'留级生',
    						'reply'=>'除了我，没有人会爱你的，，，',

    						),

    					),
    			),
			'2'=>array(
    				'content'=>"这是一个大图的动态",
    				'imgs'=>array(
    					'0'=>'http://i10.topitme.com/m014/1001491939caee8d4d.jpg',

    					),
                    // 'video'=>'http://js.t.sinajs.cn/t5/album/static/swf/video/player.swf?v1441960309059836241438531542',
                     'type'=>'2',
    				'video'=>'',
    				'head_pic'=>'http://f5.topitme.com/5/b3/fd/1100477378f4ffdb35m.jpg',
    				'author'=>'李明浩',
    				'time'=>'1458807612',
    				'discuss'=>array(
    					'0'=>array(
    						'author'=>'丽水市',
    						'reply'=>'好犀利啊',

    						),
    					'1'=>array(
    						'author'=>'kkss',
    						'reply'=>'厉害，翻译楼上的话',

    						),

    					),
    			),
            '3'=>array(
                    'content'=>"传说这是一张就吐的动态啊，我的天啊，这么神奇吗",
                    'imgs'=>array(
                        '0'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        '1'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        '2'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        '3'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        '4'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        '5'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        '6'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        '7'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        '8'=>'http://f9.topitme.com/9/56/91/1149266613c4391569m.jpg',
                        // '9'=>'http://img2.imgtn.bdimg.com/it/u=2467961932,3145903982&fm=21&gp=0.jpg',

                        ),
                    // 'video'=>'http://js.t.sinajs.cn/t5/album/static/swf/video/player.swf?v1441960309059836241438531542',
                     'type'=>'2',
                    'video'=>'',
                    'head_pic'=>'http://fb.topitme.com/b/f7/b1/1120420012039b1f7bm.jpg',
                    'author'=>'王九龙',
                    'time'=>'1458807612',
                    'discuss'=>array(
                        '0'=>array(
                            'author'=>'事实上',
                            'reply'=>'呵呵呵，我看到了什么',

                            ),
                        '1'=>array(
                            'author'=>'哦哦哦哦哦',
                            'reply'=>'不要啊，原谅我的眼镜，，，天呢',

                            ),

                        ),
                ),
            '4'=>array(
                    'content'=>"历史在那换个图再这样网页上可与得啊，玩两张图也是可以的嘛",
                    'imgs'=>array(
                        '0'=>'http://f6.topitme.com/6/22/2d/11425766908822d226m.jpg',
                        '1'=>'http://ff.topitme.com/f/5c/4e/114537396707b4e5cfm.jpg',

                        ),
                    // 'video'=>'http://js.t.sinajs.cn/t5/album/static/swf/video/player.swf?v1441960309059836241438531542',
                     'type'=>'2',
                    'video'=>'',
                    'head_pic'=>'http://f7.topitme.com/7/ee/83/1131603552d4383ee7m.jpg',
                    'author'=>'没人评',
                    'time'=>'1458807612',
                    'discuss'=>array(
                        // '0'=>array(
                        //     'author'=>'事实上',
                        //     'reply'=>'呵呵呵，我看到了什么',

                        //     ),
                        // '1'=>array(
                        //     'author'=>'哦哦哦哦哦',
                        //     'reply'=>'不要啊，原谅我的眼镜，，，天呢',

                        //     ),

                        ),
                ),
                 '5'=>array(
                    'content'=>"我只是想见见淡淡的发一条朋友圈，，，，哈哈哈哈，亚UN累死啦连商品asdpasdkpaskpl原谅我拔丝卡萨丁拉上了安东的声卡是打算拉伸度搜好手法哦的说法是佛罗说法罚款喀什考虑考虑三角阀就分开打算挨打的刻录机拉丝机打就发一条朋友圈，，，，哈哈哈哈，亚UN累死啦连商品asdpasdkpaskpl原谅我拔丝卡萨丁拉上了安东的声卡是打算拉伸度搜好手法哦的说法是佛罗说法罚款喀什考虑考虑三角阀就分开打算挨打的刻录机拉丝机打就发一条朋友圈，，，，哈哈哈哈，亚UN累死啦连商品asdpasdkpaskpl原谅我拔丝卡萨丁拉上了安东的声卡是打算拉伸度搜好手法哦的说法是佛罗说法罚款喀什考虑考虑三角阀就分开打算挨打的刻录机拉丝机打就发一条朋友圈，，，，哈哈哈哈，亚UN累死啦连商品asdpasdkpaskpl原谅我拔丝卡萨丁拉上了安东的声卡是打算拉伸度搜好手法哦的说法是佛罗说法罚款喀什考虑考虑三角阀就分开打算挨打的刻录机拉丝机打就发一条朋友圈，，，，哈哈哈哈，亚UN累死啦连商品asdpasdkpaskpl原谅我拔丝卡萨丁拉上了安东的声卡是打算拉伸度搜好手法哦的说法是佛罗说法罚款喀什考虑考虑三角阀就分开打算挨打的刻录机拉丝机打就发一条朋友圈，，，，哈哈哈哈，亚UN累死啦连商品asdpasdkpaskpl原谅我拔丝卡萨丁拉上了安东的声卡是打算拉伸度搜好手法哦的说法是佛罗说法罚款喀什考虑考虑三角阀就分开打算挨打的刻录机拉丝机打就打",
                    'imgs'=>array(
                        // '0'=>'http://img4.imgtn.bdimg.com/it/u=1809442422,1016023570&fm=21&gp=0.jpg',
                        // '1'=>'http://img3.imgtn.bdimg.com/it/u=527872171,840364706&fm=21&gp=0.jpg',

                        ),
                    // 'video'=>'http://js.t.sinajs.cn/t5/album/static/swf/video/player.swf?v1441960309059836241438531542',
                     'type'=>'2',
                    'video'=>'',
                    'head_pic'=>'http://f3.topitme.com/3/88/32/116194364611f32883m.jpg',
                    'author'=>'lsksl',
                    'time'=>'1458807612',
                    'discuss'=>array(
                        '0'=>array(
                            'author'=>'玛萨玛索',
                            'reply'=>'不，，我只来凑个热闹的',

                            ),
                        '1'=>array(
                            'author'=>'青青青',
                            'reply'=>'我叫去去去去去去去去去去',

                            ),

                        ),
                ),
                '5'=>array(
                    'content'=>"",
                    'imgs'=>array(
                        // '0'=>'http://img4.imgtn.bdimg.com/it/u=1809442422,1016023570&fm=21&gp=0.jpg',
                        // '1'=>'http://img3.imgtn.bdimg.com/it/u=527872171,840364706&fm=21&gp=0.jpg',

                        ),
                    // 'video'=>'http://js.t.sinajs.cn/t5/album/static/swf/video/player.swf?v1441960309059836241438531542',
                    'type'=>'1',
                    'video'=>'http://mvvideo1.meitudata.com/56ebd8195d5c14799.mp4',
                    'head_pic'=>'http://f3.topitme.com/3/88/32/116194364611f32883m.jpg',
                    'author'=>'lsksl',
                    'time'=>'1458807612',
                    'discuss'=>array(
                        '0'=>array(
                            'author'=>'玛萨玛索',
                            'reply'=>'呵呵呵呵是是是是，元素李老师事实上',

                            ),
                        '1'=>array(
                            'author'=>'青青青',
                            'reply'=>'我叫去去去去去去去去去去',

                            ),

                        ),
                ),
    		);
		$data['items']=$lists;
        $pages['maxPage']=3;
        $pages['has_next']=true;
		$data['pages']=$pages;
		return $data;
    }
   public function friendlist($params)
    {
        //检查登录
        $member_id=$params['member_id'];
        // $accesstoken=$params['accesstoken'];
        // $this->check_accesstoken($accesstoken,$member_id);
        $nPage = $params['n_page'] ? $params['n_page'] : 1;
        $content_mdl=app::get('friends')->model('content');
        $total=$content_mdl->count(array('ifpub'=>'true','recover'=>'false'));
        if ($total<1) {
             kernel::single('base_rpc_service')->send_user_error('author_error', '暂无内容！');
        }
        $aPage = $this->get_start($nPage, $total);
        $friendlist=$content_mdl->getList('msg_id,content,author_id,author,pubtime,imges,links,is_video,video,thumbnail',array('ifpub'=>'true','recover'=>'false'),$aPage['start'], $this->pagesize,'pubtime DESC');

        $friendlist=$this->check_video($friendlist,'',$member_id);
        //是否还有下一页
        if($nPage < $aPage['maxPage']){
            $aPage['has_next']=true;
        }else{
            $aPage['has_next']= false;
        }
        $data['items']=$friendlist;
        $data['pages']=$aPage;
        return $data;

    }
    //获取朋友圈个人主页
    /*
    member_id :会员id
    accesstoken :accesstoken
    author_id :作者id，等于0是管理员
    */
    public function personal($params)
    {
        //检查登录
        $member_id=$params['member_id'];
        $accesstoken=$params['accesstoken'];
        $this->check_accesstoken($accesstoken,$member_id);
        $nPage = $params['n_page'] ? $params['n_page'] : 1;
        //检查是否是作者用户
        $members_mdl=app::get('friends')->model('members');

        //获取作者信息
        $filter['author_id']=$params['author_id'];
        $member_info=$members_mdl->getRow('*',array('member_id'=>$params['author_id']));
        if ($member_info['is_author']!='true') {
             kernel::single('base_rpc_service')->send_user_error('author_error', '对不起，该用户暂无发表权限!');
        }
        $filter['ifpub']='true';
        $filter['recover']='false';
        if (empty($params['author_id'])) {
            kernel::single('base_rpc_service')->send_user_error('author_error', '作者id不能为空！');
        }
        $content_mdl=app::get('friends')->model('content');
        $total=$content_mdl->count($filter);
        if ($total<1) {
             kernel::single('base_rpc_service')->send_user_error('author_error', '暂无内容，或者作者不存在！');
        }
        $aPage = $this->get_start($nPage, $total);
        $friendlist=$content_mdl->getList('msg_id,content,author_id,author,pubtime,imges,links,is_video,video,thumbnail',$filter,$aPage['start'], $this->pagesize,'pubtime DESC');
        $author_info['author_id']=$friendlist[0]['author_id'];
        $author_info['author']=$params[$key]['author']=$this->get_member_name($friendlist[0]['author_id']);
       
        $author_info['head_pic']=$this->get_headpic($friendlist[0]['author_id']);
        $friendlist=$this->check_video($friendlist,'personal',$member_id);

        //是否还有下一页
        if($nPage < $aPage['maxPage']){
            $aPage['has_next']=true;
        }else{
            $aPage['has_next']= false;
        }
        $data['items']=$friendlist;
        $data['author_info']=$author_info;
        $data['pages']=$aPage;
        return $data;

    }
    /*
    *查询该博文的点赞列表
    *msg_id :博文id
    */
    public function praiselist($params)
    {
        //检查登录
        $member_id=$params['member_id'];
        $accesstoken=$params['accesstoken'];
        $this->check_accesstoken($accesstoken,$member_id);
        //博文id
        $msg_id=$params['msg_id'];
        $content_mdl=app::get('friends')->model('content');
        $praise_info=$content_mdl->getRow('*',array('msg_id'=>$msg_id));
        if (!$praise_info) {
            kernel::single('base_rpc_service')->send_user_error('praise_error', '内容不存在！');
        }
        $praise_mdl=app::get('friends')->model('praise');
        $praiselist=$praise_mdl->getList('msg_id,author_id,author,pratype',array('msg_id'=>$msg_id,'pratype'=>'true'));
        return $praiselist;
    }
   
    /*
    *赞或者取消赞
    *msg_id :博文id
    */
    public function praise($params)
    {
        //检查登录
        $member_id=$params['member_id'];
        $accesstoken=$params['accesstoken'];
        $this->check_accesstoken($accesstoken,$member_id);
         //博文id
        if (empty($params['msg_id'])) {
            kernel::single('base_rpc_service')->send_user_error('praise_error', '博文id不能为空！');
        }
        $msg_id=$params['msg_id'];
        $content_mdl=app::get('friends')->model('content');
        $praise_info=$content_mdl->getRow('*',array('msg_id'=>$msg_id));
        if (!$praise_info) {
            kernel::single('base_rpc_service')->send_user_error('praise_error', '内容不存在！');
        }
        $praise_mdl=app::get('friends')->model('praise');
        $filter=array('author_id'=>$member_id,'msg_id'=>$msg_id,'pratype'=>'true');
        $praise_info=$praise_mdl->getRow('id,msg_id',$filter);
        $stare=array(
                '0'=>array(
                        'add'=>'succ',
                        'msg'=>'点赞成功！',
                    ),
                '1'=>array(
                        'del'=>'succ',
                        'msg'=>'取消成功！',
                    )
              );
        if ($praise_info) {
             $praise_mdl->delete(array('id'=>$praise_info['id']));
             return $stare['1'];
        }else{
            $filter['author']=$this->get_member_name($member_id);
            $filter['time']=time();
            $praise_id=$praise_mdl->insert($filter);
            $praise_info=$praise_mdl->getRow('author_id,time',array('id'=>$praise_id));
            $praise_info['author']=$this->get_member_name($praise_info['author_id']);
            $praise_info['head_pic']=$this->get_headpic($praise_info['author_id']);
            $member_info=array_merge($stare['0'],$praise_info);
            return $member_info;
             // kernel::single('base_rpc_service')->send_user_error('praise_error', '您已经点过赞！');
        }
        
    }
      /*
    *点赞
    *msg_id :博文id
    */
    // public function delpraise($params)
    // {
    //     $member_id=$params['member_id'];
    //     $accesstoken=$params['accesstoken'];
    //     $this->check_accesstoken($accesstoken,$member_id);
    //     $msg_id=$params['msg_id'];
    //     $praise_mdl=app::get('friends')->model('praise');
    //     $praise_info=$praise_mdl->getRow('*',array('author_id'=>$member_id,'msg_id'=>$msg_id));
    //     if (!$praise_info) {
    //          $praise_mdl->save(array('author_id'=>$member_id,'msg_id'=>$msg_id,'pratype'=>'true'));
    //          return true;
    //     }else{
    //          kernel::single('base_rpc_service')->send_user_error('praise_error', '您已经点过赞！');
    //     }
        
    // }
    //判断是否有视频，返回相应格式
    public function check_video($params,$personal='',$member_id='')
    {
        // error_log(var_export($params, true), 3,'log/params_iss.log');
        $praise=app::get('friends')->model('praise');
        $comment_mdl=app::get('friends')->model('comment');
        $img_mdl=app::get('image')->model('image');
        foreach ($params as $key => $value) {
            if ($value['is_video']=='true' && $value['video']!='') {
                $params[$key]['imges']='';
                $params[$key]['type']=1;
            }else{
                $params[$key]['type']=2;
                $params[$key]['video']='';
                if ($value['imges'] && $value['imges']!='') {
                    foreach ($value['imges'] as &$img) {
                       if (substr($img,0,4)!='http') {
                            // $value['imges'][$k]=base_storager::image_path($img);
                            $img_info=$img_mdl->getRow('url,width,height',array('image_id'=>$img));
                            if (!empty($img_info['width']) && !empty($img_info['height'])) {
                                $url_pyth=base_storager::image_path($img);
                                $url_pyth=explode('?',$url_pyth);
                                $img=$url_pyth[0]."?w=".$img_info['width']."h=".$img_info['height'];
                            }else{
                                $img=base_storager::image_path($img);
                            }
                        }
                        
                    }
                    $params[$key]['imges']=$value['imges'];
                }
                if (is_null($value['imges']) || $value['imges']==false) {
                    $params[$key]['imges']='';
                }
            }
            
            if ($params[$key]['links']==null) {
                $params[$key]['links']='';
            }else{
                $params[$key]['links']=array_values($params[$key]['links']);
            }
            if ($member_id && $member_id>0) {
                $praise_type=$praise->getRow('msg_id,pratype',array('author_id'=>$member_id,'msg_id'=>$value['msg_id']));
                if ($praise_type) {
                    $params[$key]['praise_type']=true;
                }else{
                    $params[$key]['praise_type']=false;
                }
            }else{
                $params[$key]['praise_type']=false;
            }
            //增加评论总数和点赞总数
            $params[$key]['praise_count']=$praise->count(array('msg_id'=>$value['msg_id']));
            $params[$key]['discuss_count']=$comment_mdl->count(array('msg_id'=>$value['msg_id'],'display'=>'true'));
            // if ($value['author_id']==0) {
            //     $params[$key]['author']='汤团妈妈';
            // }
            if ($value['author_id']>0) {
                $params[$key]['author']=$this->get_member_name($value['author_id']);
            }
            $params[$key]['head_pic']=$this->get_headpic($value['author_id']);
            $params[$key]['time']=$value['pubtime'];
            unset($params[$key]['pubtime']);
            unset($params[$key]['is_video']);
            unset($params[$key]['persistentId']);
            if ($personal=='personal') {
                unset($params[$key]['author_id']);
                unset($params[$key]['author']);
                unset($params[$key]['head_pic']);
            }
            if ($value['video']==null) {
                $params[$key]['video']='';
            }
            $params[$key]['discuss']=$this->home_comments($value['msg_id']);
            $params[$key]['pras']=$this->home_pras($value['msg_id']);

        }
        return $params;
    }
   /*
    *评论
    *msg_id :博文id
    *for_comment_id :回复评论id,*to_id :回复会员id//回复评论用
    *author_id :作者id
    *author :作者名称
    *time :时间
    *content :内容
    */
    public function comment($params)
    {
        $member_id=$params['member_id'];
        $accesstoken=$params['accesstoken'];
        $this->check_accesstoken($accesstoken,$member_id);
        $comment_mdl=app::get('friends')->model('comment');
        $msg_id=$params['msg_id'];
        $content_mdl=app::get('friends')->model('content');
        $praise_info=$content_mdl->getRow('*',array('msg_id'=>$msg_id));
        if (empty($params['msg_id']) || $params['msg_id']<1) {
            kernel::single('base_rpc_service')->send_user_error('comment_error', '博文id不能为空');
        }
        if (empty($params['content'])) {
            kernel::single('base_rpc_service')->send_user_error('comment_error', '评论内容不能为空');
        }
        if (!$praise_info) {
            kernel::single('base_rpc_service')->send_user_error('comment_error', '内容不存在！');
        }
        $data=array();
        $data['content']=strip_tags($params['content']);
        $data['author_id']=$member_id;
        $data['author']=$this->get_member_name($member_id);
        $data['time']=time();
        $data['msg_id']=$msg_id;
        if ($this->comment_setting=='true' || empty($this->comment_setting)) {
            $data['display']='false';
        }else{
             $data['display']='true';
        }
        if (!empty($params['for_comment_id'])) {
            $data['for_comment_id']=$params['for_comment_id'];
        }
        if (!empty($params['to_id'])) {
        	$comment_info=$comment_mdl->getRow('comment_id',array('comment_id'=>$params['for_comment_id'],'author_id'=>$params['to_id']));
        	if (!$comment_info) {
        		kernel::single('base_rpc_service')->send_user_error('comment_error', '请检查回复评论和回复会员是否一致！');
        	}
            $data['to_id']=$params['to_id'];
            $data['to_uname']=$this->get_member_name($params['to_id']);

        }
        $stare=$comment_mdl->insert($data);
        if ($stare) {
            $return_info=$comment_mdl->getRow('comment_id,msg_id,for_comment_id,author_id,author,time,to_id,to_uname,content,display',array('comment_id'=>$stare));
            $return_info['head_pic']=$this->get_headpic($return_info['author_id']);
            if ($return_info['to_id']>0) {
                $return_info['to_uname']=$this->get_member_name($return_info['to_id']);
            }
            return $return_info;
            // return true;
        }else{
            kernel::single('base_rpc_service')->send_user_error('comment_error', '评论失败！');
        }

    }
    /*
    *评论列表
    *msg_id :博文id
    */
    public function commentlist($params)
    {
        $member_id=$params['member_id'];
        $accesstoken=$params['accesstoken'];
        $this->check_accesstoken($accesstoken,$member_id);
        $nPage = $params['n_page'] ? $params['n_page'] : 1;
        $comment_mdl=app::get('friends')->model('comment');
        $msg_id=$params['msg_id'];
        $content_mdl=app::get('friends')->model('content');
        $praise_info=$content_mdl->getRow('*',array('msg_id'=>$msg_id));
        if (empty($params['msg_id']) || $params['msg_id']<1) {
            kernel::single('base_rpc_service')->send_user_error('comment_error', '博文id不能为空');
        }
        if (!$praise_info) {
            kernel::single('base_rpc_service')->send_user_error('comment_error', '内容不存在！');
        }
        $total=$comment_mdl->count(array('msg_id'=>$msg_id,'display'=>'true'));
        $aPage = $this->get_start($nPage, $total);
        $commentlist=$comment_mdl->getList('author_id,author,time,content',array('msg_id'=>$msg_id,'display'=>'true'),$aPage['start'], $this->pagesize,'time DESC');
        //是否还有下一页
        if($nPage < $aPage['maxPage']){
            $aPage['has_next']=true;
        }else{
            $aPage['has_next']= false;
        }
      
        $data['items']=$commentlist;
        $data['pages']=$aPage;
        return $data;
    }
    /*
    *朋友圈主页获取评论列表
    *msg_id :博文id
    */
    public function home_comments($msg_id,$is_info=false)
    {
        $comment_mdl=app::get('friends')->model('comment');
        if ($is_info==true) {
             $commentlist=$comment_mdl->getList('author_id,author,time,content,for_comment_id,to_uname,comment_id',array('msg_id'=>$msg_id,'display'=>'true'),0,-1,'time DESC');
        }else{
            $commentlist=$comment_mdl->getList('author_id,author,time,content,for_comment_id,to_uname,comment_id',array('msg_id'=>$msg_id,'display'=>'true'),0,5,'time DESC');
        }
        foreach ($commentlist as $key => $value) {
            if ($value>0) {
                $commentlist[$key]['author']=$this->get_member_name($value['author_id']);
            }
            $commentlist[$key]['head_pic']=$this->get_headpic($value['author_id']);
            
        }
        return $commentlist;
    }
    /*
    *朋友圈主页获取点赞列表
    *msg_id :博文id
    */
    public function home_pras($msg_id,$is_info=false)
    {
        $praise_mdl=app::get('friends')->model('praise');
        if ($is_info==true) {
            $praiselist=$praise_mdl->getList('author_id,author,pratype,time',array('msg_id'=>$msg_id,'pratype'=>'true'),0,-1,'time DESC');
        }else{
            $praiselist=$praise_mdl->getList('author_id,author,pratype,time',array('msg_id'=>$msg_id,'pratype'=>'true'),0,10,'time DESC');
        }
        foreach ($praiselist as $key => $value) {
            if ($value['author_id']>0) {
                $praiselist[$key]['author']=$this->get_member_name($value['author_id']);
            }
            $praiselist[$key]['head_pic']=$this->get_headpic($value['author_id']);
            
        }
        return $praiselist;
    }
     /*
    *获取详情页的信息以及评论和点赞信息
    *msg_id :博文id
    */
    public function friend_info($params)
     {
        $member_id=$params['member_id'];
        // $accesstoken=$params['accesstoken'];
        // $this->check_accesstoken($accesstoken,$member_id);
        $comment_mdl=app::get('friends')->model('comment');
        $msg_id=$params['msg_id'];
        $content_mdl=app::get('friends')->model('content');
        $praise_info=$content_mdl->getRow('msg_id,content,author_id,author,pubtime,imges,links,is_video,video,thumbnail',array('msg_id'=>$msg_id));
        if (empty($params['msg_id']) || $params['msg_id']<1) {
            kernel::single('base_rpc_service')->send_user_error('comment_error', '博文id不能为空');
        }
        if (!$praise_info) {
            kernel::single('base_rpc_service')->send_user_error('comment_error', '内容不存在！');
        }
        // 
        if ($praise_info['is_video']=='true' && $praise_info['video']!='') {
            $praise_info['imges']='';
            $praise_info['type']=1;
        }else{
            $praise_info['type']=2;
            $praise_info['video']='';
            if ($praise_info['imges']!='') {
                foreach ($praise_info['imges'] as $k=>$img) {
                    $img_mdl=app::get('image')->model('image');
                    $img_info=$img_mdl->getRow('url,width,height',array('image_id'=>$img));
                    if (!empty($img_info['width']) && !empty($img_info['height'])) {
                        $url_pyth=base_storager::image_path($img);
                        $url_pyth=explode('?',$url_pyth);
                        $img=$url_pyth[0]."?w=".$img_info['width']."h=".$img_info['height'];
                    }else{
                        $img=base_storager::image_path($img);
                    }
                    $praise_info['imges'][$k]=$img;
                }
                // $praise_info['imges']=$praise_info['imges'];
            }
        }
        // if ($praise_info['author_id']==0) {
        //     $praise_info['author']='汤团妈妈';
        // }
        $praise_info['head_pic']=$this->get_headpic($praise_info['author_id']);
        unset($praise_info['is_video']);
        if ($praise_info['video']==null) {
            $praise_info['video']='';
        }
        if ($praise_info['author_id']>0) {
        	$praise_info['author']=$this->get_member_name($praise_info['author_id']);
        }
        $praise_mdl=app::get('friends')->model('praise');
        $comment_mdl=app::get('friends')->model('comment');
        if ($member_id && $member_id>0) {
            $praise_type=$praise_mdl->getRow('msg_id,pratype',array('author_id'=>$member_id,'msg_id'=>$msg_id));
            if ($praise_type) {
                $praise_info['praise_type']=true;
            }else{
                $praise_info['praise_type']=false;
            }
        }else{
            $praise_info['praise_type']=false;
        }
        $praise_info['links']=array_values($praise_info['links']);
        $praise_info['praise_count']=$praise_mdl->count(array('msg_id'=>$msg_id));
        $praise_info['discuss_count']=$comment_mdl->count(array('msg_id'=>$msg_id,'display'=>'true'));
        $praise_info['discuss']=$this->home_comments($msg_id,true);
        $praise_info['pras']=$this->home_pras($msg_id,true);
        return $praise_info;
     }
     /*
    *发表博文
    *content:内容
    *video:视频链接或者文件
    *img:图片
    *author_id:作者id
    */
    public function create($params)
    {
        //检查登录
        $member_id=$params['member_id'];
        $accesstoken=$params['accesstoken'];
        $this->check_accesstoken($accesstoken,$member_id);
        //检查是否是作者用户
        $members_mdl=app::get('friends')->model('members');
        //获取作者信息
        $member_info=$members_mdl->getRow('*',array('member_id'=>$member_id));
        if ($member_info['is_author']!='true') {
             kernel::single('base_rpc_service')->send_user_error('author_error', '对不起，您暂无发表权限!');
        }
        $content_mdl=app::get('friends')->model('content');
        $data=array();
        if (!empty($params['content'])) {
            $data['content']=$this->br2nl($params['content']);
        }
        if (empty($params['img']) && empty($params['content']) && empty($params['video'])) {
            kernel::single('base_rpc_service')->send_user_error('create_error', '请输入发表信息！');
        }
        if (!empty($params['links'])) {
            $links=stripcslashes($params['links']);
            $links=str_replace('#',',',$links);
            $links=json_decode($links,true);
            if (count($links)>9) {
                kernel::single('base_rpc_service')->send_user_error('create_error', '发表失败，链接不能多于9个！');
            }
            $lists_url=(array)$links;
            foreach ($lists_url as &$info) {
                $info['link']=$info['url'];
                unset($info['url']);
            }
            $data['links']=$lists_url;
        }
        if (!empty($params['img'])) {
             // file_put_contents("aaaaa_img.txt",var_export($params['img'],true).PHP_EOL,FILE_APPEND);
            $imgs_qiniu= explode("||",$params['img']);
                foreach ($imgs_qiniu as &$tep) {
                    $tep= $this->save_img_friends($tep);
                }
             $data['imges']=$imgs_qiniu;
             if (count($data['imges'])>9) {
                 kernel::single('base_rpc_service')->send_user_error('create_error', '发表失败，图片不能多于9个！');
             }
        }
        if (!empty($params['video'])) {
            $domain = app::get('qiniu')->getConf('domain');
            $data['video']=$domain.$params['video'];
            $data['is_video']='true';
            if (!empty($params['persistentId'])) {
                $data['persistentId']=$params['persistentId'];
            }   
            if (!empty($params['thumbnail'])) {
                $data['thumbnail']= $this->save_img_friends($params['thumbnail']);
            }
        }else{
            $data['is_video']='false';
            $data['video']='';
        }
        $data['pubtime']=time();
        $data['author_id']=$member_id;
        $data['author']=$this->get_member_name($member_id);
        $data['ifpub']='true';
        $data['recover']='false';
        //视频信息
        $state=$content_mdl->save($data);
        if ($state) {
            return true;
        }else{
            kernel::single('base_rpc_service')->send_user_error('create_error', '发表失败！');
        }

    }
    /*
    删除评论，只能自己删除自己的评论
    comment_id
     */
    public function delete_comment($params=array())
    {
        $member_id=$params['member_id'];
        $accesstoken=$params['accesstoken'];
        $this->check_accesstoken($accesstoken,$member_id);
        $comment_opj=app::get('friends')->model('comment');
        if (empty($params['comment_id'])) {
            kernel::single('base_rpc_service')->send_user_error('delete_comment_error', '找不到评论信息!');
        }
        $comment_item=$comment_opj->getRow('comment_id,author_id',array('author_id'=>$member_id,'comment_id'=>$params['comment_id']));
        if ($comment_item) {
            $dell=$comment_opj->delete(array('comment_id'=>$comment_item['comment_id']));
            if ($dell) {
                return true;
            }else{
                kernel::single('base_rpc_service')->send_user_error('delete_comment_error', '删除失败!');
            }
        }else{
            kernel::single('base_rpc_service')->send_user_error('delete_comment_error', '评论不存在或者不属于该用户！');
        }
    }
    /*
    删除朋友圈
    recover 
    msg_id
    @ return 状态
     */
    public function recover($params)
    {
        $member_id=$params['member_id'];
        $accesstoken=$params['accesstoken'];
        $this->check_accesstoken($accesstoken,$member_id);
        $members_mdl=app::get('friends')->model('members');
        $member_info=$members_mdl->getRow('*',array('member_id'=>$member_id));
        if ($member_info['is_author']!='true') {
             kernel::single('base_rpc_service')->send_user_error('recover_error', '对不起，您没有操作权限!');
        }
        if (!isset($params['msg_id'])) {
            kernel::single('base_rpc_service')->send_user_error('recover_error', '博文id不存在!');
        }
        $msg_id=$params['msg_id'];
        $content_mdl=app::get('friends')->model('content');
        $msg_info=$content_mdl->getRow('msg_id,author_id',array('author_id'=>$member_id,'msg_id'=>$msg_id));
        if (!$msg_info) {
            kernel::single('base_rpc_service')->send_user_error('recover_error', '对不起，您没有操作权限!');
        }
        $recover=$params['recover']?$params['recover']:'true';
        $recove_type=$content_mdl->update(array('recover'=>$recover),array('msg_id'=>$msg_id));
        if ($recove_type) {
            return true;
        }else{
            kernel::single('base_rpc_service')->send_user_error('recover_error', '操作失败!');
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
    public function save_img_friends($img_url)
    {   
        $domain = app::get('qiniu')->getConf('domain');
        $mdl_img = app::get('image')->model('image');
        if(!empty($domain) && is_string($domain) && substr($domain,0,4)=='http'){
            $img_pyth = $domain.$img_url;
            $img_id = $mdl_img->store($img_pyth, null, null, '',false,null,false);  //最后false很重要 已经是url不再使用七牛了！！
            if($img_id !== false){
                return $img_id;
            }else{
                return $this->save_img_friends($img_url);
            }
        }
        return $domain.$img_url;
    }
    private function fileext($filename) {
        return substr(strrchr($filename, '.'), 1);
    }
    public function ajax_video($_FILES) {
        if (empty($_FILES['video'])) {
            kernel::single('base_rpc_service')->send_user_error('create_error', '图片上传错误，请稍后重试！');
        }
        if ($_FILES['video']['size'] > 31457280) {
             kernel::single('base_rpc_service')->send_user_error('create_error', '上传文件不能超过30M！');
        }
        if ($_FILES['video']['error'] != 0 || $_FILES['video']['name'] == '') {
             kernel::single('base_rpc_service')->send_user_error('create_error', '图片上传错误，请稍后重试！');
        }
        $type = array("AVI", "wma", "rmvb", "rm", "flash", "mp4","mid","3GP");
        
        if (!in_array($this->fileext($_FILES['video']['name']),$type)) {
            $text = implode(",", $type);
             kernel::single('base_rpc_service')->send_user_error('create_error', '您只能上传以下类型文件'.$text);
        } 
        else {
            $content_mdl=app::get('friends')->model('content');
            $qiniu = kernel::single('qiniu_base'); 

            $paths="public/app/firends/video";
            $gen_id=$content_mdl->gen_id();
            $kes_qiniu=$paths."/".$gen_id.$_FILES['video']['name'];
            $qiniu_result = $qiniu->upvideo($_FILES['video']['tmp_name'],$kes_qiniu);
            if ($qiniu_result && !empty($qiniu_result)) {

                // return $domain.$qiniu_result['key'];
                return $qiniu_result;
            }else{
                kernel::single('base_rpc_service')->send_user_error('create_error', '上传失败！');
            }

        }      
        // error_log(var_export($voucher_src,true),3,__FILE__.'kk.log');
    }
     public function ajax_imgs($_FILES) {
        if (empty($_FILES['img'])) {
             kernel::single('base_rpc_service')->send_user_error('create_error', '图片上传错误，请稍后重试！');
        }
        if ($_FILES['img']['size'] > 31457280) {
             kernel::single('base_rpc_service')->send_user_error('create_error', '上传文件不能超过30M！');
        }
        if ($_FILES['img']['error'] != 0 || $_FILES['img']['name'] == '') {
            kernel::single('base_rpc_service')->send_user_error('create_error', '图片上传错误，请稍后重试！');
        }
        $type = array("png", "jpg", "gif", "jpeg", "rar", "zip");
        if (!in_array(strtolower($this->fileext($_FILES['img']['name'])), $type)) {
            $text = implode(",", $type);
            kernel::single('base_rpc_service')->send_user_error('create_error', '您只能上传以下类型文件'.$text);
        } 
        else {
            $mdl_img = app::get('image')->model('image');
            $voucher_id = $mdl_img->store($_FILES['img']['tmp_name'], null, null, $_FILES['img']['name']);
            // $mdl_img->rebuild($voucher_id, array('L', 'M', 'S'));
            // $voucher_src = base_storager::image_path($voucher_id, 's');
            return $voucher_id;

        }
        
        // error_log(var_export($voucher_src,true),3,__FILE__.'kk.log');
        $this->ajax_callback('voucher', $voucher_id, $voucher_src);
    }
    /*
    *获取会员头像
    *
    */
    public function get_headpic($member_id)
    {
        $member_mdl=app::get('b2c')->model('members');
        if ($member_id && $member_id>0) {
            $member_info=$member_mdl->dump($member_id);
            if (!empty($member_info['member_pic'])) {
                $head_pic=base_storager::image_path($member_info['member_pic'],'s');
            }else{
                $temp= app::get('b2c')->getConf('member_defpic');
                $head_pic=base_storager::image_path($temp,'s');
            }
            
        }else{
            $temp= app::get('b2c')->getConf('member_defpic');
            $head_pic=base_storager::image_path($temp,'s');
        }
        return $head_pic;

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
    /**
     * 获取当前会员用户名/或指定用户的用户名
     */
    public function get_member_name($member_id=0){
        if($member_id && $member_id>0){
            $pam_members_model = app::get('pam')->model('members');
            $members_mdl = app::get('b2c')->model('members');
            $data = $pam_members_model->getList('*',array('member_id'=>$member_id));
            foreach((array)$data as $row){
                $arr_name[$row['login_type']] = $row['login_account'];
            }
            $member_info=$members_mdl->getRow('name',array('member_id'=>$member_id));
            if(isset($member_info['name'])) {
                $login_name=$member_info['name'];
            }elseif(isset($arr_name['local']) ){
                $login_name = $arr_name['local'];
            }elseif (isset($arr_name['weixin'])) {
            	//微信
            	$login_name = $arr_name['weixin'];
            }elseif (isset($arr_name['thired'])) {
            	//第三方登录
            	$login_name = $arr_name['thired'];
            }elseif(isset($arr_name['mobile'])){
                $login_name = $this->hideStar($arr_name['mobile']);
            }else{
                $login_name = $this->hideStar($arr_name['email']);
            }
        }
        return $login_name;
    }

     //用户名、邮箱、手机账号中间字符串以*隐藏
    function hideStar($str) {
       if (strpos($str, '@')) {
          $email_array = explode("@", $str);
          $prevfix = (strlen($email_array[0]) < 4) ? "" : substr($str, 0, 3); 
          $count = 0;
          $str = preg_replace('/([\d\w+_-]{0,100})@/', '**@', $str, -1, $count);
          $rs = $prevfix . $str;
       } else {
          $pattern = '/(1[3458]{1}[0-9])[0-9]{4}([0-9]{4})/i';
          if (preg_match($pattern, $str)) {
             $rs = preg_replace($pattern, '$1****$2', $str); 
          } else {
            if (strlen($str) >4) {
                 $rs = substr($str, 0, 3) . "**" . substr($str, -1);
            }else{
                 $rs = substr($str, 0, 1) . "**" . substr($str, -1);
            }
            
          }
       }
       return $rs;
        // return  $this->cut_str($str, 1, 0).'**'.$this->cut_str($str, 1, -1);
    }

}
