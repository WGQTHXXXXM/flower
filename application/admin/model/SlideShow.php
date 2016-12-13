<?php
namespace app\admin\model;
use think\Model;
class SlideShow extends Model
{
	function addSlideShow($data)
	{
		$this->save($data);
	}

		//获得商品信息
	function getSlideShow()
	{
		return $this->where('id','<>',0)->order('shu_xu')->select();
	}
}




