<?php
class MessModel  extends Model{
	protected $table = 'wx_message';
	protected $pk	 = 'id';

	public function insertMess($data){
		return $this->add($data);
	}
	public function getChat(){//得到用户的基本点菜信息，放入后台聊天窗口
		$sql = 'select id,wid,menu,order_time,arrive_time,remark,money from '.$this->table.' where isread=0 limit 1';
		return $this->db->getAll($sql);
	}

	public function updateChat($data,$id){//把已经读取的信息isread置为1
		$isok = $this->update($data,$id);
		return $isok;
	}


	public function findOrder($wid){//根据微信号来获取本人所有的订单信息
		$sql = 'select * from wx_message where wid='.$wid;
		return $this->db->getAll($sql);
	}

	public function findUserInfo($id){//通过某个订单号，获取用户的基本信息
		$sql = 'select a.wid,a.order_time,a.fail_time,b.customer,b.tel,b.order_sn from wx_user as a  left join wx_message as b on a.wid=b.wid where b.id='.$id;
		return $this->db->getAll($sql);
	}


	public function getRecord(){//获取用户的点菜记录
		$sql = 'select wid,menu,order_time from '.$this->table.' order by order_time desc';
		return $this->db->getAll($sql);
	}
}