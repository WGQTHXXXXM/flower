<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Order;

class Ordermanage extends Controller
{
/*订单管理*/
    public function shoppingmall(Order $Order)
    {

        $orderMsg = $Order->getOrder();
        $this->assign('orderMsg',$orderMsg);
      // dump($orderMsg[0]->receive); 
       return $this->fetch();
    }

    /*订单状态修改->已发货*/
    public function OrderStatus0(Order $Order, $id)
    {
    	$Order->oOrderStatus($id);
    	$this->redirect('admin/Ordermanage/shoppingmall');
    }
    /*订单状态修改->取消订单*/
    public function OrderStatus1(Order $Order, $id)
    {
    	$Order->oOrderStatusOne($id);
    	$this->redirect('admin/Ordermanage/shoppingmall');
    }
    /*取消订单后->删除订单*/
    /*订单状态修改->交易完成删除订单*/
    public function OrderDel(Order $Order, $id)
    {
    	$Order->oOrderDel($id);
    	$this->redirect('admin/Ordermanage/shoppingmall');
    }
}