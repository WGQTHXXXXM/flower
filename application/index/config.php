<?php

return [

	// 模板
	'template' 				 => [
		'layout_on' => true,
		'layout_name' => 'LayoutView'
	],

	// 视图输出字符串内容替换
    'view_replace_str'       => [
        '__INDEX__SITE__' => 'http://www.psumdgt.com',
        // '__STATIC__' => 'http://static.tp5.com/static'
        '__INDEX__STATIC__' => 'http://www.psumdgt.com/static/index'
    ],
    //验证码
    'captcha' => [
        // 验证码字符集合
        'codeSet' => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
        // 验证码字体大小(px)
        'fontSize' => 16,
        // 是否画混淆曲线
        'useCurve' => false,
        // 验证码图片高度
        'imageH' => 30,
        // 验证码图片宽度
        'imageW' => 120,
        // 验证码位数
        'length' => 4,
        // 验证成功后是否重置
        'reset' => true
    ],
];