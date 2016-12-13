<?php

namespace app\admin\controller;
use think\Request;
class Userrecycle extends UserBase
{
    /*删除的用户管理*/
	public function userrecycle()
    {
    	 /*删除的用户信息*/
        $CanRecovenUser = $this->adUser->uCanRecovenUser();
        $this->assign('CanRecovenUser', $CanRecovenUser);
        /*分页*/
        $userPage = $CanRecovenUser->render();
        $this->assign('userPage', $userPage);
        return $this->fetch();

    }
    /*恢复用户*/
    public function userTheRecoven()
    {
        $RecovenId = Request::instance()->post();


        if ($RecovenId) 
        {
            $RecovenSqlUser = $this->adUser->uUserRecoven($RecovenId['id']);
        }
        /*返回当前页面*/
        echo "<script>alert('恢复成功');window.location = 'userrecycle';</script>"; 
    }
}