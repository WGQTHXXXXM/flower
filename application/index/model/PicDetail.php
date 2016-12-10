<?php

namespace app\index\model;
use think\Model;

class PicDetail extends Model
{
	//获得商品信息
	function getPIcDetail($data)
	{
		return $this->all($data);
	}


}



