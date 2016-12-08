<?php

/** * 定义一个后台登录模型，对应后台管理员表 */

namespace app\admin\model;

use think\Model;
use think\Db;


class User extends Model
{
	
	// 	查找用户
	public function doFind($data = array())
	{
		return Db::name('user')->where('vir_name',$data['username'])->find();
	}
	

		//修	改密码
		//进	行比对
	// 	public function doPa() 
	// 	{
		
	// 			return Db::name('admin')->where('username',session('user')['username'])->find();
		
		
	// }
	
	// 	//更	新密码
	// 	public function updatePass($date = array())
	// 	{
		
	// 			return Db::table('home_admin')->where('username',session('user')['username'])->setField('password',$_POST['renewpass']);
		
	// }
	
}
