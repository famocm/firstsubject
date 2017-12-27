<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>无标题文档</title>
	<link href="../houtai/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="formbody">
		<div class="formtitle"><span>评论</span></div>
		<form action="./pladd.php" method="post">
			<ul class="forminfo">
				<li><label></label><input name="goodsid" type="hidden" class="dfinput" value="<?php echo $_GET['id'];?>"/>
				<li><label></label><input name="orderid" type="hidden" class="dfinput" value="<?php echo $_GET['orderid'];?>"/>
				<li><label></label>商品评价:<input name="pl" type="text" class="dfinput" value=""/>
				<li><label>&nbsp;</label><input type="submit" class="btn" value="确认评论"/></li>
			</ul>
		</form>
	</div>
</body>
</html>