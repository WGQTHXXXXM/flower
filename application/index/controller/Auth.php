<?php
/**
 * 用户验证的基类
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\User;
use app\admin\model\SlideShow;

class Auth extends Controller
{
	//用户模块的对象
	protected $tbUser;

    public function _initialize()
	{
        $this->tbUser = new User();	
    }

    /**
     * 返回用户信息
     * @param  [type] $type [1:json; 2:arr; 3:obj;]
     * @return [type]       [description]
     */
    protected function getUserInfo($type)
    {
    	if($type == 1)
    		echo json_encode($this->tbUser->hasUser(['id'=>session('idUser')]));
    	else if($type == 2)
    		return $this->tbUser->hasUser(['id'=>session('idUser')]);
    }


    

}




