<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;
use \think\Request;

class Member extends Auth
{

	public function _initialize()
	{
		
	}

    public function memberCenter()
    { 
    	//return view('abc/index.html');
    	return $this->fetch("Member/MemberCenter/index");
    }

    function personInfoManage()
    {
    	return $this->fetch('Member/accountSetting/PersonInfoManage/index');
    }

    function headPicUpload()
    {
    	return $this->fetch('Member/accountSetting/HeadPicUpload/index');
    }

    function personInfoSave()
    {
        dump(Request::instance()->post());
    }

}