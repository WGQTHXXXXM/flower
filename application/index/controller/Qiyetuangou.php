<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;

class Qiyetuangou extends Auth
{

	public function _initialize()
	{
		
	}

    public function index()
    { 
    	//return view('abc/index.html');
    	return $this->fetch();
    }
}