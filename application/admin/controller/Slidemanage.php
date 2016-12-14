<?php

namespace app\admin\controller;

use think\Request;
use app\admin\model\SlideShow;
use think\Controller;

class SlideManage extends Controller
{
    public function doAddSlide()//添加轮播图
    {
    	$slide = new SlideShow();
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('imgUpload');
        if(!$file)
        {   
            $this->error('上传出错');           
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        $path = '';
        if($info)
        {
            $path = 'uploads/'.str_replace('\\','/',$info->getSaveName());
            $data['pic'] = $path;
	        $data['name'] = $_POST['title'];
	        $data['detail'] = $_POST['note'];
	        $data['shu_xu'] = $_POST['sort'];
	        $data['url'] = $_POST['url'];
       		$slide->addSlideShow($data);
        }
        else
        {
            // 上传失败获取错误信息
            echo $file->getError();
        }	
        $data = $slide->getSlideShow();
        $this->assign('dataSlide',$data);

       	return $this->fetch('admin/adv');
    }

    public function getInfo($id)
    {
        $slide = new SlideShow();
        $slide->getSlideShow($id);
    }

    //修改
    public function mdfSlide()
    {
        $slide = new SlideShow();
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('mdfimgUpload');
        if(!$file)
        {   
            $this->error('上传出错');           
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        $path = '';
        if($info)
        {
            $path = 'uploads/'.str_replace('\\','/',$info->getSaveName());
            $data['pic'] = $path;
            $data['name'] = $_POST['mdftitle'];
            $data['detail'] = $_POST['mdfnote'];
            $data['shu_xu'] = $_POST['mdfsort'];
            $data['url'] = $_POST['mdfurl'];
            $slide->updateUser($data,$_POST['mdfId']);
            $data = $slide->getSlideShow();
            $this->assign('dataSlide',$data);
            return $this->fetch('admin/adv');
        }
        else
        {
            // 上传失败获取错误信息
             $this->error('上传出错');
        }   
    }
    //删除
    function delSlide($id)
    {
        $slide = new SlideShow();
        $slide->delSlide($id);        
        $data = $slide->getSlideShow();
        $this->assign('dataSlide',$data);
        return $this->fetch('admin/adv');
    }

}






