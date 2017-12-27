<?php
	session_start();
	include("../config/config.php");
	//对验证码和账号密码进行验证
	//验证码
	$code = $_POST["code"];
	if($code != $_SESSION["code"]){
		// echo "验证码错误";
		header("location:./login.php?error=1");
		exit;
	}
	$username1=$_POST['username'];
	 //拿到用户名
    $link = mysqli_connect(LOC,USER,PASS);
    mysqli_select_db($link,NAME);
    mysqli_set_charset($link,"utf8");
	$sql = "select * from users where username='{$username1}' and state = 3";
	// echo $sql;
	// exit;
	$result= mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0){
		//找到了去判断密码
		$password=md5($_POST['password']);
		if($password===$row['pass']){
			//把需要的SESSION搞定
			$_SESSION["username1"]=$username1;
			header("location:./main.php");
			exit;
		}else{
			header("location:./login.php?error=3");
			exit;
		}
	}else{
		//没有找到这个用户
		header("location:./login.php?error=2");
		exit;
	}
	mysqli_close($link);