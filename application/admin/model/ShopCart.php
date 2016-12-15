<?php
namespace app\admin\model;
use think\Model;
class ShopCart extends Model
{
	/*链接商品表*/
	public function goods()
	{
		return $this->hasOne('Goods','url_num','id_goods');
	}
	
}