<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Category;
// use think\Request;
class Platemanage extends Controller
{
	/*版块添加*/
    public function addfourm()
    {
    	
    	$category = new Category;
    	$gBigPlate = $category->getBigPlate();
    	/*绑定值*/
    	$this->assign('bigPlate',$gBigPlate);
     	return $this->fetch();
    }
}
   