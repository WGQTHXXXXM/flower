<?php
namespace app\index\model;
use think\Model;
use app\index\model\Goods;

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

	//回返板块数据
	function getShowBlcok()
	{
		$block = $this->where('id','<>',0)->order('shu_xu')->select();
		$dataBlock = [];
		$goods = new Goods();
		foreach ($block as $key => $value) 
		{
			$dataBlock[$key]['name'] = $value['name'];
			$dataBlock[$key]['introduce'] = $value->introduce; 
			$arr = [$value->id_product1,$value->id_product2,$value->id_product3,$value->id_product4,
					$value->id_product5,$value->id_product6,$value->id_product7,$value->id_product8];
			$dataBlock[$key]['product'] = $goods->selectIn($arr);
		}
		return $dataBlock;
	}


}

