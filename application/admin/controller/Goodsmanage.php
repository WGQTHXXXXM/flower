<?php

namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;

use app\admin\model\Goods;
use app\admin\model\PicDetail;
use app\admin\model\PicTitle;
use app\admin\model\PicShow;

class Goodsmanage extends Controller
{

    /*商品管理*/
	public function shangpin(Goods $Goods)
    {

        $GoodsSelShow = $Goods->GoodsSelect();
        $this->assign('GoodsSelShow',$GoodsSelShow);
        $goodsPath = $GoodsSelShow->render();
        $this->assign('goodsPath',$goodsPath);
        /*多选删除*/
        if (array_key_exists('id', $_POST)) {
            $Goods->GoodsAllDelect($_POST['id']);
            echo "<script>alert('删除成功');window.location = 'shangpin';</script>";
        }
     	return $this->fetch();
    }

    /*单个删除*/
    public function goodsDel($gid)
    {
        $GoodsSqlDel = new Goods();
        $GoodsSqlDel->GoodsSqlDelect($gid);
        $this->redirect('admin/goodsmanage/shangpin');
    }
    /*修改界面跳转*/
    public function shangpinupdate(Goods $Goods,$gid)
    {
        /*旧信息显示*/
        $OldGoodsMessage = $Goods->gOldGoodsMessage($gid);
        $this->assign('OldGoodsMessage',$OldGoodsMessage);

        /*首页展示图片*/
        $HomeImg = Db::name('goods')->alias('gpt')
        ->join('PicTitle pt', 'gpt.id =pt.id_goods')->select($gid);
        $this->assign('HomeImg',$HomeImg);
        /*展示图片*/
        $HomesImg = Db::name('goods')->alias('gps')
        ->join('PicShow ps', 'gps.id =ps.id_goods')->select($gid);
        $this->assign('HomesImg',$HomesImg);

        /*详情图片*/
        $images = Db::name('goods')->alias('gpd')
        ->join('PicDetail pd', 'gpd.id =pd.id_goods')->select($gid);
        $this->assign('images',$images);

        return $this->fetch();
    }
    /*Goods信息修改*/
    public function goodsAlter(Goods $Goods,PicTitle $PicTitle,PicDetail $PicDetail,PicShow $PicShow)
    {
        /*修改商品信息*/
        $post = Request::instance()->post();
        $MessageAlter = $Goods->gAlterGoodsMessage($post);
 dump($post);
        /*修改首页展示图*/
        $HomeImg = request()->file('HomeImg');
        if ($HomeImg) {
           $info = $HomeImg->move(ROOT_PATH . 'public' . DS . 'uploads');
           if($info){  
            /*存储路径*/  
                $path = $info->getSaveName();      
            }else{    
                echo $file->getError();  
            }
            $HomeImgAlter = $PicTitle->gAlterGoodsHomeImg($path,$post);
        }
    }
}