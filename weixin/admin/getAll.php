<?php
require('../include/init.php');
$record = new MessModel();
$rec = $record->getRecord();
foreach($rec as $k=>$v){//把时间进行格式转换
	$rec[$k]['order_time'] = date("Y-m-d H:i:s",$rec[$k]['order_time']);
}

require('../view/admin/templates/getAll.html');