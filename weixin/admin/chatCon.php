<?php
	require_once('../include/init.php');
	$mess = new MessModel();
	while(true){
		$info = $mess->getChat();//��÷�����������Ϣ
		if(!empty($info)){
			$data['isread'] = 1;//����Ϊ1
			$info[0]['order_time'] = date("Y-m-d H:i:s",$info[0]['order_time']);
			$m = $mess->updateChat($data,$info[0]['id']);//��isread��Ϊ1�������Ѿ���ȡ
			if($m){
				echo json_encode($info[0]);
				exit();
			}
		}
		sleep(1);
	}