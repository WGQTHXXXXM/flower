<?php
namespace app\admin\controller;
//use think\View;
use think\Controller;
use app\admin\model\User;
use think\Session;
header('Access-Control-Allow-origin:*');
class Admin extends Controller
{
	public function login()
	{
		return $this->fetch();
	}
	
    public function index()
    {
        return $this->fetch();
    }

 	public function info()
 	{
 		return $this->fetch();
 	}

 	public function pass()
 	{
 		return $this->fetch();
 	}
 	// 修改管理员密码
 	  //验证密码
 	public function yz()
 	{
 		// 	$password = new Admin;
 		// $pa = $password->doPa();

 		// if($_REQUEST['password'] != $pa['password']) {
 		// 	echo json_encode(array('status'=>0,'msg'=>'请输入正确密码','data'=>[]));die();
 		// }else{
 		// 	echo json_encode(array('status'=>1,'msg'=>'密码匹配成功','data'=>[]));die();
 		// }
 	}
 	public function doPass()
 	{
 		// session('user')['username'];
 		

 		// $password = new Admin;
 		
 		// $result = $password->updatePass($_REQUEST['renewpass']);
 		// if ($result) {
 			
 		// 	echo json_encode(array('status'=>1,'msg'=>'修改成功','data'=>[]));die();
 		// }else{
 		// 	echo json_encode(array('status'=>0,'msg'=>'修改失败','data'=>[]));die();
 		// }

 		
 	}
 	public function add()
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
 	public function cate()
 	{
 		return $this->fetch();
 	}
 	public function catedit()
 	{
 		return $this->fetch();
 	}
 	public function column()
 	{
 		return $this->fetch();
 	}
 	public function page()
 	{
 		return $this->fetch();
 	}
 	public function tips()
 	{
 		return $this->fetch();
 	}
 	public function list1()
 	{
 		return $this->fetch();
 	}



	//验证码验证
	public function verify()
	{
		if(!captcha_check($_POST['verify'])){
			//验证失败
			echo json_encode(array('status'=>0,'msg'=>'','data'=>[]));die();
		} else{
			echo json_encode(array('status'=>1,'msg'=>'','data'=>[]));die();	
		}
	}
	
	 /*登录验证*/
	public function doLogin()
	{
		
		$user = new User;
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		/*model -> user*/
		$result = $user->doFind($data);
		/*判断用户名是否存在*/
		if (empty($result)) {
			$this->error('用户名不存在');
		}

		/*判断验证码*/
		// if(!captcha_check($_POST['code'])){
		// 	//验证失败
		// 	$this->error('验证码不正确');
		// }
		
		/*判断密码是否正确*/
		if ($result['password'] == $_POST['password']) {
			session('user',[
				'id' => $result['id'],
				'username' => $result['vir_name']
				]);
			$this->success('登录成功','admin/admin/index');
		}else{
			$this->error('密码错误');
		}
		return true;
	}
	
	//退出登录
	public function loginOut()
	{
		Session::clear();
		$this->success('退出成功','index/index/index');
	}
}
