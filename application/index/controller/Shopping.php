<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\ShopCart;

class Shopping extends Controller
{

	public function AddtoCart($urlNum)
	{
		if(!session('?idUser'))
			return error('先去登录吧');
		$this->view->engine->layout(false);
		$shopCart = new ShopCart();
		$isSlt = $shopCart->getItem(['id_goods'=>$urlNum,'id_user'=>session('idUser')]);//是否选中商品
		if(!$isSlt)
		{
			//添加购物车
			$data['id_user'] = session('idUser');
			$data['id_goods'] = $urlNum;
			$data['num_goods'] = 1;
			$shopCart->addItem($data);	
		}
		//得到当前用户的购物车信息
		$data = $shopCart->getItem(['id_user'=>session('idUser')]);
		$this->assign('dataCart',$data);	
		$sum = $shopCart->getSumPrice(['id_user'=>session('idUser')]);
		$this->assign('sum',$sum);	
		return $this->fetch();
	}

	function delGoods($id)
	{
		ShopCart::destroy($id);
		$shopCart = new ShopCart();
		$data = $shopCart->getItem(['id_user'=>session('idUser')]);
		$this->assign('dataCart',$data);	
		$sum = $shopCart->getSumPrice(['id_user'=>session('idUser')]);
		$this->assign('sum',$sum);	
		return $this->fetch('Shopping/AddtoCart');
	}

	function GetCartJson()
	{
		$shopCart = new ShopCart();
		$data = $shopCart->getItem(['id_user'=>session('idUser')]);
		echo json_encode(['productsNum'=>count($data)]);
	}



}