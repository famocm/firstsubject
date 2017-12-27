<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>无标题文档</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="place">
		<span>位置：</span>
		<ul class="placeul">
		<li><a href="#">首页</a></li>
		<li><a href="#">表单</a></li>
		</ul>
    </div>
    <div class="formbody">
		<div class="formtitle"><span>修改密码</span></div>
		<?php
			include("../../config/config.php");
			$link = mysqli_connect(LOC,USER,PASS) or die("数据库连接不成功");
			mysqli_select_db($link,NAME);
			mysqli_set_charset($link,"utf8");
			@$sql = "select * from users where id={$_GET['new']}";
			// print_r($sql);
			// exit;
			$result=mysqli_query($link,$sql);
			$row = @mysqli_fetch_assoc($result);
			mysqli_close($link);
			
		?>
		<form action="./doupdate.php?a=newspass" method="post">
				<input type="hidden" name="id"  value="<?php echo "{$row['id']}"?>">
			<ul class="forminfo">
				<li><label>用户姓名</label><input name="name" type="text" value="<?php echo "{$row['name']}"?>" disabled class="dfinput" />
				<li><label>修改密码</label><input name="pass" type="text" class="dfinput" />
				<li><label>确认修改密码</label><input name="qrpass" type="text" class="dfinput" />
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
			</ul>
		</form>
		<?php
		switch (@$_GET['error']){
			case 2:
				echo "修改的两次密码输入不一致";
			break;
		}
		?>
	</div>
</body>
</html>
