<?php
//这里的name还没给定 ，注意改了
include('./include/init.php');
$goods = new GoodsModel();
if(!isset($_GET['act'])){
	$data = $goods->getGoods();
	echo json_encode($data);
}else{
	$cart = CartModel::getCart();
	if($_GET['opr'] == "add" ){
        $food =  $goods->findGoods($_GET['id']);
		$cart->addItem($food['id'],$_GET['g_name'].":".$food['name'],$food['price'],1);
		$data = $cart->all();
		echo json_encode($data);
	}else{
		$cart->decNum($_GET['id'],1);
		$data = $cart->all();
		echo json_encode($data);
	}
}

