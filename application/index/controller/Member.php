<?php
/**
 * 首页的控制器
 */
namespace app\index\controller;
use \think\Request;
use app\index\model\ReceiveAddress;
use app\index\model\Order;

class Member extends Auth
{
    //会员中心
    public function memberCenter()
    { 
    	
        $this->assign('dataUser',$this->getUserInfo(2)); 
    	return $this->fetch("Member/MemberCenter/index");
    }

    //个人信息管理
    function personInfoManage()
    { 
        $this->assign('dataUser',$this->getUserInfo(2)); 
    	return $this->fetch('Member/accountSetting/PersonInfoManage/index');
    }

    //头像上传
    function headPicUpload()
    {
        $this->assign('dataUser',$this->getUserInfo(2)); 
    	return $this->fetch('Member/accountSetting/HeadPicUpload/index');
    }

    //执行头像上传
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

    //保存个人信息
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

    //个人定单
    function order()
    {
        $order = new Order();
        $data = $order->getAllItem();
        $this->assign('dataOrder',$data);
        $this->view->engine->layout(false);
        return $this->fetch();
    }

    //常用地址列表
    function addResslist()
    {
        $addr = new ReceiveAddress();
        $data = $addr->getAllItem();
        $this->assign('dataAddr',$data);

        $this->view->engine->layout(false);
        return $this->fetch();
    }    

    //添加 地址框
    function WinAddress()
    {
        
        $this->view->engine->layout(false);
        return $this->fetch();        
    }

    //添加地址
    function doAddAddress()
    {
        $data['id_user'] = session('idUser');
        $data['name'] = $_POST['to_name'];
        $data['phone'] = $_POST['to_mobile'];
        $data['address'] = $_POST['to_address'];
        $data['province'] = $_POST['to_state'];
        $data['city'] = $_POST['to_city'];
        $addr = new ReceiveAddress();
        $addr->addItem($data);
        echo '保存成功';
    }

    function delAddress($id)
    {
        $addr = new ReceiveAddress();
        $addr->destroy($id);
        $data = $addr->getAllItem();
        $this->assign('dataAddr',$data);
        return $this->fetch('Member/addResslist');
    }

}