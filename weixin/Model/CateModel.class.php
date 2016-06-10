<?php
class CateModel extends Model{
	protected $table = 'wx_menu';
	protected $pk	 = 'id';


	//删除栏目
	public function deleteCate($id){
		return $this->delete($id);
	}


	//添加大类
	public function addCate($data){
		return $this->add($data);
	}

	public function FCate(){
		$sql = 'select * from '.$this->table.' where fid=0';
		return $this->db->getAll($sql);

	}


	//查找菜单的所有选项
	public function ACate(){
		$sql = 'select * from '.$this->table;
		return $this->db->getAll($sql);
	}


	//查找栏目的子孙树
	public function getCatTree($arr,$id=0,$lev=0){
		$tree = array();

		foreach($arr as $k=>$v){
			if($v['fid'] == $id){
				$v['lev'] = $lev;
				$tree[] = $v;
				$tree = array_merge($tree,$this->getCatTree($arr,$v['id'],$lev+1));
			}
		
		}
		return $tree;
	}


	//根据id查找fid
	public function findF($id) {
		$sql = 'select * from '.$this->table.' where fid='.$id;
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

}