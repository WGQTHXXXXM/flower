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
    	
        $this->assign('dataUser',$this->getUserInfo(2)); 
    	return $this->fetch("Member/MemberCenter/index");
    }

    function personInfoManage()
    { 
        $this->assign('dataUser',$this->getUserInfo(2)); 
    	return $this->fetch('Member/accountSetting/PersonInfoManage/index');
    }

    function headPicUpload()
    {
        $this->assign('dataUser',$this->getUserInfo(2)); 
    	return $this->fetch('Member/accountSetting/HeadPicUpload/index');
    }

    function doHeadPicUpload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info)
        {
            $this->tbUser->updateUser(['head_pic'=>'uploads/'.$info->getSaveName()],session('idUser')); 
        }
        else
        {
            // 上传失败获取错误信息
            echo $file->getError();
        }
        $this->assign('dataUser',$this->getUserInfo(2)); 
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