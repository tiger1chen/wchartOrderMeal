<?php
class LoginModel extends Model{
	protected $table = 'hwx_user';

	/**
	*用户登录、
	*/

	public function get_user_login($strName,$strPassword,$check) {
		if(strtolower($check) != strtolower($_SESSION['check_pic'])){
			
			$this->get_show_msg('./index.php','验证码错误');
		}
		$username = str_replace(" ","",$strName);
		$sql = 'select * from '.$this->table.' where strName=\''.$strName.'\'';
		$us = is_array($row = $this->db->getRow($sql));
		$ps = $us?$strPassword==$row['strPassword']:False;
		if($ps) {
			$_SESSION['intId']   = $row['intId'];
			$_SESSION['strName'] = $row['strName'];
			$_SESSION['shell']	 = md5($row['strName'].$row['strPassword']."WX");
			include(ROOT.'admin/main.php');
		}else{
			$this->get_show_msg('./index.php','用户名或密码错误');
		}
		
	}


	/**
	*用户退出
	*/


	public function get_user_out(){
	
		session_destory();
		$this->get_show_msg('./index.php','您已经安全退出！');
	}


	/*用户登录超时
	*
	*/
	public function get_user_time($long= '360000'){
		$new_time = mktime();
		$onlinetime = $_SESSION['ontime'];
		if($new_time - $onlinetime > $long) {
			echo '登录超时';
			session_destory();
			exit();
		}else{
		
			$_SESSION['ontime'] = mktime();
		}
	
	}



	/*
	*用户权限判断
	*/

	public function get_user_shell($intId,$shell){
		$sql = 'select * from '.$this->table.' where intId='.$intId;
		$us = is_array($row = $this->db->getRow($sql));

		$shell = $us?$shell==md5($row['strName'].$row['strPassword']."WX"):FALSE;
		return $shell?$row:exit();
	}


	public function get_user_shell_check($intId,$shell,$intRole=3) {
		if($row = $this->get_user_shell($intId,$shell)) {
			if($row['intRole'] <$intRole){
				return $row;
			}else{
				echo '您无权限操作';
				exit();
			}
		}else{
			echo '请先登录';
			header("Location:".ROOT."index.php");
		}
	}

public function get_show_msg($url, $show = '操作已成功！') {
		$msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml"><head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" href="Public/common.css" type="text/css" />
				<meta http-equiv="refresh" content="2; url=' . $url . '" />
				<title>消息提示</title>
				</head>
				<body>
				<div id="man_zone">
				  <table width="30%" border="1" align="center"  cellpadding="3" cellspacing="0" class="table" style="margin-top:100px;">
				    <tr>
				      <th align="center" style="background:#cef">信息提示</th>
				    </tr>
				    <tr>
				      <td><p>' . $show . '<br />
				      2秒后返回指定页面！<br />
				      如果浏览器无法跳转，<a href="' . $url . '">请点击此处</a>。</p></td>
				    </tr>
				  </table>
				</div>
				</body>
				</html>';
		echo $msg;
		exit ();
	}

}