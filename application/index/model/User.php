<?php

namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
	use SoftDelete;
	protected static $deleteTime = 'delete_time';

	function address()
	{
		return $this->hasMany('ReceiveAddress','id_user');
	}

	function cart()
	{
		return $this->hasMany('ShopCart','id_user');
	}


	function getItem($data)
	{
		return $this->get(1);
	}

	//  检查用户是否存在
	function hasUser($email)
	{
		return $this->get($email)->toArray();	
	}

	//添加成员 
	function addMember($data)
	{
		$this->data($data);
		$this->save();
		return $this->id;
	}
	//更新成员信息
	function updateUser($data,$id)
	{
		return $this->save($data,['id'=>$id]);
	}



}
