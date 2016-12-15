<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;
use app\index\model\Goods;

class Search extends Auth
{

	public function _initialize()
	{
		
	}

    public function index()
    { 
    	$goods = new Goods();
    	$data = $goods->searchItem($_POST['keyword']);
    	$this->assign('dataGoods',$data);
    	return $this->fetch();
    }
}