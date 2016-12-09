<?php

namespace app\admin\controller;
use think\Controller;

class Goodsrecycle extends Controller
{
   /*商品管理*/
	public function goodrecycle()
    {
    	// $list = GoodsModel::onlyTrashed()->paginate(4);
    	// // $list = $user->paginate(6);
        // $page = $list->render();
        // $this->assign('page',$page);
        // $this->assign('list',$list);

     	return $this->fetch();
    }
}