<?php
	class CustomerModel extends Model{
		protected $table = 'wx_user';
		protected $pk = 'wid';//这里就用wid，因为下面语句查询主要是wid而不是id


		public function addTime($data,$wid){//增加用户订餐次数
			return $this->update($data,$wid);
		}

		public function findCus($wid){//寻找wid返回结果集，如果没有则是FALSE
			return $this->find($wid);
		}

		public function insertCus($data){//添加新用户
			return $this->add($data);
		}
	}