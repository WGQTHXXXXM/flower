<?php

namespace app\admin\controller;
use think\Controller;

class Plateshow extends Controller
{
	/*模块这展示*/
   public function fourmshow()
    {

    	// $fourm = new FourmModel();
   		// $list = $fourm->paginate(6);

        // $page = $list->render();
        // $this->assign('page',$page);
        // $this->assign('list',$list);
    	return $this->fetch();
 		
    }
}
   