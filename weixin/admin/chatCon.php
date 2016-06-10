<?php
	require_once('../include/init.php');
	$mess = new MessModel();
	while(true){
		$info = $mess->getChat();//获得符合条件的信息
		if(!empty($info)){
			$data['isread'] = 1;//设置为1
			$info[0]['order_time'] = date("Y-m-d H:i:s",$info[0]['order_time']);
			$m = $mess->updateChat($data,$info[0]['id']);//把isread置为1，代表已经读取
			if($m){
				echo json_encode($info[0]);
				exit();
			}
		}
		sleep(1);
	}