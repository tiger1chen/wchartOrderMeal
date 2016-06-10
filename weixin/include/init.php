<?php
/***
初始化框架作用
***/
define('ROOT',str_replace('\\','/',dirname(dirname(__FILE__))).'/');
define('DEBUG',true);

require(ROOT.'include/lib_base.php');

function __autoload($class) {
	if(strtolower(substr($class,-5)) == 'model'){
		require(ROOT.'Model/'.$class.'.class.php');
	}else{
		require(ROOT.'include/'.$class.'.class.php');
	}
}

$_GET   = _addslashes($_GET);
$_POST  = _addslashes($_POST);
$_COOKIE= _addslashes($_COOKIE);

session_start();
if(defined('DEBUG')){
	error_reporting(E_ALL);
}else{
	error_reporting(0);
}

$intId=isset($_SESSION['intId'])?$_SESSION['intId']:NULL;
$shell = isset($_SESSION['shell'])?$_SESSION['shell']:NULL;
