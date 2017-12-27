<?php
	include("../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS);
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,"utf8");
	// echo $_GET['idd'];
	// exit;
	$id = $_GET['idd'];
	$status = 3;
	$sql = "update orders set status={$status} where id={$_GET['idd']}";
	mysqli_query($link,$sql);
	mysqli_close($link);
	header("location:./gerenzhongxin.php");