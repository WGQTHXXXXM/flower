<?php

namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
	use SoftDelete;
	protected static $deleteTime = 'delete_time';
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

	function test()
    {
  	 	// $this->destroy(3);
    	// dump($this->getLastSql());
    }

}
