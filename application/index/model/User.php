<?php

namespace app\index\model;
use think\Model;

class User extends Model
{
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
		dump($id);
		dump($data);
		return $this->save($data,['id'=>$id]);
	}

	function test()
    {
    	return 1;
    }

}
