<?php
include('./include/init.php');
$goods = new GoodsModel();
$data = $goods->joinFind($_GET['id']);//������Ŀid��ϸ��ѯ����Ŀ����Ϣ
echo json_encode($data);