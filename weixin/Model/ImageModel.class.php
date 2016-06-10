<?php
class ImageModel{
  //扭曲的验证码
   public static function code(){
   	ob_clean();
   	$str = 'abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
   	$code = substr(str_shuffle($str),0,5);
   	$_SESSION['check_pic'] = $code;
   	//2块画布
   	$src = imagecreatetruecolor(66, 29);
   	$dst = imagecreatetruecolor(66, 29);
   	
   	//灰色背景
   	$sgray = imagecolorallocate($src, 200, 200, 200);
   	$dgray = imagecolorallocate($dst, 200, 200, 200);
   	
  //造随机字体颜色
   $color = imagecolorallocate($src, mt_rand(0, 125), mt_rand(0, 125), mt_rand(0, 125)) ;
   
  //造随机线条颜色
  $color1 =imagecolorallocate($src, mt_rand(100, 125), mt_rand(100, 125), mt_rand(100, 125));
  $color2 =imagecolorallocate($src, mt_rand(100, 125), mt_rand(100, 125), mt_rand(100, 125));
  $color3 =imagecolorallocate($src, mt_rand(100, 125), mt_rand(100, 125), mt_rand(100, 125));
           
            //在画布上画线
  imageline($src, mt_rand(0, 50), mt_rand(0, 25), mt_rand(0, 50), mt_rand(0, 25), $color1) ;
  imageline($src, mt_rand(0, 50), mt_rand(0, 20), mt_rand(0, 50), mt_rand(0, 20), $color2) ;
  imageline($src, mt_rand(0, 50), mt_rand(0, 20), mt_rand(0, 50), mt_rand(0, 20), $color3) ;
   	
   	   
   imagefill($src,0,0,$sgray);
   imagefill($dst, 0, 0,$dgray);
   
   //写入字体
   imagestring($src, 5, 5, 4, $code, $color);
   
   //进行正弦扭曲
   for($i=0;$i<66;$i++){
     $offset = 3;//最大波动几个像素
     $round  =2;//扭动几个周期，即4π
     $postY =round(sin(2*$round*M_PI/66*$i)*$offset);
     imagecopy($dst, $src, $i, $postY, $i, 0, 1, 29);
   }
    //显示、销毁
    header('content-type: image/jpeg');
  	imagejpeg($dst);
  	imagedestroy($dst);
   	
   }
}