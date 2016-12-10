<?php

namespace app\index\model;
use think\Model;

class PicTitle extends Model
{
	//获得商品信息
	function getPicTitle($data)
	{
		return $this->all($data);
	}


}



