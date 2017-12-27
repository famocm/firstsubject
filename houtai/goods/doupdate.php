<?php
	//接收update的更新数据
	include("../../include/fileupload.php");
	include("../../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	//判断是否修改了图片
	 //接图
	$file = $_FILES["pic"];
	// print_r($file);
	// exit;
	if($file['error'] !== 4){
		// print_r($file);
		// print_r($file);
		// exit;
		//证明有图片上传
		 //存图
		$allowtype = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
		$allowsize = 8000000000;
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
		
	}
	//通过了上面的图片再去接收其他的信息
	$typeid = $_POST['typeid'];
	$goods = $_POST['goods'];
	$company = $_POST['company'];
	$descr = $_POST['descr'];
	$price = $_POST['price'];
	// $picname = $a["info"];
	//判断是不是新图片和旧图片
	if($file['error'] !==4){
		$picname = $a["info"];
		unlink("../../include/pic/".$_POST['oldpicname']);
		unlink("../../include/pic/s_".$_POST['oldpicname']);
		unlink("../../include/pic/m_".$_POST['oldpicname']);
		unlink("../../include/pic/w_".$_POST['oldpicname']);
	}else{
		$picname = $_POST['oldpicname'];
	}
	$state = $_POST['state'];
	$store = $_POST['store'];
	$id = $_POST['id'];
	$sql = "update goods set typeid={$typeid},goods='{$goods}',company='{$company}',descr='{$descr}',price={$price},picname='{$picname}',state={$state},store={$store} where id={$id}";
	// print_r($sql);
	// exit;
	$result = mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0){
		// if(!$_POST['oldpicname']==$_POST['oldpicname']){
			// unlink("../../include/pic/".$_POST['oldpicname']);
			// unlink("../../include/pic/s_".$_POST['oldpicname']);
			// header("location:./show.php");
		// }
		// unlink("../../include/pic/".$_POST['oldpicname']);
		// unlink("../../include/pic/s_".$_POST['oldpicname']);
		header("location:./show.php");
		
	}
	mysqli_close($link);
	header("location:./show.php");
	