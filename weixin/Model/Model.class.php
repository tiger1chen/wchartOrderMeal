<?php
 class Model{
	protected $table = NULL;//是model所控制的表
	protected $db	 = NULL;//是引入mysql对象


	protected $pk = '';//控制的主键
	protected $fields = array();
	protected $_auto  = array();
	protected $_valid = array();
	protected $error  = array();


	public function __construct(){
		$this->db = mysql::getIns();
	}

	public function _facade($array= array()) {
		$data = array();
		foreach($array as $k=>$v){
			if(in_array($k,$this->fields)){
				$data[$k] = $v;
			}
		}
		return $data;
	}


	public function _autoFill($data){
		foreach($this->_auto as $k=>$v){
			if(!array_key_exists($v[0],$data)){
				switch($v[1]) {
					case 'value':
						$data[$v[0]] = $v[2];
						break;

					case 'function':
						$data[$v[0]] = call_user_func($v[2]);
						break;
				}
				
			}
			
		}
		return $data;
	}


	public function add($data){//添加
		return $this->db->autoExecute($this->table,$data);
	}

	public function delete($id) {
		$sql = 'delete from '.$this->table.' where '.$this->pk.'='.$id;
		if($this->db->query($sql)){
			return $this->db->affected_rows();
		}else {
			return false;
		}
	}


	public function update($data,$id){//更新
		$rs = $this->db->autoExecute($this->table,$data,'update','where '.$this->pk.'='.$id);
		if($rs){
			return $this->db->affected_rows();
		}else{
			return false;
		}
	}




	public function find($id) {
		$sql = 'select * from '.$this->table.' where '.$this->pk.'='.$id;
		return $this->db->getRow($sql);
	}

	public function insert_id(){
		return $this->db->insert_id();
	}
	
 }