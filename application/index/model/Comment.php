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

	//读取器：读出来后修改
	protected function getAddTimeAttr($time)
	{
		return date('Y-m-d',$time);
	}

	protected function getIdUserAttr($id)
	{
		return $this->hasOne('User')->where('id',$id)->find();
	}




}





