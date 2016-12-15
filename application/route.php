<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '__alias__'   => [
        'flower' => 'index/Flower',
        'cake' => 'index/Cake',
        'chat' => 'index/Chat',
        'gifts' => 'index/Gifts',
        'help' => 'index/Help',
        'huayu' => 'index/Huayu',
        'Member' => 'index/Member',
        'Passport' => 'index/Passport',
        'Shopping' => 'index/Shopping',
        'plant' => 'index/Plant',
        'product' => 'index/Product',
        'productpj' => 'index/Productpj',
        'profile' => 'index/Profile',
        'qiyetuangou' => 'index/Qiyetuangou',
        'quickselect' => 'index/Quickselect',
        'Search' => 'index/Search',
        'theme' => 'index/Theme',
        'toys' => 'index/Toys',
        'xianhuashipai' => 'index/Xianhuashipai',
        'yongshenghua' => 'index/Yongshenghua',
    ],
    

];
