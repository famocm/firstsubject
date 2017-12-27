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
		<div class="formtitle"><span>注册</span></div>
		<form action="./doadd.php" method="post" enctype="multipart/form-data">
			<ul class="seachform">
			<li style="margin-left:25px;"><label>商品类别</label></li>
				<li style="margin-left:10px;"><label></label>  
					<div class="vocation">
						<select name="typeid" class="select3">
						<?php
							//链接数据库
							include("../../config/config.php");
							$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
							mysqli_select_db($link,NAME);
							mysqli_set_charset($link,'utf8');				
							$sql = "select * from type order by concat(path,id)";
							$result=mysqli_query($link,$sql);
							// print_r($result);
							// exit;
							while($row = mysqli_fetch_assoc($result)){
								//把跟类别禁用掉;
								$disabled = ($row['pid'] ==0)?"disabled":"";
								echo "<option {$disabled} value={$row['id']}>{$row['name']}</option>";
							}
						 ?>
						</select>
					</div>
				</li>
			</ul>
			<ul class="forminfo">
				<li><label>商品名称</label><input name="goods" type="text" class="dfinput" /></li>
				<li><label>商品图片</label><input name="pic" type="file" /></li>
				<li><label>生产厂家</label><input name="company" type="text" class="dfinput" /></li>
				<li><label>简介</label><input name="descr" type="text" class="dfinput" /></li>
				<li><label>单价</label><input name="price" type="text" class="dfinput" /></li>
				<li><label>库存量</label><input name="store" type="text" class="dfinput" /></li>
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
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
