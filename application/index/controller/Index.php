<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;

class Index extends Auth
{

	public function _initialize()
	{
		
	}

    public function index()
    { 
    	return $this->fetch();
    }
}
