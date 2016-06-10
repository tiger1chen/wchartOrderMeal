<?php
include('./include/init.php');
$goods = new GoodsModel();
$data = $goods->joinFind($_GET['id']);//根据栏目id详细查询子栏目的信息
echo json_encode($data);