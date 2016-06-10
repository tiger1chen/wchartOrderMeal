<?php
require_once('../include/init.php');

if(isset($_POST['name'])){
		$goods = new GoodsModel();
		if($goods ->addGoods($_POST)){
			echo "添加数据成功";
		}else{
			echo "添加数据失败";
		}
}