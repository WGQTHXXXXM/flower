<?php

namespace app\admin\model;
use think\Model;
class PicTitle extends Model
{
	/*修改首页展示图*/
	public function gAlterGoodsHomeImg($path,$post)
	{
		$this->save([
				'path' => $path,
			],['id_goods'=>$post['id']]);
	}
}