<?php
class EvaluateModel extends Model{
	protected $table = 'wx_evaluate';
	protected $pk	 = 'id';

	public function getEvaluate(){//得到所有关于评论表所有的信息
		$sql = 'select * from wx_evaluate';
		return $this->db->getAll($sql);
	}
	public function insertEvaluate($data){//添加评论信息
		return $this->add($data);
	}
}
?>