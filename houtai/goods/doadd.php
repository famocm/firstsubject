<?php
	//拿到index.php页面的商品信息,上传图片如果上传成功
	
	//连接数据库
	include("../../config/config.php");
	include("../../include/fileupload.php");
	$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	//先做图片的上传,如果图片上传成功再去写其他数据
	 //接图
    $file = $_FILES["pic"];
	 //存图
    $allowtype = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
    $allowsize = 800000000;
    $a = fileUpload($file, $allowtype, $allowsize, "../../include/pic");
	// print_r($a);
    // exit;
	 //执行缩放
    if($a["error"] > 0) {
        $b = "../../include/pic/".$a["info"];
        tpsf($b,"../../include/pic/w_".$a["info"],200,200);
        tpsf($b,"../../include/pic/m_".$a["info"],450,450);
        tpsf($b,"../../include/pic/s_".$a["info"],80,80);
    }else{
        echo $a["info"];
        exit;
    }
	//当商品图片上成功
	$typeid = $_POST['typeid'];
	$goods = $_POST['goods'];
	$company = $_POST['company'];
	$descr = $_POST['descr'];
	$price = $_POST['price'];
	$picname = $a["info"];
	$state = 1;
	$store = $_POST['store'];
	$num = 0;
	$clicknum = 0;
	$addtime = time();
	// echo $typeid;
	// exit;
	
	$sql = "insert into goods values(null,{$typeid},'{$goods}','{$company}','{$descr}',{$price},'{$picname}',{$state},{$store},{$num},{$clicknum},{$addtime})";
	// echo $sql;
	// exit;
	$result = mysqli_query($link,$sql);
	if(mysqli_insert_id($link)>0){
		header("location:./show.php");
	}else{
		//把已经上传的图片再删掉
		unlink("../../include/pic/".$picname);
		unlink("../../include/pic/w_".$picname);
		unlink("../../include/pic/m_".$picname);
		unlink("../../include/pic/s_".$picname);
		header("location:./index.php?error=2");
	}
	
	
	
	
	
	