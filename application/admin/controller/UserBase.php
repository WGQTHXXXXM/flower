<?php
/*
*Admin-User表查询 基类
*/
namespace app\admin\controller;

use think\Controller;
use app\admin\model\User;
//use think\Session;

class UserBase extends Controller
{

    protected $adUser;
    function _initialize()
    {
        $this->adUser = new User();
    }
}



