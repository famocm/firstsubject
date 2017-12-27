<?php
	include("../../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS);
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	$del = $_GET['del'];
	$state = $_GET['state'];
	// echo $state;
	// exit;
	if($state==3){
		header("location:./show.php?error=3");
		exit;
	}
	$sql = "delete from users where id={$del}";
	// echo $sql;
	// exit;
	mysqli_query($link,$sql);
	mysqli_close($link);
	header("location:./show.php");