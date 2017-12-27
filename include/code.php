<?php
	session_start();
	//验证码
	$image = imagecreatetruecolor(120,40);
	//背景颜色
	$bgcolor = imagecolorallocate($image,rand(150,255),rand(150,255),rand(150,250));
	//背景颜色的填充
	imagefill($image,1,1,$bgcolor);
	
	$content = "000000000000000000";
	$code="";
	for($i = 0;$i < 4;$i ++){
		$font = substr($content,rand(0,strlen($content)-1),1);
		$code .=$font;
		//需要有文字
		$x = (120/4) * $i;
		$y = rand(20,30);
		$jaodu = rand(-30,30);
		$fontcolor = imagecolorallocate($image,rand(0,150),rand(0,150),rand(0,150));
		imagettftext($image,20,$jaodu,$x,$y,$fontcolor,"./SIMYOU.TTF",$font);
		
	}
	$_SESSION["code"]=$code;
	//干扰因素
	//加点
	for($i = 0;$i < 300;$i ++){
		$diancolor = imagecolorallocate($image,rand(0,200),rand(0,200),rand(0,200));
		imagesetpixel($image,rand(0,120),rand(0,40),$diancolor);
		
	}
	//干扰弧线
	for($i = 0;$i < 100;$i ++){
		$xiancolor = imagecolorallocate($image,rand(0,200),rand(0,200),rand(0,200));
		imagearc($image,rand(-10,300),rand(-10,300),rand(10,300),rand(10,300),rand(0,60),rand(0,60),$xiancolor);
	}
	header("content-type:image/jpeg");
	imagejpeg($image);
	imagedestroy($image);