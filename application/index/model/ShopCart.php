<?php

namespace app\index\model;
use think\Model;

class ShopCart extends Model
{
	//获得商品信息
	function getItem($data)
	{
		return $this->where($data)->select();
	}

	function getSumPrice($data)
	{	
		$goodsNum = $this->where($data)->select();
		$sum = 0;
		foreach ($goodsNum as $key => $value) 
		{
			$sum += $value->goods->now_price;
		}
		return $sum;
	}

	function addItem($data)
	{
		$this->data($data);
		$this->save();
		return $this->id;
	}

	function getAllItem()
	{
		return $this->where('id','<>',0)->select();
	}

	public function goods()
	{
		return $this->hasOne('Goods','url_num','id_goods');
	}

}


