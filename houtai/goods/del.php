<?php
	//链接数据库
	include("../../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	$id = $_GET['del'];
	$picname = $_GET['picname'];
	$state = $_GET['state'];
	if($state == 1 or $state == 2){
		header("location:./show.php?error=1");
		exit;
	}
	$sql = "delete from goods where id = {$id}";
	// echo $sql;
	// exit;
	$result = mysqli_query($link,$sql);
	// print_r($result);
	// exit;
	//数据删了图片没删除
	if(mysqli_affected_rows($link)){
		unlink("../../include/pic/".$picname);
		unlink("../../include/pic/w_".$picname);
		unlink("../../include/pic/m_".$picname);
		unlink("../../include/pic/s_".$picname);
	}
	header("location:./show.php");
	mysqli_close($link);