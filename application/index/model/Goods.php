<?php

namespace app\index\model;
use think\Model;

class Goods extends Model
{
	//获得商品信息
	function getGoods($data)
	{
		return $this->get($data);
	}


}






