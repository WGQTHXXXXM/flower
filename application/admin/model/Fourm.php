<?php
namespace app\admin\model;
use think\Model;

use think\Request;
use traits\model\SoftDelete;

class Fourm extends Model
{


	use SoftDelete;
	protected static $deleteTime = 'delete_time';
	


	// public function profile()
	// {
	// 	return $this->hasOne('Profile','user_id');
	// }	



	// public function setIpAttr()
	// {
	// 	return Request::instance()->ip();
	// }



	public function getFfidAttr($value)
	{
		$ffid = [
			0 => '一级板块',
			1 => '二级板块',
		

		];
		if($value == 0){
			return $ffid[0];

		}else{
			return $ffid[1];

		}

	}
	// public function setPasswordAttr($value)
	// {
	// 	return md5($value);
	// }

}