<?php
return [

	// // 模板
	// 'template' 				 => [
	// 	'layout_on' => true,
	// 	'layout_name' => 'LayoutView'
	// ],

	// 视图输出字符串内容替换
    'view_replace_str'       => [	
        '__ADMIN__SITE__' => 'http://www.psumdgt.com',
        '__ADMIN__STATIC__' => 'http://www.psumdgt.com/static/admin'
    ],

	    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'admin',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],

];