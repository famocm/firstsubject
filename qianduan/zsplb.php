<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品列表</title>
	<link style="text/css"  href="./css/splb.css" rel="stylesheet">
	<link style="text/css"  href="./css/spxq.css" rel="stylesheet">
	<link style="text/css"  href="./css/index.css" rel="stylesheet">
</head>
<body>
	<div class="zt font">
		<?php include("./head.php");?>
			<!--主要内容-->
			<div class="zy lf">
				<div class="top lf">
						<span><a href="shouye.php" target="_blank">首页</a> > 手机</span>
				</div>
				<div class="ml lf">
					<span>分类: &nbsp;&nbsp;<a href="">全部</a>&nbsp;&nbsp;&nbsp; <a href=""> 荣耀</a>&nbsp;&nbsp;&nbsp;<a href="">荣耀畅玩</a>&nbsp;&nbsp;&nbsp;<a href="">华为 Mate/P系列</a></span>
				</div>
				<div class="ml lf">
					<span>排序: &nbsp;&nbsp;<a href="">默认</a>&nbsp;&nbsp;&nbsp; <a href=""> 价格</a>&nbsp;&nbsp;&nbsp;<a href="">评价数</a>&nbsp;&nbsp;&nbsp;<a href="">上架时间</a></span>
				</div>
				<div class="sp lf">
					<?php 
						$sql1 = "select * from goods where typeid = {$_GET['id']}";
						// echo $sql1;
						// exit;
						$result1 = mysqli_query($link,$sql1);
						while($row1 = mysqli_fetch_assoc($result1)){
							// echo "<pre>";
							// print_r($row);
							if($row1['state'] != 3){
							echo "<div class=\"a lf\">";
							echo "<div class=\"a1 lf\">";
							echo "<div class=\"t1\">";
							echo "<a href='./spxq.php?id={$row1['id']}'><img src=\"../include/pic/w_{$row1['picname']}\"></a>";
							echo "</div>";
							echo "<div class=\"t2\">";
							echo "<span>";
							echo "<a href=''><p class=\"one\">{$row1['goods']}</p></a>";
							echo "<a href=''><p class=\"one\">{$row1['descr']}</p></a>";
							echo "<p class=\"two\">￥{$row1['price']}元</p>";
							echo "</span>";
							echo "</div>";
							echo "</div>";
							echo "<div class=\"a2 lf\">";
							// if($row1['state'] == 3){
								// echo "<a href=''><div class=\"lf1 lf\">已下架</div></a>";
							// }
							// if($row1['state'] != 3){
								echo "<a href='./gouwuche.php?id={$row1['id']}'><div class=\"lf1 lf\">加入购物车</div></a>";
							// }
							echo "<div class=\"lf2 lf\">评价</div>";
							echo "</div>";
							echo "</div>";
							}
						}
					?>
					</div>
				</div>
		<?php include("./indexweibu.php");?>
	</div>
</body>
</html>