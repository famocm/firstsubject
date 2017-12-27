<?php
	include("../../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS);
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	$id = $_GET['del'];
	$sql = "select count(*) from type where pid = {$id}";
	$result = mysqli_query($link,$sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['count(*)'] > 0){
		header("location:./show.php?error=2");
		exit;
		
	}
	$sql = "select count(*) from goods where typeid = {$id}";
	// echo $sql;
	// exit;
	$result = mysqli_query($link,$sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['count(*)'] > 0){
		header("location:./show.php?error=3");
		exit;
	}
	//执行删除
	$sql = "delete from type where id={$id}";
	mysqli_query($link,$sql);
	//通过判断是否有受影响的行数可以判断是否删除成功
	if(mysqli_affected_rows($link) > 0){
		header("location:./show.php");
		mysqli_close($link);
	}
	
	
	