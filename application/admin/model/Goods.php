<?php

namespace app\admin\model;
use think\Model;

class Goods extends Model
{
	/*插入的当前物品的ID*/
	public function goodsId($post)
	{
		$goodsid = Goods::where('title',$post['goodsname'])->value('id');
		return $goodsid;
	}
}