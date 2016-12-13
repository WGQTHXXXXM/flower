<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use traits\model\SoftDelete;
use think\Db;
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

/*用户回收站*/
	public function uCanRecovenUser()
	{
		$CanRecovenUser = User::onlyTrashed()->paginate(5);
		return $CanRecovenUser;
	}
	/*用户恢复*/
	public function uUserRecoven($id)
	{	/*要恢复的数据*/
		// User::save(['vir_name'=>'123'],['id'=>5]);
		// dump($this->getLastSql());

		if ($id) {
			foreach ($id as $v) {
				$UserRecovenId = User::onlyTrashed()->select($id);
			}
			
		}
		if ($UserRecovenId) {
			foreach ($id as $v) {
				db('user')->where('id',$v)->update(['delete_time' => null]);
			}
		}
	}
}