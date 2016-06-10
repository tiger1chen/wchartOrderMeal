<?php
if(!isset($_POST['strName'])){
	require_once('../include/init.php');
	require_once(ROOT.'view/admin/templates/login.html');
}else{
	require_once('../include/init.php');
	$login = new LoginModel();
	$login->get_user_login($_POST['strName'],$_POST['strPassword'],$_POST['check_pic']);
}