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
	//得到所有物品
	function getAllItem($odr)
	{
		if($odr==0)
			return $this->all();
		else if($odr == 1)//钱
			return $this->order('now_price','desc')->select();
		else if($odr == 2)//时间
			return $this->order('add_time','desc')->select();
	}

	function searchItem($str)
	{
		$data = $this->where('title','like',"%$str%")->select();
		return $data;
	}


}






