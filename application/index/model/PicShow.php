<?php

namespace app\index\model;
use think\Model;

class PicShow extends Model
{
	//获得商品信息
	function getPicShow($data)
	{
		return $this->all($data);
	}


}



