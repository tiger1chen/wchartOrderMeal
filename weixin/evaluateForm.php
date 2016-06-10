<?php
include('./include/init.php');
$evaluate = new EvaluateModel();
$m = $evaluate->insertEvaluate($_GET);//向数据库插入评价内容
if($m){
	$_GET['time'] = date("Y-m-d H:i:s",$_GET['time']);
	$_GET['wid']  = substr($_GET['wid'],-5);
	echo json_encode($_GET);
}else{
	echo "error";
}
