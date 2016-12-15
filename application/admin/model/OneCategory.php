<?php

namespace app\admin\model;
use think\Model;

class OneCategory extends Model
{

	public function getBigPlate()
	{
		return OneCategory::where('id','>',0)->select();
	}
}
