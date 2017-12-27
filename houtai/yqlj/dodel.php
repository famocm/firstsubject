<?php
	include("../../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS);
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	$id = $_GET['del'];
	//执行删除
	$sql = "delete from yqlj where id={$id}";
	mysqli_query($link,$sql);
	//通过判断是否有受影响的行数可以判断是否删除成功
	if(mysqli_affected_rows($link) > 0){
		header("location:./show.php");
		mysqli_close($link);
	}
	
	
	