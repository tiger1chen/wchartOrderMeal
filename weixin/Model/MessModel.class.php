<?php
class MessModel  extends Model{
	protected $table = 'wx_message';
	protected $pk	 = 'id';

	public function insertMess($data){
		return $this->add($data);
	}
	public function getChat(){//�õ��û��Ļ��������Ϣ�������̨���촰��
		$sql = 'select id,wid,menu,order_time,arrive_time,remark,money from '.$this->table.' where isread=0 limit 1';
		return $this->db->getAll($sql);
	}

	public function updateChat($data,$id){//���Ѿ���ȡ����Ϣisread��Ϊ1
		$isok = $this->update($data,$id);
		return $isok;
	}


	public function findOrder($wid){//����΢�ź�����ȡ�������еĶ�����Ϣ
		$sql = 'select * from wx_message where wid='.$wid;
		return $this->db->getAll($sql);
	}

	public function findUserInfo($id){//ͨ��ĳ�������ţ���ȡ�û��Ļ�����Ϣ
		$sql = 'select a.wid,a.order_time,a.fail_time,b.customer,b.tel,b.order_sn from wx_user as a  left join wx_message as b on a.wid=b.wid where b.id='.$id;
		return $this->db->getAll($sql);
	}


	public function getRecord(){//��ȡ�û��ĵ�˼�¼
		$sql = 'select wid,menu,order_time from '.$this->table.' order by order_time desc';
		return $this->db->getAll($sql);
	}
}