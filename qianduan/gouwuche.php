<?php
	session_start();
	include("../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS);
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,"utf8");
	$id = $_GET['id'];
	$sql1 = "select * from goods where id = {$id}";
	$result1 = mysqli_query($link,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	
	//把需要添加的商品放到session中
	if(empty($_SESSION['shoplist'][$id])){
		$_SESSION['shoplist'][$id]=$row1;
		$_SESSION['shoplist'][$id]['num'] = 1;
	}else{
		$_SESSION['shoplist'][$id]['num'] += 1;
	}
	$clicknum=$row1['clicknum'] + 1;
	$sql2 = "update goods set clicknum={$clicknum} where id = {$id}";
	mysqli_query($link,$sql2);
	header('location:./gwc.php');
	
	// echo "<pre>";
	// print_r($_SESSION);