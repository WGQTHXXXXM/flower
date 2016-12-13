<?php

namespace app\admin\controller;
use think\Controller;
use think\Request;

use app\admin\model\Goods;
use app\admin\model\PicTitle;
use app\admin\model\PicShow;
use app\admin\model\PicDetail;

class Goodsadd extends Controller
{

/*商品添加*/
	public function goodadd()
    {
    	return $this->fetch();
    }
    /*添加商品信息*/
    public function Addgoods()
    {
    	$post = Request::instance()->post();
    	/*商品信息*/
    	$goodsInfo = new Goods();
    	$goodsIfonTrue = $goodsInfo->save(
    			[
    				'id_category1' => input('post.fid'),
    				'id_category2' => input('post.fid'),
    				'title' => input('post.goodsname'),
    				'now_price' => input('post.hualijia'),
    				'url_num' => session('id').time(),
    				'material' => input('post.cailiao'),
    				'packing' => input('post.baozhuang'),
    				'meaning' => input('post.huayu'),
    				'attach' => input('post.fusong'),
    				'allow_city' => input('post.peisong'),
    				'tips' => input('post.tishi'),
    				'introduce' => input('post.shuoming'),
    				'market_price' => input('post.price'),
    				'add_time' => time(),
    			]
    		);
    		/*获取商品在表中的id*/
    		$goodsId = $goodsInfo->goodsId($post);

    	/*首页展示图*/
    	// if ($goodsIfonTrue) {
    		$file = request()->file('HomeImg'); 
	    	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	    	if($info){  
	    	/*存储路径*/  
			    $path = $info->getSaveName();      
	    	}else{    
	    	    echo $file->getError();  
	    	}

	    	$PicTitle = new PicTitle();
	    	$PicTitleTrue = $PicTitle->save([
	    			'path' => $path,
	    			'id_goods' => $goodsId
	    		]);
    	// }
    		
    	/*详情图*/
    	// if ($PicTitleTrue) {
    		$fileImgs = request()->file('image');  
    		foreach($fileImgs as $v){
				// 移动到框架应用根目录/public/uploads/ 目录下
				$info = $v->move(ROOT_PATH . 'public' . DS . 'uploads');
				if($info)
				{
					/*存储路径*/
			   		 $path2 = $info->getSaveName();
				}
				else
				{
				// 上传失败获取错误信息
					echo $file->getError();
				}

				$PicDetail = new PicDetail();
	    		$PicDetailTrue = $PicDetail->save([
	    			'path' => $path2,
	    			'id_goods' => $goodsId
	    		]);
			} 	
    	// }

    	/*商品内容展示图*/
    	//if ($PicDetailTrue) {
    		$fileHomes = request()->file('HomesImg');  
    		foreach($fileHomes as $val){
		    	$info = $val->move(ROOT_PATH . 'public' . DS . 'uploads');
		    	if($info){    
		    		/*存储路径*/
				    $path1 = $info->getSaveName();      
		    	}else{    
		    	    echo $file->getError();  
		    	}
		    	$PicShow = new PicShow();
		    	$PicShowTrue = $PicShow->save([
		    			'path' => $path1,
		    			'id_goods' => $goodsId
		    		]);
	    	}
    	//}

    	//if ($PicDetailTrue) {
    		echo "<script>alert('添加成功');window.location = 'goodadd';</script>";
    	//}
    }
}