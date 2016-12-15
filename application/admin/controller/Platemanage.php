<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\OneCategory;
use app\admin\model\Category;
use app\admin\model\Block;

// use think\Request;
class Platemanage extends Controller
{
	/*版块添加*/
    public function addfourm(OneCategory $OneCategory,Category $Category)
    {
        /*一级版块*/
    	$BigPlate = $OneCategory->getBigPlate();
    	$this->assign('BigPlate',$BigPlate);
        /*二级*/
        $twoPlate = $Category->getTwoPlate();
        $this->assign('twoPlate',$twoPlate);
     	return $this->fetch();
    }

    /*三级版块添加*/
    public function sanPlateAdd(Block $Block)
    {
        $Block->data([
                "parent_id" => $_POST['twoid'],
                "name" => $_POST['fourm_name'],
                "introduce" => $_POST['fourm_dec'],
                "shu_xu" => $_POST['shuxu'],
                "id_product1" => '11481074237',
                "id_product2" => '11481680830',
                "id_product3" => '11481681027',
                "id_product4" => '11481681316',
                "id_product5" => '11481681626',
                "id_product6" => '11481681729',
                "id_product7" => '11481681830',
                "id_product8" => '11481682098',
            ]);
        $Block->save();

        $this->redirect('admin/Platemanage/addfourm');
    }
}
   