<?php
/**
 * 注册登录
 */
namespace app\index\controller;

class Passport extends Auth
{

	public function _initialize()
	{
		
	}

    public function register()
    { 
    	//return view('abc/index.html');
    	return $this->fetch('passport/register/index');
    }
    public function login()
    { 
    	//return view('abc/index.html');
    	return $this->fetch('passport/Login/index');
    }

    

}