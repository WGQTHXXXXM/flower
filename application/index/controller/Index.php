<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;
use app\index\model\User;
use app\admin\model\SlideShow;


class Index extends Auth
{

	public function _initialize()
	{
		
	}

    public function index()
    { 
        $slide = new SlideShow();
        $data = $slide->getSlideShow();
        $this->assign('dataSlide',$data);
    	return $this->fetch();
    }

    function test()
    {

    	$aa = new User();
    	$aa->test();
    }

}
