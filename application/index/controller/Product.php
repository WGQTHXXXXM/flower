<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\Goods;
use app\index\model\PicDetail;
use app\index\model\PicShow;
use app\index\model\Comment;

class Product extends Controller
{
    public function showPro($urlNum)
    {



    	// $goods = new Goods();
    	// $arrGoodsInfo = $goods->getGoods(['url_num'=>$urlNum]);
    	// $this->assign('dataPro',$arrGoodsInfo);
  
    	// $goods = new PicDetail();
    	// $arrGoodsPic = $goods->getPIcDetail(['id_goods'=> $arrGoodsInfo->id]);
    	// $this->assign('dataPicDet',$arrGoodsPic);

    	// $goods = new PicShow();
    	// $arrGoodsPic = $goods->getPicShow(['id_goods'=> $arrGoodsInfo->id]);
    	// $this->assign('dataPicShow',$arrGoodsPic);


    	$goods = new Comment();
    	// $arrGoodsPic = $goods->getComment(['id_goods'=> $arrGoodsInfo->id]);
    	// $this->assign('dataComment',$arrGoodsPic);
    	return $goods->test();

    	// $goods = new PicTitle();
    	// $arrGoodsPic = $goods->getPicTitle(['id_goods'=> $arrGoodsInfo->id]);
    	// $this->assign('dataPicTitle',$arrGoodsPic);

    	return $this->fetch();
    }



}