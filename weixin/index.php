<?php 
 include('./include/init.php');
 $cate = new CateModel();
 $cate_goods = $cate->FCate();
 $wid = $_GET['wid'];
 $order = new MessModel();
 $orderList = $order->findOrder($wid);//�����Լ��Ѿ�Ԥ���Ķ���
 foreach($orderList as $k=>$v){
	$orderList[$k]['order_time'] = date("Y-m-d H:i:s",$orderList[$k]['order_time']);//��ʱ����ĸ�ʽ
	$orderList[$k]['wid']  = substr($orderList[$k]['wid'],-5);//��ʱ�������������Ψһid----��������
}
 include(ROOT.'view/front/templates/index.html');

