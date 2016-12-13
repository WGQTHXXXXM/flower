<?php

namespace app\admin\controller;

use think\Request;
class Usermanage extends UserBase
{
	/*用户管理*/
	 public function yonghu()
    {
        /*用户信息*/
        $ManageUser = $this->adUser->uManageUser();
        $this->assign('ManageUser', $ManageUser);
        /*分页*/
        $userPage = $ManageUser->render();
        $this->assign('userPage', $userPage);
    	return $this->fetch();
    }

    /*修改密码*/
    public function alterpswd()
    {
        $SessionAlterUser = $this->adUser->uAlterManage();
        $postAlterUser = Request::instance()->post();
        /*修改密码*/

        /*是否点击提交*/
        if ($postAlterUser) 
        {
            /*原密码是否正确*/
            if ($SessionAlterUser['password'] == $postAlterUser['mpass']) 
            {
                /*判断新密码俩次不相同*/
                if($postAlterUser['newpass'] == $postAlterUser['renewpass'])
                {
                    $SessionAlterUser->save(
                        [
                            'password' => $postAlterUser['newpass']
                        ],
                    ['id' => $SessionAlterUser['id']]);
                    echo '修改成功';
                }
                else
                {
                    echo "俩次密码不对";
                }
            }
            else
            {
                 echo '原密码错误';
            }
        }
        return $this->fetch();
    }

    /*用户删除*/
    public function UserDelete()
    {
        
        $DelUserId = Request::instance()->post();
        if ($DelUserId) {
            foreach ($DelUserId as $id) {}
            $DelSqlUser = $this->adUser->uDelSqlUser($id);
        } 
        echo "<script>alert('删除成功');window.location = 'yonghu';</script>";   
    }

    /*设置管理员*/
    public function setUserManage($uid)
    {
        //dump($uid);die;
        $this->adUser->uSetUserManage($uid);
        $this->redirect('admin/Usermanage/yonghu');
    }
    /*取消管理员*/
    public function offUserManage($uid)
    {
        //dump($uid);die;
        $this->adUser->uOffUserManage($uid);
        $this->redirect('admin/Usermanage/yonghu');
    }
}
   