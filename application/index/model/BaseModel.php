<?php

namespace app\index\model;
use think\Model;

class BaseModel extends Model
{

	//获得商品信息
	function getItem($data)
	{
		return $this->get($data);
	}

	function addItem($data)
	{
		$this->data($data);
		$this->save();
		return $this->id;
	}


}




