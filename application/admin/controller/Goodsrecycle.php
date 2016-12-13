<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Goods;
use think\Request;
class Goodsrecycle extends Controller
{
  /*删除的商品管理*/
    public function goodrecycle()
    {
         /*删除的商品信息*/
        $Recoven = new Goods();
        $CanRecovenGoods = $Recoven->CanRecovenGoods();
        $this->assign('CanRecovenGoods', $CanRecovenGoods);

        /*分页*/
        $goodsPage = $CanRecovenGoods->render();
        $this->assign('goodsPage', $goodsPage);

        /*恢复商品*/
        $RecovenId = Request::instance()->post();
        if ($RecovenId) 
        {
            $Recoven->GoodsRecoven($RecovenId['id']);
            echo "<script>alert('恢复成功');window.location = 'goodrecycle';</script>"; 
        }
        return $this->fetch();
    }

    /*彻底删除*/
    public function TrueDel($Tgid)
    {
       $Del = new Goods();
       $Del->TrueDelGoods($Tgid);
       $this->redirect('admin/Goodsrecycle/goodrecycle');
    }
}