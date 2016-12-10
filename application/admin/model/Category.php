<?php

namespace app\admin\model;
use think\Model;

class Category extends Model
{
	public function getBigPlate()
	{
		return Category::where('parent_id','=',0)->select();
	}
}