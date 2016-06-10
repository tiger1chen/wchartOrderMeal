<?php
class Log{
	const LOGFILE = 'curr.log';//代表日志文件的名称
	//写的日志
	public static function write($cont) {
		$cont .="\r\n";
		//判断是否备份
		$log = self::isBak();//计算出日志文件
		$fh = fopen($log,'ab');
		fwrite($fh,$cont);
	}

	//备份日志
	public static function bak(){
		$log = ROOT.'data/log/'.self::LOGFILE;
		$bak = ROOT.'data/log/'.date('ymd').mt_rand(10000,99999).'bak';
		return rename($log,$bak);
	}
	//读取并判断日志大小
	public static function isBak(){
		$log = ROOT.'data/log/'.self::LOGFILE;
		if(!file_exists($log)){
			touch($log);
			return $log;
		}

		//要是存在，则判断大小
		//清除缓存
		clearstatcache(true,$log);
		$size = filesize($log);
		if($size <= 1024*1024){//如果小于1M返回
			return $log;
		}

		if(!self::Bak()){
			return $log;
		}else{
			touch($log);
			return $log;
		}
	}
}