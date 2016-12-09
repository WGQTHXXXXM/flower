<?php

namespace app\admin\controller;
use think\Controller;

class Goodsmanage extends Controller
{

/*商品管理*/
	public function shangpin()
    {

    //       $good = new GoodsModel();
    //   //模糊查询
    //   // if($_GET){
    //   //     $key = $_GET['keyword'];
    //   //     $list = $good->where('goodsname','like',$key)->paginate();
    //   // }else{
    //   //     $list = $good->paginate(3);
          
    //   // }
    // 	$list = $good->paginate(6);
    //     $page = $list->render();
    //     $this->assign('page',$page);
    //     $this->assign('list',$list);
     	return $this->fetch();
 
    }
}