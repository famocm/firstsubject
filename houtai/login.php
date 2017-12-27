<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>欢迎登录后台管理系统</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script language="JavaScript" src="js/jquery.js"></script>
	<script src="js/cloud.js" type="text/javascript"></script>
	<script language="javascript">
		$(function(){
		$('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
		$(window).resize(function(){  
		$('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
		})  
	});  
	</script> 
</head>
<body style="background-color:#1c77ac; background-image:url(images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  
<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
		<ul>
			<li><a href="#">回首页</a></li>
			<li><a href="#">帮助</a></li>
			<li><a href="#">关于</a></li>
		</ul>    
    </div>
	<div class="loginbody">
		<span class="systemlogo"></span> 
    <div class="loginbox">
		<form action="dologin.php" method="post">
			<ul>
				<?php
			switch(@$_GET["error"]) {
				case 1:
					echo "验证码错误";
				break;
				case 2:
					echo "此用户不存在或者没有权限登录";
				break;
				case 3:
					echo "密码错误";
				break;
					}
			?>
				<li><input name="username" type="text" class="loginuser" value="admin" onclick="JavaScript:this.value=''"/></li>
				<li><input name="password" type="password" class="loginpwd" value="密码" onclick="JavaScript:this.value=''"/></li>
				<li>
					<input type="text" class="code" name="code" />
					<img class="codeimage" src="../include/code.php" onclick="this.src='../include/code.php?id='+Math.random();">
					<input type="submit" class="loginbtn" name="dosubmit" value="登录"/>   
				</li>
			</ul>
		</form>
    </div>
    </div>
    <div class="loginbm">版权所有  2013  <a href="http://www.mycodes.net">源码之家</a> </div>
</body>
</html>
