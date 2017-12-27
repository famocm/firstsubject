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
		//这个表单中既要添加父类也添加子类
		$pid = 0;
		$path = '0,';
		if(!empty($_GET['id']) && !empty($_GET['path'])){
			//判断是否添加子类
			$pid = $_GET['id'];
			$path = $_GET['path'].$_GET['id'].",";
			
		}
		switch(@$_GET['error']){
				case 1:
					echo "<span style='color:red'>添加失败请重新添加</span>";
				break;
				case 3 ;
					echo "<span style='color:red'>请输入中文</span>";
				break;
			}
	?>
		<div class="formtitle"><span>添加类别</span></div>
		<form action="./doadd.php" method="post">
			<ul class="forminfo">
				<li><label>添加分类名称</label><input name="name" type="text" class="dfinput" />
				<li><label></label><input name="pid" type="hidden" class="dfinput" value="<?php echo $pid?>"/>
				<li><label></label><input name="path" type="hidden" class="dfinput" value="<?php echo $path?>"/>
				
				<li><label>&nbsp;</label><input type="submit" class="btn" value="确认添加"/></li>
			</ul>
		</form>
		
	</div>
</body>
</html>
