<?php include("../../config/session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>无标题文档</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/select.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.idTabs.min.js"></script>
	<script type="text/javascript" src="../js/select-ui.min.js"></script>
	<script type="text/javascript" src="../editor/kindeditor.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
	</script>
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
		<div class="formtitle"><span>订单修改</span></div>
		<form action="./doupdate.php" method="post">
			<ul class="seachform">
			<?php
			//链接数据库
				include("../../config/config.php");
				$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
				mysqli_select_db($link,NAME);
				mysqli_set_charset($link,'utf8');
				$sql = "select * from orders where id = {$_GET['xiugai']}";
				$result = mysqli_query($link,$sql);
				$roww = mysqli_fetch_assoc($result);
				// print_r($row);
				// exit;
			?>
			<!--使用隐藏域传送就图片名字-->
			<input type="hidden" name="id" value="<?php echo $roww['id'];?>">
			</ul>
			<ul class="forminfo">
				<li><label>状态</label><cite>
					<input name="status" value='1' type="radio" <?php echo $roww['status']==1?'checked':''; echo $roww['status']>1?"disabled":""; ?> value="1" /> 新订单&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="status" type="radio" <?php echo $roww['status']==2?'checked':''; echo $roww['status']>2?"disabled":""; ?> value="2" /> 已发货&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="status" type="radio" <?php echo $roww['status']==3?'checked':''; ?> disabled value="3" /> 已收货&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="status" type="radio" <?php echo $roww['status']==4?'checked':''; echo $roww['status']>4?"disabled":""; ?> value="4" /> 无效订单					
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/><a href="./show.php" class="btn">放弃修改</a></li>
			</ul>
		</form>
	</div>
	<script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
    $(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
    });
        KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
	</script>
</body>
</html>
