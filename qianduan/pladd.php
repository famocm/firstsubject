<?php
	session_start();
	// print_r($_SESSION);
	// exit;
	include("../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS);
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,"utf8");
	$goodsid = $_POST['goodsid'];
	// echo $goodsid;
	// exit;
	$orderid = $_POST['orderid'];
	$username = $_SESSION['username'];
	$pl = $_POST['pl'];
	$addtime = time();
	$sql = "insert into pl values(null,{$orderid},'{$username}',{$goodsid},'{$pl}',null,{$addtime})";
	mysqli_query($link,$sql);
	header("location:./dingdanye.php?pl={$pl}&id={$_SESSION['userid']}&goodsid={$goodsid}&");