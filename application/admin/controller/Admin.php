<?php

namespace app\admin\controller;

use think\Request;
class Admin extends UserBase
{
    public function login()
	{
     	return $this->fetch();		
	}
	public function index ()
	{
		return $this->fetch();
	}
    //验证码验证
	public function verify()
	{
        /*请求post数据*/
        $post = Request::instance()->post();
        if(!captcha_check($post['verify']))
        {
            echo json_encode(array('status'=>0,'msg'=>'','data'=>[]));
        } else{
            echo json_encode(array('status'=>1,'msg'=>'','data'=>[]));
        }	  

	}
    /*用户名密码验证*/
    public function checkLogin()
    {
        $post = Request::instance()->post();
        $data['vir_name'] = $post['verifyUser'] ;
		$data['password'] = $post['verifyPswd'] ;
        $data['is_admin'] = 1;
        /*核对数据*/
        $idUser = $this->adUser->uCheckLogin($data);
        if($idUser)
        {
            echo json_encode(array('status'=>1,'msg'=>'','data'=>[]));
            session('user',$data['vir_name']);
            session('id',$idUser->id);
        }
        else
            echo json_encode(array('status'=>0,'msg'=>'','data'=>[]));
           
    }
    /*主页 退出登录*/
	public function logout()
	{
			session(null);
			$this->success('退出成功','admin/admin/login');
	}
    /*主页 欢迎界面*/
    public function info()
    {
     	return $this->fetch();
    }



    public function tips()
    {
 		return $this->fetch();
    }
    public function pass()
    {
     	return $this->fetch();
    }
    public function page()
    {
     	return $this->fetch();
    }
    public function adv()
    {
     	return $this->fetch();
    }
    public function book()
    {
     	return $this->fetch();
    }
    //  public function list()
    // {
    //  	return $this->fetch();
    // }
    public function cateedit()
    {
     	return $this->fetch();
    }

    // public function shangpinupdate($gid)
    // {
    // 	$shangpin = GoodsModel::get($gid);
    // 	$this->assign('shangpin',$shangpin);
    	

    // 	return $this->fetch();
    // }

}



