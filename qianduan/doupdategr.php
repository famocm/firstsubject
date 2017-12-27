<?php
	$id = $_POST['id'];
	$username = $_POST['username'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	include("../config/config.php");
    $link = mysqli_connect(LOC,USER,PASS);
    mysqli_select_db($link,NAME);
    mysqli_set_charset($link,"utf8");
	$sql = "update users set username='{$username}',name='{$name}',phone='{$phone}',email='{$email}',address='{$address}' where id={$id}";
	mysqli_query($link,$sql);
	header("location:./dlout.php");