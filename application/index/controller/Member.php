<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;
use \think\Request;

class Member extends Auth
{
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
        $Request = Request::instance()->post();
        $data['vir_name'] = $Request['realname'];
        $data['sex'] = $Request['sex'];
        $data['bir_year'] = $Request['year'];
        $data['bir_month'] = $Request['month'];
        $data['bir_day'] = $Request['day'];
        $data['mphone'] = $Request['mobile'];
        $data['tel_phone'] = $Request['tel'];
        $data['city'] = $Request['state'];
        if($this->tbUser->updateUser($data,session('idUser')))
            $this->success('修改成功');
        else
            $this->error('修改出错');
    }

}