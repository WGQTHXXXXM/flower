<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;

class Product extends Auth
{

	public function _initialize()
	{
		
	}

    public function qwe()
    { 
    	//return view('abc/index.html');
    	return $this->fetch();
    }
}