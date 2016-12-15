<?php
/**
 * 鲜花
 */
namespace app\index\Controller;
use app\index\model\Goods;
use think\Controller;

class Flower extends Controller
{
    public function index($odr = 0)
    { 
    	$goods = new Goods();
    	$dataGoods = $goods->getAllItem($odr);
    	$this->assign('dataGoods',$dataGoods);

    	return $this->fetch();
    }
}




