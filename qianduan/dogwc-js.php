<?php
	session_start();
	include("../config/config.php");
	$link = mysqli_connect(LOC,USER,PASS);
	mysqli_select_db($link,NAME);
	mysqli_set_charset($link,"utf8");
	$userid=$_SESSION['userid'];
	$sql = "select * from users where id = {$userid}";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	// echo "<pre>";
	// print_r($row);
	$addtime=time();
	$status = 1;
	$sql1 = "insert into orders values(null,{$userid},'{$row['name']}','{$row['address']}','{$row['code']}','{$row['phone']}',{$addtime},{$_SESSION['zongjia']},{$status})";
	$result1 = mysqli_query($link,$sql1);
	$insertid = mysqli_insert_id($link);
	if($insertid > 0){
		foreach($_SESSION['shoplist'] as $shop){
			$sqll ="select * from goods where id = {$shop['id']}";
			$result = mysqli_query($link,$sqll);
			$row = mysqli_fetch_assoc($result);
			$store = $row['store'] - $shop['num'];
			if($store<0){
				echo "商品数量不足";
				exit;
			}
			if($store==0 ){
				$state = 3;
			}
			if($store>0){
				$state = $row['state'];
			}
			$num = $row['num'] + $shop['num']; 
			$sqlll = "update goods set store={$store},num={$num}, state={$state} where id={$shop['id']}"; 
			// echo $sqlll;
			// exit;
			mysqli_query($link,$sqlll);
			$sql2 = "insert into detail values(null,{$insertid},{$shop['id']},'{$shop['picname']}','{$shop['goods']}',{$shop['price']},{$shop['num']})";
			mysqli_query($link,$sql2);
			
		}
		unset($_SESSION['shoplist']);
		header("location:./gwcend.php");
	}