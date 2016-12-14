<?php
namespace app\admin\model;
use think\Model;
class Block extends Model
{
	function getAllBlock()
	{
		return $this->where('id','<>',0)->order('shu_xu')->select();
	}

	function addBlock($data)
	{
		$this->save($data);
	}

	function delBlock($id)
	{
		$this->destroy($id);
	}

	function updataBlock($data,$id)
	{
		return $this->save($data,['id'=>$id]);
	}

	function getOneblock($id)
	{
		return $this->get($id)->toArray();
	}


}





