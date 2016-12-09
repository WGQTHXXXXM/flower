<?php
namespace app\admin\model;
use think\Model;
class User extends Model
{
	public function uCheckLogin($data)
	{
		$idUser = User::get($data);
		return $idUser;
	}
}