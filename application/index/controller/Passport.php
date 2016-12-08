<?php
/**
 * 注册登录
 */
namespace app\index\controller;
use app\index\model\User;


class Passport extends Auth
{
    private $tbUser;

    public function abc()
    {
        $qqq = $_REQUEST['aaa'];
        $user = ['username' => 'chuhongbo', 'password' => $qqq];
        echo json_encode($user);        
    }

	public function _initialize()
	{
        $this->tbUser = new User();	
    }

    public function doRegister()
    {
        $data['email'] = $_REQUEST['Email'];
        $data['password'] = $_REQUEST['PassWord'];
        $data['reg_time'] = time();
        $this->tbUser->addMember($data);
    }

    public function register()
    { 
    	//return view('abc/index.html');
    	return $this->fetch('passport/register/index');
    }

    //注册时的验证码是否正确
    public function captchaCheck()
    {
        if(!captcha_check($_REQUEST['captcha']))
            echo json_encode(['status'=>0, 'msg'=>"失败", 'data'=>""]);
        else
            echo json_encode(['status'=>1, 'msg'=>"成功", 'data'=>""]);     
    }

    //  检查用户邮箱是否存在            
    public function isExistEmail()
    {
        if($this->tbUser->isExistEmail(['email' => $_REQUEST['email']]))
        {
            session('email',$_REQUEST['email']);
            echo json_encode(['status'=>1, 'msg'=>"成功", 'data'=>""]);
        }
        else
            echo json_encode(['status'=>0, 'msg'=>"失败", 'data'=>""]);
    }

    public function login()
    { 
    	//return view('abc/index.html');
    	return $this->fetch('passport/Login/index');
    }
    //检查用户名是否存在
    function checkUserLogin()
    {
        if($this->tbUser->isExistEmail(['email' => $_REQUEST['email'],'password'=>$_REQUEST['pwd']]))
        {
            session('email',$_REQUEST['email']);
            $name = strstr(session('email'),'@',true);
            session('name',$name);
            echo json_encode(['status'=>1, 'msg'=>"成功", 'data'=>""]);
        }
        else
        {
            echo json_encode(['status'=>0, 'msg'=>"失败", 'data'=>""]);  
        }
    }

    //通过ajax验证后跳转

    //退出
    function logout()
    {
        session(null);
        return $this->fetch('index/index');
    }
    
    //登录状态
    function loginState()
    {
        if(session('?email'))
        {
            echo json_encode(['Logined'=>1, 'ShowName'=>session('name'), 'data'=>""]);
        }
        else
        {
            echo json_encode(['Logined'=>0, 'ShowName'=>"失败", 'data'=>""]);         
        }
    }

}