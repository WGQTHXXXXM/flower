<?php

namespace app\index\model;
use think\Model;

class ReceiveAddress extends Model
{

	function addItem($data)
	{
		return $this->save($data);
	}

	function getAllItem()
	{
		return $this->all();
	}

	function getItem($data)
	{
		return $this->get($data);
	}

}

