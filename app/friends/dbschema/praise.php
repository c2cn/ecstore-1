<?php
/**
 * ShopEx licence
 *
 * @copyright  Copyright (c) 2005-2010 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license  http://ecos.shopex.cn/ ShopEx License
 */
$db['praise'] = array (
    'columns' =>
    array (
        'id' =>array (
            'type' => 'number',
            'required' => true,
            'label'=> app::get('friends')->_('id'),
            'pkey' => true,
            'extra' => 'auto_increment',
            'width' => 10,
            'editable' => false,
            'in_list' => true,
        ),
        'ip' =>array (
            'type'=>'varchar(150)',
            'in_list' => true,
            'label' => 'IP',
            'default_in_list' => true,
            'comment' => app::get('friends')->_('ip地址'),
            'label'=> app::get('friends')->_('会员ip'),
        ),
        'msg_id' =>array (
            'type' => 'table:content',
            'label' => app::get('b2c')->_('朋友圈id'),
            'width' => 75,
            'editable' => false,
            'filtertype' => 'yes',
            'filterdefault' => true,
            'in_list' => true,
            'default_in_list' => true,
        ),
        'time' =>array (
            'type' => 'time',
            'label' => app::get('friends')->_('时间'),
            'editable' => false,
            'width' => 130,
            'in_list' => true,
            'default_in_list' => true,
        ),
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
        'pratype' =>
        array (
            'type' => array (
                'true' => app::get('b2c')->_('已赞'),
                'false' => app::get('b2c')->_('已取消'),
            ),
            'default' => 'true',
            'label' => app::get('b2c')->_('点赞状态'),
            'comment' => app::get('b2c')->_('点赞状态'),
        ),
    ),  
  'version' => '$Rev$',
  'comment' => app::get('friends')->_('朋友圈点赞'),
);
