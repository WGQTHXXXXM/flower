<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\User;
class Ordermanage extends Controller
{
/*订单管理*/
    public function shoppingmall(User $User)
    {
       dump($User->order);die;
     	return $this->fetch();
    }

}