<?php
	include("../../config/config.php");
	$link  = mysqli_connect(LOC,USER,PASS) or die("数据库连接不成功");
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,'utf8');
	$username=$_POST['username'];
	if(!preg_match("/\w{5,20}/",$username)){
		header("location:./index.php?error=4");
		exit;
	}
	// echo $username;
	// exit;
	$name = $_POST['name'];
	if(!preg_match("/[\u{4e00}-\u{9fa5}]/",$name)){
		header("location:./index.php?error=5");
		exit;
	}
	$pass = $_POST['pass'];
	if(!preg_match("/.{6,16}/",$pass)){
		header("location:./index.php?error=6");
		exit;
	}
	$pass=md5($pass);
	$qrpass = md5($_POST['qrpass']);
	if($pass !== $qrpass){
		// echo "两次密码输入不一致";
		header("location:./index.php?error=1");
		exit;
	}
	$sex = $_POST['sex'];
	$address = $_POST['address'];
	if(empty($address)){
		header("location:./index.php?error=8");
		exit;
	}
	$code = $_POST['code'];
	if(!preg_match("/^[1-9]\d{5}$/",$code)){
		header("location:./zhuce.php?error=9");
		exit;
	}
	$phone = $_POST['phone'];
	if(!preg_match("/^1[34578]\d{9}$/",$phone)){
		header("location:./zhuce.php?error=10");
		exit;
	}
	$email = $_POST['email'];
	if(!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$email)){
		header("location:./zhuce.php?error=11");
		exit;
	}
	$state = 1;
	$addtime = time();
	$sql = "insert into users values(null,'{$username}','{$name}','{$pass}',{$sex},'{$address}','{$code}','{$phone}','{$email}',{$state},{$addtime})";
	// echo $sql;
	// exit;
	$reslut= mysqli_query($link,$sql);
	// echo $sql;
	// exit;
	if(!mysqli_insert_id($link)>0){
		header("location:./index.php?error=7");
		exit;
	}
	mysqli_close($link);
	echo "添加成功,页面正在跳转请稍后";
?>
	<meta http-equiv="refresh" content="1,./show.php">
	
	
	
	
	