<?php
/**
 * ShopEx licence
 *
 * @copyright  Copyright (c) 2005-2010 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license  http://ecos.shopex.cn/ ShopEx License
 */
$db['content'] = array (
    'columns' =>
    array (
        'msg_id' =>array (
            'type' => 'number',
            'required' => true,
            'label'=> app::get('friends')->_('文章ID'),
            'pkey' => true,
            'extra' => 'auto_increment',
            'width' => 50,
            'editable' => false,
            'in_list' => true,
            'default_in_list' => true,
        ),
        'content'=>array(
        	'type' => 'longtext',
            'label'=> app::get('friends')->_('文章内容'),
            'editable' => false,
            'in_list' => true,
    	),
        'author_id' => array(
            'type'=>'mediumint(8)',
            'in_list' => false,
            'label' => app::get('friends')->_('作者ID'),
            'default' => 0,
            'default_in_list' => false,
        ),
        'author' => array (
            'type' => 'varchar(50)',
            'label' => app::get('friends')->_('作者'),
            'editable' => true,
            'searchtype' => 'has',
            'width' => 80,
            'filtertype' => 'yes',
            'filterdefault' => true,
            'in_list' => true,
            'default_in_list' => true,
        ),
        'pubtime' => array(
            'type' => 'time',
            'label' => app::get('friends')->_('发布时间'),
            'editable' => true,
            'width' => 130,
            'filtertype' => 'yes',
            'filterdefault' => true,
            'in_list' => true,
            'default_in_list' => true,
        ),
        'ifpub' => array(
            'type' => 'bool',
            'required' => true,
            'default' => 'false',
            'label' => app::get('friends')->_('发布'),
            'editable' => true,
            'in_list' => true,
            'filtertype' => 'yes',
            'filterdefault' => false,
            'width' => 40,
            'default_in_list' => true,
        ),
        'imges' => array (
            'type' => 'serialize',
            'label' => app::get('friends')->_('图片列表'),
            'editable' => false,
        ),
        'links' => array (
            'type' => 'serialize',
            'label' => app::get('friends')->_('更多链接'),
            'editable' => false,
        ),
        'is_video' => array(
            'type' => 'bool',
            'default' => 'false',
            'label' => app::get('friends')->_('是否发布视频'),
            'editable' => true,
            'in_list' => true,
        ),
        'recover'=>array(
            'type' => 'bool',
            'default' => 'false',
            'label' => app::get('friends')->_('回收站'),
            'editable' => true,
            'in_list' => true,
        ),
        'video' => array (
            'type' => 'varchar(255)',
            'label' => app::get('friends')->_('视频地址'),
            'editable' => false,
            'in_list' => true,
        ),
        'persistentId'=>array(
            'type' => 'varchar(255)',
            'label' => app::get('friends')->_('七牛唯一标识'),
            'editable' => false,
            ), 
        'thumbnail'=>array(
            'type' => 'varchar(255)',
            'label' => app::get('friends')->_('缩略图地址'),
            'editable' => false,
            'in_list' => true,
            ),
        'visits' =>array (
            'type' => 'number',
            'label' => app::get('friends')->_('浏览量'),
            'default'=>0,
            'width' => 30,
            'editable' => false,
            'filtertype' => 'number',
            'filterdefault' => true,
        ),
        // 'zan' =>array (
        //     'type' => 'number',
        //     'label' => app::get('friends')->_('点赞量'),
        //     'default'=>0,
        //     'width' => 30,
        //     'editable' => false,
        //     'filtertype' => 'number',
        //     'filterdefault' => true,
        // ),
        'disabled' => array(
            'type' => 'bool',
            'required' => true,
            'default' => 'false',
            'editable' => true,
        ),
  ),
  'content' => app::get('friends')->_('文章主表'),
  'index' => 
      array (
  ),
  'version' => '$Rev$',
    'content' => app::get('friends')->_('文章主表'),
);
