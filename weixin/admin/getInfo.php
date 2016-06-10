<?php
	require_once('../include/init.php');
	$mess = new MessModel();
	$data = $mess->findUserInfo($_GET['id']);
	echo json_encode($data);