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
		<div class="formtitle"><span>注册</span></div>
		<?php
			switch(@$_GET['error']){
				case 1:
					echo "<span style='color:red'>两次密码输入不一致</span>";
				break;
				case 7:
					echo "<span style='color:red'>此账号已存在</span>";
				break;
			}
		?>
		<form action="./doadd.php" method="post">
			<ul class="forminfo">
				<li><label>账号</label><input name="username" type="text" class="dfinput" />
				<?php
					switch(@$_GET['error']){
						case 4:
							echo "<span style='color:red'>账号输入错误</span>";
						break;
					}
				?>
				<li><label>真实姓名</label><input name="name" type="text" class="dfinput" />
				<?php
					switch(@$_GET['error']){
						case 5:
							echo "<span style='color:red'>名字输入格式错误</span>";
						break;
					}
				?>
				<li><label>密码</label><input name="pass" type="password" class="dfinput" />
				<?php
					switch(@$_GET['error']){
						case 6:
							echo "<span style='color:red'>密码输入位数不对</span>";
						break;
					}
				?>
				<li><label>确认密码</label><input name="qrpass" type="password" class="dfinput" />
				<li><label>性别</label><cite><input name="sex" type="radio" value="1" checked="checked" />男&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="sex" type="radio" value="2" />女</cite></li>
				<li><label>地址</label><input name="address" type="text" class="dfinput" />
				<?php
					switch(@$_GET['error']){
						case 8:
							echo "<span style='color:red'>地址不为空</span>";
						break;
					}
				?>
				<li><label>邮编</label><input name="code" type="text" class="dfinput" />
				<?php
					switch(@$_GET['error']){
						case 9:
							echo "<span style='color:red'>邮编格式不为空</span>";
						break;
					}
				?>
				<li><label>电话</label><input name="phone" type="text" class="dfinput" />
				<?php
					switch(@$_GET['error']){
						case 10:
							echo "<span style='color:red'>手机号格式不符</span>";
						break;
					}
				?>
				<li><label>邮箱</label><input name="email" type="text" class="dfinput"/></li>
				<?php
					switch(@$_GET['error']){
						case 11:
							echo "<span style='color:red'>邮箱格式不对</span>";
						break;
					}
				?>
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认注册"/></li>
			</ul>
		</form>
		
	</div>
</body>
</html>
