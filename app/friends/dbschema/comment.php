<?php
/**
 * ShopEx licence
 *
 * @copyright  Copyright (c) 2005-2010 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license  http://ecos.shopex.cn/ ShopEx License
 */
$db['comment']=array (
  'columns' =>
  array (
    'comment_id' => array (
        'type' => 'number',
        'required' => true,
        'pkey' => true,
        'extra' => 'auto_increment',
        'label' => 'ID',
        'width' => 110,
        'editable' => false,
        'default_in_list' => true,
        'comment' => app::get('friends')->_('评论ID'),
    ),
    'msg_id' => array(
        'type' => 'table:content',
        'label' => app::get('friends')->_('朋友圈id'),
        'in_list' => true,
        'default_in_list' => true,
    ),
    'for_comment_id' => array (
        'type' => 'mediumint(8) ',
        'label' => app::get('friends')->_('对m的回复'),
        'default' =>0,
    ),
    // 'object_type' => array (
    //     'type' => "enum('discuss', 'reply')",
    //     'label' => app::get('friends')->_('类型'),
    //     'default' => 'discuss',
    //     'required' => true,
    // ),
    'author_id' => array(
        'type'=>'mediumint(8)',
        'in_list' => false,
        'label' => app::get('friends')->_('作者ID'),
        'default' => 0,
        'default_in_list' => false,
    ),
    'author' => array (
        'type' => 'varchar(100)',
        'label' => app::get('friends')->_('发表人'),
        'searchtype' => 'has',
        'filtertype' => 'normal',
        'filterdefault' => 'true',
        'in_list' => true,
    ),
    'time' => array (
        'type' => 'time',
        'in_list' => true,
        'filtertype' => 'normal',
        'filterdefault' => 'true',
        'label' => app::get('friends')->_('时间'),
    ),
    'to_id' => array (
        'type' => 'table:members@b2c',
        'default' =>0,
        'required' => true,
        'comment' => app::get('friends')->_('目标会员序号ID'),
    ),
    'to_uname' => array(
        'type'=>'varchar(100)',
        'default_in_list' => true,
        'comment' => app::get('friends')->_('目标会员姓名'),
    ),
    'content' => array(
        'type'=>'longtext',
        'label' => app::get('friends')->_('内容'),
        'in_list' => true,
        'searchtype' => 'has',
        'filtertype' => 'normal',
        'filterdefault' => 'true',
        'default_in_list' => true,
    ),
    'ip' => array(
        'type'=>'varchar(15)',
        'in_list' => true,
        'label' => 'IP',
        'default_in_list' => true,
        'comment' => app::get('friends')->_('ip地址'),
    ),
    'display' => array(
        'type'=>'bool',
        'in_list' => true,
        'label' => app::get('friends')->_('前台是否显示'),
        'filtertype' => 'bool',
        'default' =>'false',
        'default_in_list' => true,
    ),
    'disabled' => array(
        'type'=> "enum('false', 'true')",
        'default' =>'false',
        'default_in_list' => true,
    ),
  ),
   'engine' => 'innodb',
   'version' => '$Rev$',
   'comment' => app::get('friends')->_('朋友圈评论表'),
   'index' =>
   array (
   ),

);
