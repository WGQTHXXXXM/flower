<?php
namespace app\admin\model;
use think\Model;
class User extends Model
{
	public function LoginVerify($data)
	{
		$idUser = User::get($data);
		return $idUser;
	}
}