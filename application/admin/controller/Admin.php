<?php

namespace app\admin\controller;

use think\Request;
class Admin extends UserBase
{

	public function index ()
	{
		
		/*核查用户名密码*/
		$post = Request::instance()->post();		
		$data['vir_name'] = $post['username'] ;
		$data['password'] = $post['password'] ;
	//	dump($post);
      	$idUser = $this->adUser->LoginVerify($data);
		if($idUser){
			session('user',  $post['username']);
			return $this->fetch();
			  
		}else{
			return $this->fetch('admin/login');
		}
		dump(session('user'));	

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

	public function logout()
	{
			session(null);
			$this->success('退出成功','admin/admin/login');


	}
    public function login()
	{
     	return $this->fetch();		
	}
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
/*模块管理*/
   public function fourmshow()
    {

    	// $fourm = new FourmModel();
   		// $list = $fourm->paginate(6);

        // $page = $list->render();
        // $this->assign('page',$page);
        // $this->assign('list',$list);
    	return $this->fetch();
 		
    }
/*用户管理*/
	 public function yonghu()
    {
    	// $user = new UserModel();

    	// $list = $user->paginate(6);
        // $page = $list->render();
        // $this->assign('page',$page);
        // $this->assign('list',$list);
    	return $this->fetch();
    }
/*商品管理*/
	public function shangpin()
    {

    //       $good = new GoodsModel();
    //   //模糊查询
    //   // if($_GET){
    //   //     $key = $_GET['keyword'];
    //   //     $list = $good->where('goodsname','like',$key)->paginate();
    //   // }else{
    //   //     $list = $good->paginate(3);
          
    //   // }
    // 	$list = $good->paginate(6);
    //     $page = $list->render();
    //     $this->assign('page',$page);
    //     $this->assign('list',$list);
     	return $this->fetch();
 
    }
/*订单管理*/
 public function shoppingmall(){
    

    // 	$sql = "select  yu_user.uid,yu_user.username,
    //           yu_goods.gid,yu_goods.goodsname,yu_goods.price,
    //           yu_carshop.cid,yu_carshop.create_time,yu_carshop.num,
    //           yu_carshop.totlemoney,yu_carshop.status from yu_carshop 
    //           left join yu_goods on yu_carshop.gid = yu_goods.gid
    //           left join yu_user on yu_user.uid = yu_carshop.uid";

    //   $list = Db::query($sql);
    //   $this->assign('list',$list);
     	return $this->fetch();
 
    }
    public function shangpinupdate($gid)
    {
    	$shangpin = GoodsModel::get($gid);
    	$this->assign('shangpin',$shangpin);
    	

    	return $this->fetch();
    }
    // public function list()
    // {
    //  	return $this->fetch();
    // }
/*版块添加*/
    public function addfourm()
    {
    	// $fourm = new FourmModel();
    	// $list = $fourm->where('ffid',0)->select();

    	// $this->assign('list',$list);

     	return $this->fetch();
 
    }
/*商品添加*/
	public function goodadd()
    {
    	// $fourm = new FourmModel();
   		// $list = $fourm->where('ffid','>',0)->select();
    	// $this->assign('list',$list);
    	return $this->fetch();
    }
/*用户管理*/
	public function userrecycle()
    {
    	// $list = UserModel::onlyTrashed()->paginate(4);
    	// // $list = $user->paginate(6);
        // $page = $list->render();
        // $this->assign('page',$page);
        // $this->assign('list',$list);

     	return $this->fetch();
    }
/*商品管理*/
	public function goodrecycle()
    {
    	// $list = GoodsModel::onlyTrashed()->paginate(4);
    	// // $list = $user->paginate(6);
        // $page = $list->render();
        // $this->assign('page',$page);
        // $this->assign('list',$list);

     	return $this->fetch();
    }
    public function cateedit()
    {
     	return $this->fetch();
    }

   
}



