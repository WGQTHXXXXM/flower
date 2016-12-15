<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\ShopCart;
use app\index\model\User;
use app\index\model\Order;
use app\index\model\ReceiveAddress;

class Shopping extends Controller
{
	//添加购物车
	public function AddtoCart($urlNum)
	{
		if(!session('?idUser'))
			return $this->error('先去登录吧');
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

	//显示购物车
	public function showCart()
	{
		$shopCart = new ShopCart();
		//得到当前用户的购物车信息
		$data = $shopCart->getItem(['id_user'=>session('idUser')]);
		$this->assign('dataCart',$data);	
		$sum = $shopCart->getSumPrice(['id_user'=>session('idUser')]);
		$this->assign('sum',$sum);	
		return $this->fetch("Shopping/AddtoCart");		
	}

	//进入定单页
	function sendInfo()
	{
		$user = new User();
		$curUser = $user->getItem(['id'=>session('idUser')]);
		$this->assign('dataUser',$curUser);
		$sum = 0;
		foreach ($curUser->cart as $val )
		{
			$sum += $val->goods->now_price;
		}
		$this->assign('sum',$sum);

		$this->view->engine->layout(false);
		return $this->fetch();
	}

	//成功保存确定定单
	function orderSave()
	{
		//生成定单数据
		$order = new Order();
		$data['id_address'] = $_POST['id_addr'];
		$data['id_user'] = session('idUser');
		$data['num_order'] = time().session('idUser');

		//更新购物车和计总价
		$user = new User();
		$curUser = $user->getItem(['id'=>session('idUser')]);
		$this->assign('dataGoods',$curUser->cart);
		$sum = 0;
		foreach ($curUser->cart as $val )
		{
			$sum += $val->goods->now_price;
		}
		$this->assign('sum',$sum);
		$this->assign('num_order',$data['num_order']);
		//更新购物车
		$cart = new ShopCart();
		$cart->updataItem(['id_order'=>$data['num_order'],'id_user'=>0],['id_user'=>session('idUser')]);

		//生成地址数据
		$addr = new ReceiveAddress();
		$dataAddr = $addr->getItem(['id'=>$_POST['id_addr']]);
		$this->assign('dataAddr',$dataAddr);
		//添加订单
		$order->addItem($data);			
		$this->view->engine->layout(false);
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