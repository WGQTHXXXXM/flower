<?php
/**
 * 注册登录
 */
namespace app\index\controller;


class Passport extends Auth
{
    public function abc()
    {
        $qqq = $_REQUEST['aaa'];
        $user = ['username' => 'chuhongbo', 'password' => $qqq];
        echo json_encode($user);        
    }

	public function _initialize()
	{
		
	}

    public function register()
    { 
    	//return view('abc/index.html');
    	return $this->fetch('passport/register/index');
    }

    public function IsExistEmail()
    {
        if($_REQUEST['email'] == '123@qq.com')
            echo json_encode(['status'=>1, 'msg'=>"成功", 'data'=>""]);
        else
            echo json_encode(['status'=>0, 'msg'=>"失败", 'data'=>""]);
    }

    public function login()
    { 
    	//return view('abc/index.html');
    	return $this->fetch('passport/Login/index');
    }

    

}