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
	function getSlideShow($id = null)
	{
		if($id == null)
			return $this->where('id','<>',0)->order('shu_xu')->select();
		else
			echo json_encode($this->where('id',$id)->order('shu_xu')->find($id));
	}


	//更新成员信息
	function updateUser($data,$id)
	{
		return $this->save($data,['id'=>$id]);
	}

	function delSlide($id)
	{
		$this->destroy($id);
	}

}




