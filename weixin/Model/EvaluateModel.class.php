<?php
class EvaluateModel extends Model{
	protected $table = 'wx_evaluate';
	protected $pk	 = 'id';

	public function getEvaluate(){//�õ����й������۱����е���Ϣ
		$sql = 'select * from wx_evaluate';
		return $this->db->getAll($sql);
	}
	public function insertEvaluate($data){//���������Ϣ
		return $this->add($data);
	}
}
?>