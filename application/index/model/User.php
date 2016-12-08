<?php

namespace app\index\model;
use think\Model;

class User extends Model
{
	//  检查用户邮箱是否存在
	function isExistEmail($email)
	{
		return User::get($email);	
	}

	//添加成员 
	function addMember($data)
	{
		$this->data($data);
		$this->save();
	}
}
