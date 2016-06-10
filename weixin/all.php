<?php 
include('./include/init.php');
$cart = CartModel::getCart();
$data = $cart->all();
$price = 0;
$menu = '';
foreach($data as $k=>$v){
	$price	+= $v['num']*$v['price'];
	$menu .=$v['name']."*".$v['num']."<br/>";
}
$data = array();
$data['menu'] = $menu;
$data['money'] = $price;
$data['customer'] = $_GET['realname'];
$data['tel']				 = $_GET['phone'];
$data['arrive_time']			 = $_GET['arrive_time'];
$data['remark']		 = $_GET['remark'];
$data['order_time'] = time();
$data['wid']	 = $_GET['wid'];
$data['order_sn']= "WL".time().rand(1,999);
$mess = new MessModel();
$res = $mess->insertMess($data);

//增加用户信息或者更新用户信息
$cus = new CustomerModel();
$data2 = $cus->findCus($_GET['wid']);//关于用户信息id  wx_user
if($data2){
	$data3['order_time'] = $data2['order_time']+1;//只需要更新订货次数
	$k = $cus->addTime($data3,$_GET['wid']);
	if(!$k){
		echo "error";
		return;
	}
}else{//如果不存在就添加 该用户信息到 wx_user表中
	$data3 = array();
	$data3['wid'] = $_GET['wid'];
	$data3['order_time'] = 1;
	$data3['fail_time']  = 0;
	$m = $cus->insertCus($data3);
	if(!$m){
		echo "error";
	}
}
if($res){
	session_destroy();
	echo "success";
}
