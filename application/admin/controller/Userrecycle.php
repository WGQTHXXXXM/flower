<?php

namespace app\admin\controller;
use think\Controller;

class Userrecycle extends Controller
{
    /*用户管理*/
	public function userrecycle()
    {
    	// $list = UserModel::onlyTrashed()->paginate(4);
    	// // $list = $user->paginate(6);
        // $page = $list->render();
        // $this->assign('page',$page);
        // $this->assign('list',$list);

     	return $this->fetch();
    }
}