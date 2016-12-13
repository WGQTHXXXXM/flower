<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Goods;
use think\Request;
class Goodsmanage extends Controller
{

    /*商品管理*/
	public function shangpin()
    {

        $GoodsModSel = new Goods();
        $GoodsSelShow = $GoodsModSel->GoodsSelect();
        $this->assign('GoodsSelShow',$GoodsSelShow);
        $goodsPath = $GoodsSelShow->render();
        $this->assign('goodsPath',$goodsPath);

        /*多选删除*/
        if ($_POST) {
            $GoodAllDel = new Goods();
            $GoodAllDel->GoodsAllDelect($_POST['id']);
             echo "<script>alert('删除成功');window.location = 'shangpin';</script>";
        }
        
        //dump($GoodsSelShow);die;
    //   $good = new GoodsModel();
    //   //模糊查询
    //   // if($_GET){
    //   //     $key = $_GET['keyword'];
    //   //     $list = $good->where('goodsname','like',$key)->paginate();
    //   // }else{
    //   //     $list = $good->paginate(3);
          
    //   // }
     	return $this->fetch();
    }
    /*单个删除*/
    public function goodsDel($gid)
    {
        $GoodsSqlDel = new Goods();
        $GoodsSqlDel->GoodsSqlDelect($gid);
        $this->redirect('admin/goodsmanage/shangpin');
    }
    /*修改*/
    public function shangpinupdate()
    {
        return $this->fetch();
    }
}