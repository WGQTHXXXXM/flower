<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use traits\model\SoftDelete;
class Order extends Model
{
	use SoftDelete;
	protected static $deleteTime = 'delete_time';
	/*查询全部订单*/
	public function getOrder()
	{
		return $this::all();
	}

	/*关联购物车*/
	public function cart()
	{
		return $this->hasMany('ShopCart','id_order','num_order');
	}

	/*关联收货信息*/
	public function receive()
	{
		return $this->hasOne('ReceiveAddress','id','id_address');
	}
	/*购物车链接用户表*/
	public function user()
	{
		return $this->hasOne('User','id','id_user');
	}


	/*订单状态修改->已发货*/
    public function oOrderStatus($id)
    {
    	$this->save([
					'status' => '1'
				],['id' => $id]);
    }
    /*订单状态修改->取消订单*/
    public function oOrderStatusOne($id)
    {
    	$this->save([
						'status' => '2'
					],['id' => $id]);
    }
    /*取消订单后->删除订单*/
    /*交易完成删除订单*/
    public function oOrderDel($id)
    {
    	Order::destroy($id);
    }


 /*订单回收站*/
 	public function getOrderDel()
 	{
 		return $this::onlyTrashed()->select();
 	}
 	/*订单恢复*/
	public function oOrderRecove($id)
	{
		/*先回复待回复状态*/
		Db('Order')->where('id',$id)->update(['status' => 0]);
		/*再恢复删除记录*/
		Db('Order')->where('id',$id)->update(['delete_time' => null]);
	}
	/*订单彻底删除*/
	public function oOrderTrueDel($id)
	{
		Db('Order')->where('id',$id)->delete();
	}
}