<?php 
 include('./include/init.php');
 $cate = new CateModel();
 $cate_goods = $cate->FCate();
 $wid = $_GET['wid'];
 $order = new MessModel();
 $orderList = $order->findOrder($wid);//查找自己已经预定的订单
 foreach($orderList as $k=>$v){
	$orderList[$k]['order_time'] = date("Y-m-d H:i:s",$orderList[$k]['order_time']);//把时间戳改格式
	$orderList[$k]['wid']  = substr($orderList[$k]['wid'],-5);//暂时用随机函数代表唯一id----缩减长度
}
 include(ROOT.'view/front/templates/index.html');

