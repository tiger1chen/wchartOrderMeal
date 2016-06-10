<?php
require_once('../include/init.php');

if(isset($_POST['name'])){
		$cate = new CateModel();
		if($cate ->addCate($_POST)){
			echo "添加数据成功";
		}else{
			echo "添加数据失败";
		}
}