<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Block;
use think\Request;

class Plateshow extends Controller
{
	/*模块这展示*/
   	public function fourmshow(Block $Block)
	{
		/*搜索*/
		// $post = Request::instance()->post();
		//  if ($post) {
  //           if ($post['keyword']){
  //           	$block = new Block();
  //               $orderMsg = $block->sousuo($post['keyword']);
  //               //dump($GoodsSelShow);die;
  //               $this->assign('orderMsg',$orderMsg);
  //           }else{
  //               $this->error('搜索无结果','admin/goodsmanage/shangpin');
  //           }
  //       }else{ 
			$block = new Block();
			$data = $block->getAllBlock();
			$this->assign('dataBlock',$data);
		// }
		return $this->fetch();
	}

	public function addItem()
	{
		$block = new Block();
		$block->addBlock($_POST);		
	}

	public function delItem($id)
	{
		$block = new Block();
		$block->delBlock($id);	
		$data = $block->getAllBlock();
        $this->assign('dataBlock',$data);
        return $this->fetch('plateShow/fourmshow');	
	}

	public function updataItem($id)
	{
		$block = new Block();
		$block->updataBlock($_POST,$id);
		// 	$this->success('修改成功');
		// else
		// 	$this->error('修改失败');
		// $data = $block->getAllBlock();
  //       $this->assign('dataBlock',$data);
  //       $this->redirect('plateShow/fourmshow');		
	}

	function getOneblock($id)
	{
		$block = new Block();
		$data = $block->getOneblock($id);	
		echo json_encode($data);		
	}

}
   