<?php
	class CustomerModel extends Model{
		protected $table = 'wx_user';
		protected $pk = 'wid';//�������wid����Ϊ��������ѯ��Ҫ��wid������id


		public function addTime($data,$wid){//�����û����ʹ���
			return $this->update($data,$wid);
		}

		public function findCus($wid){//Ѱ��wid���ؽ���������û������FALSE
			return $this->find($wid);
		}

		public function insertCus($data){//������û�
			return $this->add($data);
		}
	}