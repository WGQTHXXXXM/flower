<?php
/**
 * 鲜花
 */
namespace app\index\controller;

class Flower extends Auth
{
	public function _initialize()
	{
		
	}

    public function index()
    { 
    	return $this->fetch();
    }
}
