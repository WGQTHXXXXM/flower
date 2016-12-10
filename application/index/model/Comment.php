<?php

namespace app\index\model;
use think\Model;
//use app\index\model\User;

class Comment extends Model
{
	//获得商品信息
	function getComment($data)
	{
		return $this->all($data);
	}


	function test()
	{
		dump($this->find(1)->hasOne('User'));
	}
}





