<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use traits\model\SoftDelete;
class User extends Model
{

	/*软删除*/
	use SoftDelete;
	protected static $deleteTime = 'delete_time';
	
	/*登录验证*/
	public function uCheckLogin($data)
	{
		$idUser = User::get($data);
		return $idUser;
	}
	/*用户管理*/
	public function uManageUser()
	{
		$ManageUser = User::where('id','>',0)->paginate(5);
		return $ManageUser;
	}
	/*修改管理员密码*/
	public function uAlterManage()
	{
		$SessionUser = User::get(Session::get('name'));

		return $SessionUser;
	}
	/*删除用户*/
	public function uDelSqlUser($id)
	{
		User::destroy($id);
	}
}