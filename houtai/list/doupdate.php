<?php
	//接收update的更新数据
	include("../../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	$status = $_POST['status'];
	$id = $_POST['id'];
	$sql = "update orders set status={$status} where id={$id}";
	// print_r($sql);
	// exit;
	$result = mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0){
		header("location:./show.php");
		
	}
	mysqli_close($link);
	header("location:./show.php");
	