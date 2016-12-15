<?php

namespace app\index\model;
use think\Model;

class Goods extends Model
{

	//以下是关联图片
	public function picTitle()
	{
		return $this->hasOne('PicTitle','id_goods');
	}

	public function picShow()
	{
		return $this->hasMany('PicShow','id_goods');
	}

	public function picDetail()
	{
		return $this->hasMany('PicDetail','id_goods');
	}

	//按in查找 
    function selectIn($arr)
    {
    	return $this->where('url_num','in',$arr)->select();
    }

	//获得商品信息
	function getGoods($data)
	{
		return $this->get($data);
	}

}






