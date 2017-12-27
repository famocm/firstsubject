<?php
	include("../../config/config.php");
	$link  = mysqli_connect(LOC,USER,PASS) or die("数据库连接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	switch ($_GET["a"]){
		case "update":
			$id = $_POST['id'];
			$name = $_POST['name'];
			$sex = $_POST['sex'];
			$address = $_POST['address'];
			$code = $_POST['code'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$state = $_POST['state'];
			$sql = "update users set name='{$name}',sex={$sex},address='{$address}',code='{$code}',phone='{$phone}',email='{$email}',state={$state} where id={$id}";
			// print_r($sql);
			// exit;
			$result = mysqli_query($link,$sql);
		break;
		case "newspass":
			$id = $_POST['id'];
			$pass=md5($_POST['pass']);
			$qrpass = md5($_POST['qrpass']);
			if($pass !== $qrpass){
				header("location:./newspass.php?error=2");
				exit;
		}
		$sql = "update users set pass='{$pass}' where id={$id}";
		// print_r($sql);
		// exit;
		mysqli_query($link,$sql);
	}
	mysqli_close($link);
	
	header("location:./show.php");
	