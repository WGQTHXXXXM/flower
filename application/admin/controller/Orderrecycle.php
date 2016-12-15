<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Order;

class Orderrecycle extends Controller
{
	public function Orderrecycle(Order $Order)
	{
		$orderMsg = $Order->getOrderDel();
       	$this->assign('orderMsg',$orderMsg);
		return $this->fetch();
	}

	/*订单恢复*/
	public function orderRecove($id, Order $Order)
	{ 
		$Order->oOrderRecove($id);
		$this->redirect('admin/Orderrecycle/Orderrecycle');
	}
	/*订单删除*/
	public function orderTrueDel($id, Order $Order)
	{
		$Order->oOrderTrueDel($id);
		$this->redirect('admin/Orderrecycle/Orderrecycle');
	}
}