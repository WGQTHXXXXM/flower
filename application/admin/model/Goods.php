<?php

namespace app\admin\model;
// use think\model\Merge;
use think\Model;
use think\Db;
use traits\model\SoftDelete;
class Goods extends Model
{
	use SoftDelete;
	protected static $deleteTime = 'delete_time';

	/*插入的当前物品的ID*/
	public function goodsId($post)
	{
		$goodsid = Goods::where('title',$post['goodsname'])->value('id');
		return $goodsid;
	}

/*商品展示*/
	public function GoodsSelect()
	{
		$GoodsSelShow = Goods::name('goods')->alias('g')
		->join('PicTitle pt', 'g.id = pt.id_goods')->paginate(5);
		return $GoodsSelShow;
	}

	/*商品单个删除*/
	public function GoodsSqlDelect($gid)
	{
		$GoodsSelDelect = Db::name('goods')->alias('c')
		->join('PicTitle pt', 'c.id =pt.id_goods')
		->where('c.id ='.$gid)
		->select();
		if($GoodsSelDelect){
			Goods::destroy($GoodsSelDelect[0]['id_goods']);
		}	
	}
	/*多选删除*/
	public function GoodsAllDelect($gids)
	{
		if ($gids) {
			Goods::destroy($gids);
		}
	}


/*商品回收站*/
	public function CanRecovenGoods()
	{
		$RecovenGoodsShow = Goods::onlyTrashed('goods')->alias('g')
		->join('PicTitle pt', 'g.id = pt.id_goods')->paginate(5);
		return $RecovenGoodsShow;
	}
	/*商品恢复*/
	public function GoodsRecoven($id)
	{
		if ($id) {
			foreach ($id as $v) {
				$goodRecovenId = Goods::onlyTrashed()->select($id);
			}
			
		}
		if ($goodRecovenId) {
			foreach ($id as $v) {
				db('goods')->where('id',$v)->update(['delete_time' => null]);
			}
		}
	}
	/*彻底删除*/
	public function TrueDelGoods($Tgid)
	{
		$TrueDels = Goods::withTrashed()->select($Tgid);
		if ($TrueDels) {
			db('goods')->where('id',$Tgid)->delete();
			
		}	
	}

/*商品信息修改*/
	/*商品旧信息显示*/
	public function gOldGoodsMessage($gid)
	{
		$OldGoodsMessage = Goods::get($gid);
		return $OldGoodsMessage;
	}
	/*修改商品信息*/
	public function gAlterGoodsMessage($post)
	{
		$this->save([
				'title' => $post['title'],
				'market_price' => $post['shichangjia'],
				'now_price' => $post['hualijia'],
				'meaning' => $post['huayu'],
				'packing' => $post['baozhuang'],
				'attach' => $post['fusong'],
				'allow_city' => $post['peisong'],
			],['id'=>$post['id']]);
	}

}