<?php

namespace app\index\controller;

use think\Controller;

class Shopping extends Controller
{
	public function AddtoCart()
	{
		$this->view->engine->layout(false);
		return $this->fetch();
	}

	



}