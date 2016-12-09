<?php

namespace app\admin\controller;
use think\Controller;

class Ordermanage extends Controller
{
/*订单管理*/
    public function shoppingmall(){
    

    // 	$sql = "select  yu_user.uid,yu_user.username,
    //           yu_goods.gid,yu_goods.goodsname,yu_goods.price,
    //           yu_carshop.cid,yu_carshop.create_time,yu_carshop.num,
    //           yu_carshop.totlemoney,yu_carshop.status from yu_carshop 
    //           left join yu_goods on yu_carshop.gid = yu_goods.gid
    //           left join yu_user on yu_user.uid = yu_carshop.uid";

    //   $list = Db::query($sql);
    //   $this->assign('list',$list);
     	return $this->fetch();
 
    }

}