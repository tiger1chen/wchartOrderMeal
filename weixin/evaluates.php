<?php
include('./include/init.php');
$evaluate = new EvaluateModel();
$eval = $evaluate->getEvaluate();
foreach($eval as $k=>$v){
	$eval[$k]['time'] = date("Y-m-d H:i:s",$eval[$k]['time']);
	$eval[$k]['wid']  = substr($eval[$k]['wid'],-5);
}
echo json_encode($eval);