<?php
	session_start();
	$id = $_GET['id'];
	// echo $id;
	// exit;
	// echo "<pre>";
	// print_r($_SESSION['shoplist']);
	// exit;
	unset($_SESSION['shoplist'][$id]);

	header("location:./gwc.php");
	