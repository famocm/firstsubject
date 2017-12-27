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
	<?php
		include("../../config/config.php");
		$link = mysqli_connect(LOC,USER,PASS) or die("数据库连接不成功");
		mysqli_select_db($link,NAME);
		mysqli_set_charset($link,"utf8");
		$sql = "select * from yqlj where id={$_GET['xiugai']}";
		// print_r($sql);
		// exit;
		$result=mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($result);
		switch(@$_GET['error']){
				case 4 ;
					echo "<span style='color:red'>请输入中文</span>";
				break;
			}
	?>
		<div class="formtitle"><span>修改类别</span></div>
		<form action="./doupdate.php" method="post">
			<ul class="forminfo">
				<input name="id" type="hidden" class="dfinput" value="<?php echo $_GET['xiugai']?>"/>
				<li><label>修改名字</label><input name="name" type="text" class="dfinput" value="<?php echo $row['name'];?>"/>
				<li><label>修改链接</label><input name="lianjie" type="text" class="dfinput" value="<?php echo $row['lianjie'];?>"/>
				<li><label>&nbsp;</label><input type="submit" class="btn" value="确认修改"/></li>
			</ul>
		</form>
		
	</div>
</body>
</html>
