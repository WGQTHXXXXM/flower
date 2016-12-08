<?php

namespace app\admin\controller;

use think\Controller;
use think\Loader;
use think\Validate;
use app\admin\Model\Fourm as FourmModel;
use app\admin\Model\Goods as GoodsModel;
use app\admin\Model\User as UserModel;
use app\admin\Model\Admin as AdminModel;

use think\Db;
use think\Request;

class Admin extends Controller
{

	public function index ()
	{
    	 return $this->fetch();

	}
	public function checklogin()
	{
        // dump($_POST);
        // exit;
        $loginname = $_POST['adminname'];
      
        $admin = AdminModel::get(['adminname' => $loginname]);
        if(!$admin){
             $this->error('用户名错误或不存在');
        }        
        if($admin['password'] != trim($_POST['password'])){
            $this->error('密码错误');
        }else{
           session('adminname',$admin['adminname']);
          $this->success('登录成功','admin/admin/index');
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
    public function userrecycle()
    {
    	$list = UserModel::onlyTrashed()->paginate(4);

    	// $list = $user->paginate(6);
        $page = $list->render();
        $this->assign('page',$page);
        $this->assign('list',$list);

     	return $this->fetch();
 
    }
    public function yonghu()
    {
    	$user = new UserModel();

    	$list = $user->paginate(6);
        $page = $list->render();
        $this->assign('page',$page);
        $this->assign('list',$list);
    	return $this->fetch();
    }
    public function userdel($uid)
    {
    	 if(UserModel::destroy($uid)){
			$this->success('删除成功');
        }else{
			$this->error('删除成功');
        }
    }
    public function userdelall()
    {
              $uid = $_REQUEST['id'];  
              $time = date('Y-m-y H:i:s',time());
              if(is_array($uid)){   
                  $where = implode(',',$uid);

              }else{  
                  $where = $uid; 
              }  
              
              $list=Db::name('user')->where('uid','in',$where)->update(['delete_time' => $time]); 

              if($list!==false) {
                 $this->success("成功删除{$list}条!"); 
              }else{   
                $this->error('删除失败！');  
              }
    }
  
    public function userrecover($uid)
    {

    		$user = new UserModel;
    		$data = $user->save(['delete_time' => 'null'],['uid' => "$uid"]);
    		if ($data){
    			$this->success('用户恢复成功');
    		}else{
    			$this->error('用户恢复成功');

    		}
    }

    public function shangpin()
    {

          $good = new GoodsModel();
      //模糊查询
      // if($_GET){
      //     $key = $_GET['keyword'];
      //     $list = $good->where('goodsname','like',$key)->paginate();
      // }else{
      //     $list = $good->paginate(3);
          
      // }
    	$list = $good->paginate(6);
        $page = $list->render();
        $this->assign('page',$page);
        $this->assign('list',$list);
     	return $this->fetch();
 
    }
     public function shangpindel($gid)
    {
    	 if(GoodsModel::destroy($gid)){
			$this->success('删除成功');
        }else{
			$this->error('删除成功');
        }
    }
     public function shangpindelall()
    {
    	   $good = new GoodsModel(); 
              $gid = $_REQUEST['id'];  
              
              if(is_array($uid)){   
                $where = 'gid in('.implode(',',$gid).')';  
              }else{  
               $where = 'gid='.$gid; 
              }  
              $list=$good->where($where)->delete();  
              if($list!==false) {
                 $this->success("成功删除{$list}条!"); 
              }else{   
                $this->error('删除失败！');  
              }
    }

     public function goodrecycle()
    {
    	$list = GoodsModel::onlyTrashed()->paginate(4);

    	// $list = $user->paginate(6);
        $page = $list->render();
        $this->assign('page',$page);
        $this->assign('list',$list);

     	return $this->fetch();
 
    }
    public function shoppingmall()
    {

    	$sql = "select  yu_user.uid,yu_user.username,
              yu_goods.gid,yu_goods.goodsname,yu_goods.price,
              yu_carshop.cid,yu_carshop.create_time,yu_carshop.num,
              yu_carshop.totlemoney,yu_carshop.status from yu_carshop 
              left join yu_goods on yu_carshop.gid = yu_goods.gid
              left join yu_user on yu_user.uid = yu_carshop.uid";





      $list = Db::query($sql);
      $this->assign('list',$list);
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
    public function goodadd()
    {


    	$fourm = new FourmModel();
   		$list = $fourm->where('ffid','>',0)->select();

    	$this->assign('list',$list);
    	return $this->fetch();
 
    }
    public function goodcreate()
    {
    	$file = request()->file('picturepath');   
    	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');   
    	// dump($info);
    	$picturepath = $info->getSaveName();
    	if($info){    
		      echo $info->getExtension();       
		      echo $info->getSaveName();   
		      echo $info->getFilename();     
    	}else{    
    	      echo $file->getError();  
    	} 
    	$good = new GoodsModel();
		$addgood = $good->allowField(true)->save([
				'fid' => input('post.fid'),
				'goodsname'=>input('post.goodsname'),
				'goods_key' => input('post.goods_key'),
				'price' => input('post.price'),
				'goods_desc' => input('post.goods_desc'),
				'ishot' => input('post.ishot'),
				'isborn' => input('post.isborn'),
				'isnew' => input('post.isnew'),
				'isgirl' => input('post.isgirl'),
				'isborn' => input('post.isboy'),
				'isdouble' => input('post.isdouble'),
				'isdiy' => input('post.isdiy'),

				'picturepath' => $picturepath]);
			
		if($addgood) {
			$this->success('新增成功');
		} else {
			$this->error('新增失败');
		}
   	
    }
    public function shangpin_update_create($gid)
    {
    	

    	$data = $_POST;
		
		$rule = [
			'goodsname' => 'require',
			'goods_key' => 'require',
			'goods_desc' => 'require',
			'price' => 'require',
			'picturepath' => 'require',
			'ishot' => 'require',
			'isgirl' => 'require',
			'isboy' => 'require',
			'isnew' => 'require',
			'isdiy' => 'require',
			'isdouble' => 'require',


			
		];
		$message = [
			'goods_desc.require' => '商品描述不能为空',
			'price.require' => '商品价格不能为空',
			'goodsname.require' => '商品名不能为空',
			'goods_key.require' => '关键字不能为空',
			'picturepath.require' => '商品价格不能为空',			
		];
		$validate = new Validate($rule,$message);
		$result = $validate->check($data);
		if(!$result){
			echo $validate->getError();
			exit;
		
		}else{

			$file = request()->file('picturepath');   
    	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');   
    	// dump($info);
    	$picturepath = $info->getSaveName();
    	if($info){    
		      echo $info->getExtension();       
		      echo $info->getSaveName();   
		      echo $info->getFilename();     
    	}else{    
    	      echo $file->getError();  
	    }
			$addgood = $shangpin->allowField(true)->save([
				// 'fid' => input('post.fid'),
				'goodsname'=>input('post.goodsname'),
				'goods_key' => input('post.goods_key'),
				'price' => input('post.price'),
				'goods_desc' => input('post.goods_desc'),
				'ishot' => input('post.ishot'),
				'isborn' => input('post.isborn'),
				'isnew' => input('post.isnew'),
				'isgirl' => input('post.isgirl'),
				'isborn' => input('post.isboy'),
				'isdouble' => input('post.isdouble'),
				'isdiy' => input('post.isdiy'),

				'picturepath' => $picturepath]);
			
		if($addgood) {
			$this->success('新增成功');
		} else {
			$this->error('新增失败');
		}	




		}
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
    public function addfourm()
    {
    	$fourm = new FourmModel();
    	$list = $fourm->where('ffid',0)->select();

    	$this->assign('list',$list);

     	return $this->fetch();
 
    }
    public function createfourm()
    {
    	$data = $_POST;
    	$fourm = new FourmModel($data);
    	$create = $fourm->allowField(true)->save();
    	if($create){
    		$this->success('添加板块成功');
    	}else{
    		$this->error('添加板块成功');

    	}
    }
    public function fourmshow()
    {

    	$fourm = new FourmModel();
   		$list = $fourm->paginate(6);

        $page = $list->render();
        $this->assign('page',$page);
        $this->assign('list',$list);
    	return $this->fetch();
 		
    }
    public function cateedit()
    {


     	return $this->fetch();
 
    }

   
}



