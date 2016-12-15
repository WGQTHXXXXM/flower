<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;
use app\index\model\User;
use app\index\model\Block;
use app\admin\model\SlideShow;


class Index extends Auth
{

	public function _initialize()
	{
		
	}

    public function index()
    { 
        //轮播图
        $slide = new SlideShow();
        $data = $slide->getSlideShow();
        $this->assign('dataSlide',$data);
        //板块
        $block = new Block();
        $dataBlock = $block->getShowBlcok();
        $this->assign('dataBlock',$dataBlock);

    	return $this->fetch();
    }

    function test()
    {

    	$aa = new User();
    	$aa->test();
    }

}
