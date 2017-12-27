<?php session_start();
	if(empty($_SESSION['username'])){
		header("location:./denglu.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>无标题文档</title>
	<link href="../houtai/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="formbody">
		<div class="formtitle"><span>修改个人信息</span></div>
		<form action="./doupdategr.php" method="post">
			<ul class="forminfo">
				<li><label></label><input name="id" type="hidden" class="dfinput" value='<?php echo $_SESSION['userid'];?>'/>
				<li><label>账号:</label><input name="username" type="text" class="dfinput" value='<?php echo $_SESSION['username'];?>'/>
				<li><label>真实姓名:</label><input name="name" type="text" class="dfinput" value='<?php echo $_SESSION['name'];?>'/>
				<li><label>地址:</label><input name="address" type="text" class="dfinput" value='<?php echo $_SESSION['address'];?>'/>
				<li><label>手机号:</label><input name="phone" type="text" class="dfinput" value='<?php echo $_SESSION['phone'];?>'/>
				<li><label>邮箱:</label><input name="email" type="text" class="dfinput" value='<?php echo $_SESSION['email'];?>'/> 
				<li><label>&nbsp;</label><input type="submit" class="btn" value="确认修改"/></li>
			</ul>
		</form>
		
	</div>
</body>
</html>
