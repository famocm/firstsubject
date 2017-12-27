<?php
	session_start();
	//若用户没登录跳转到登录页面登录    判断用户是否登录
	if(empty($_SESSION["username1"])){
		header("location:../login.php");
	}
?>