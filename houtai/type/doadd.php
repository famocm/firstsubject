<?php
	include("../../config/config.php");
	$link  = mysqli_connect(LOC,USER,PASS) or die("数据库连接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	//
	$name = $_POST['name'];
	if(!preg_match("/[\u{4e00}-\u{9fa5}]/",$name)){
		header("location:./index.php?error=3");
		exit;
	}
	$pid = $_POST['pid'];
	$path = $_POST['path'];
	$sql = "insert into  type values(null,'{$name}',{$pid},'{$path}')";
	// echo $sql;
	// exit;
	$result = mysqli_query($link,$sql);
	// echo $sql;
	// exit;
	if(!mysqli_insert_id($link)>0){
		header("location:./index.php?error=1");
		exit;
	}
	mysqli_close($link);
	echo "添加成功,页面正在跳转请稍后";
?>
	<meta http-equiv="refresh" content="1,./show.php">
	