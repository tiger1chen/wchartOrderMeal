<?php
class GoodsModel extends Model{
	protected $table = 'wx_goods';
	protected $pk	 = 'id';

	public function deleteGoods($id){//删除菜名
		return $this->delete($id);
	}

	public function getGoods(){
		$sql = 'select * from '.$this->table;
		return $this->db->getAll($sql);
	}


	public function addGoods($data){
		
		return $this->add($data);
	}


	//根据id查找菜名
	public function findGoods($id){
		return $this->find($id);
	}
	//根据栏目id详细查询子栏目的信息
   public function joinFind($id){
		$sql = 'select a.id,a.name,a.price from wx_goods as a left join (select * from wx_menu where fid='.$id.') as b on b.name=a.name where   b.name=a.name ';
		return $this->db->getAll($sql);
   }

}

