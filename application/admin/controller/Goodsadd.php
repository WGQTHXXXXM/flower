<?php

namespace app\admin\controller;
use think\Controller;

class Goodsadd extends Controller
{

/*商品添加*/
	public function goodadd()
    {
    	// $fourm = new FourmModel();
   		// $list = $fourm->where('ffid','>',0)->select();
    	// $this->assign('list',$list);
    	return $this->fetch();
    }
}