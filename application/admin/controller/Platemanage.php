<?php

namespace app\admin\controller;
use think\Controller;

class Platemanage extends Controller
{
	/*版块添加*/
    public function addfourm()
    {
    	// $fourm = new FourmModel();
    	// $list = $fourm->where('ffid',0)->select();

    	// $this->assign('list',$list);

     	return $this->fetch();
 
    }
}
   