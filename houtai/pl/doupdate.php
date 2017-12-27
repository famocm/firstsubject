<?php
	//接收update的更新数据
	include("../../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	$huifu = $_POST['huifu'];
	$id = $_POST['id'];
	$sql = "update pl set hf='{$huifu}' where id={$id}";
	// print_r($sql);
	// exit;
	$result = mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0){
		echo "回复成功,正在跳转";
		echo "<meta http-equiv='refresh' content='2,./show.php'>";
		
	}
	mysqli_close($link);
	echo "<meta http-equiv='refresh' content='2,./show.php'>";
	