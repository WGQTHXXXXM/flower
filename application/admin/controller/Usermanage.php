<?php

namespace app\admin\controller;
use think\Controller;

class Usermanage extends Controller
{
	/*用户管理*/
	 public function yonghu()
    {
    	// $user = new UserModel();

    	// $list = $user->paginate(6);
        // $page = $list->render();
        // $this->assign('page',$page);
        // $this->assign('list',$list);
    	return $this->fetch();
    }
}
   