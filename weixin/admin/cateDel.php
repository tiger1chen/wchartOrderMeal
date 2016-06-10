<?php
	require_once('../include/init.php');
	$cate = new CateModel();

	if(!($cate->findF($_POST['id']))){
		if($cate->deleteCate($_POST['id'])){
			echo "delete successful!";
			exit();
		}
		echo "delete successful!|";
		exit();
	}else{
	
		echo '此栏目下还有子栏目不允许删除';
		exit();
	}