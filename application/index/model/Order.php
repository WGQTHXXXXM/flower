<?php
namespace app\index\model;
use think\Model;
use app\index\model\Goods;

class Order extends Model
{


	//读取器：读出来后修改
	protected function getStatusAttr($value)
	{
		$status = [0=>'已取消',1=>'待付款',2=>'已付款'];
		return $status[$value];
	}

	function addItem($data)
	{
		$this->save($data);
		return $this->id;
	}

	function getItem($data)
	{
		return $this->get($data);
	}

	function getAllItem()
	{
		return $this->all();
	}

	/*关联购物车*/
	public function cart()
	{
		return $this->hasMany('ShopCart','id_order','num_order');
	}

	/*关联收货信息*/
	public function address()
	{
		return $this->hasOne('ReceiveAddress','id','id_address');
	}
	/*购物车链接用户表*/
	public function user()
	{
		return $this->hasOne('User','id','id_user');
	}

}



