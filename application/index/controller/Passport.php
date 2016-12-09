<?php
/**
 * 注册登录
 */
namespace app\index\controller;


class Passport extends Auth
{
    public function doRegister()
    {
        $data['email'] = $_REQUEST['Email'];
        $data['password'] = $_REQUEST['PassWord'];
        $data['reg_time'] = time();
        session('idUser',$this->tbUser->addMember($data));   
        return $this->fetch('Member/memberCenter/index');     
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
        $result = $this->tbUser->hasUser(['email' => $_REQUEST['email']]);
        if($result)
            echo json_encode(['status'=>1, 'msg'=>"成功", 'data'=>""]);
        else
            echo json_encode(['status'=>0, 'msg'=>"失败", 'data'=>""]);
    }

    public function login()
    { 
    	//return view('abc/index.html');
    	return $this->fetch('passport/Login/index');
    }
    //检查用户名和密码是否正确
    function checkUserLogin()
    {
        $result = $this->tbUser->hasUser(['email' => $_REQUEST['email'],'password'=>$_REQUEST['pwd']]);
        if($result)
        {
            $name = strstr($_REQUEST['email'],'@',true);
            session('name',$name);
            session('idUser',$result['id']);
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
        if(session('?idUser'))
        {
            echo json_encode(['Logined'=>1, 'ShowName'=>session('name'), 'data'=>""]);
        }
        else
        {
            echo json_encode(['Logined'=>0, 'ShowName'=>"失败", 'data'=>""]);         
        }
    }

}