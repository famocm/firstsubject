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
		<div class="formtitle"><span>添加友情链接</span></div>
		<form action="./doadd.php" method="post">
			<ul class="forminfo">
				<li><label>名字</label><input name="name" type="text" class="dfinput" />
				<li><label>链接</label><input name="lianjie" type="text" class="dfinput" />
				<li><label>&nbsp;</label><input type="submit" class="btn" value="确认添加"/></li>
			</ul>
		</form>
		
	</div>
</body>
</html>
