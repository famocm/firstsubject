<?php include("../../config/session.php");?>
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
		<div class="formtitle"><span>修改用户信息</span></div>
		<?php
			include("../../config/config.php");
			$link = mysqli_connect(LOC,USER,PASS) or die("数据库连接不成功");
			mysqli_select_db($link,NAME);
			mysqli_set_charset($link,"utf8");
			$sql = "select * from users where id={$_GET['xiugai']}";
			// print_r($sql);
			// exit;
			$result=mysqli_query($link,$sql);
			$row = mysqli_fetch_assoc($result);
			mysqli_close($link);
			
		?>
		<form action="./doupdate.php?a=update" method="post">
			<ul class="forminfo">
				<input type="hidden" name="id"  value="<?php echo "{$_GET['xiugai']}"?>">
				<li><label>真实姓名</label><input name="name" type="text" class="dfinput" value="<?php echo "{$row['name']}"?>"/>
				<li><label>性别</label><cite><input name="sex" type="radio" value="1" <?php echo $row['sex']=="1"?"checked":"";?> />男&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="sex" type="radio" value="2" <?php echo $row['sex']=="2"?"checked":"";?> />女</cite></li>
				<li><label>状态</label><cite><input name="state" type="radio" value="1" <?php echo $row['state']=="1"?"checked":"";?> />普通用户&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="state" type="radio" value="2" <?php echo $row['state']=="2"?"checked":"";?> />会员 &nbsp;&nbsp;&nbsp;&nbsp;
											<input name="state" type="radio" value="3" <?php echo $row['state']=="3"?"checked":"";?> />管理者</cite></li>
				<li><label>地址</label><input name="address" type="text" class="dfinput" value="<?php echo "{$row['address']}"?>"/>
				<li><label>邮编</label><input name="code" type="text" class="dfinput" value="<?php echo "{$row['code']}"?>"/>
				<li><label>电话</label><input name="phone" type="text" class="dfinput" value="<?php echo "{$row['phone']}"?>"/>
				<li><label>邮箱</label><input name="email" type="text" class="dfinput" value="<?php echo "{$row['email']}"?>"/></li>
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
			</ul>
		</form>
	</div>
</body>
</html>
