<?php
	session_start();
	unset($_SESSION['username1']);
	header("location:./login.php");
	
	