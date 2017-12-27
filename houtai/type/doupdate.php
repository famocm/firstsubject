<?php
	include("../../config/config.php");
	$link  = mysqli_connect(LOC,USER,PASS) or die("数据库连接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	//
	$id = $_POST['id'];
	$name = $_POST['name'];
	if(!preg_match("/[\u{4e00}-\u{9fa5}]/",$name)){
		header("location:./index.php?error=4");
		exit;
	}
	$pid = $_POST['pid'];
	$path = $_POST['path'];
	$sql = "update type set name = '{$name}',pid = {$pid},path='{$path}' where id={$id}";
	// echo $sql;
	// exit;
	$result = mysqli_query($link,$sql);
	// echo $sql;
	// exit;
	mysqli_close($link);
	header("location:./show.php");
	