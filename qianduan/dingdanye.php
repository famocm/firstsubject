<?php session_start();
	if(empty($_SESSION['username'])){
		header("location:./denglu.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>订单页</title>
		<link style="text/css"  href="./css/spxq.css" rel="stylesheet">
		<link style="text/css"  href="./css/dingdanye.css" rel="stylesheet">
	</head>
	<body>
		<div class="zt font">
			<?php include("./head.php");?>
				<!--主要部分-->
			<div class="zy lf">
				<div class="grzx lf">
					<div class="wdsc lf">
						<div class="a lf"><h1><a href="">我的商城</a></h1></div>
						<div class="b lf">
							<p align="center" class="dd">订单中心</p>
							<p><a href=''>我的订单</a></p>
							<p><a href=''>我的退换货</a></p>
							<p><a href=''>我的团购</a></p>
							<p><a href=''>我的回收单</a></p>
							
						</div>
						<div class="c lf">
							<p align="center" class="dd">个人中心</p>
							<p><a href=''>我的预约</a></p>
							<p><a href=''>到货通知</a></p>
							<p><a href=''>等级与特权</a></p>
							<p><a href=''>我的积分</a></p>
							<p><a href=''>芝麻信用</a></p>
							<p><a href=''>实名认证</a></p>
							<p><a href=''>代金券</a></p>
							<p><a href=''>我的花瓣</a></p>
							<p><a href=''>我的优惠券</a></p>
							<p><a href=''>收货地址管理</a></p>
						</div>
						<div class="d lf">
							<p align="center" class="dd">社区中心</p>
							<p><a href=''>商品评价</a></p>
							<p><a href=''>站内信</a></p>
						</div>
					</div>
					<div class='dingdanye lf'>
						<div class='a lf'>
							<h2 style='font-size:30px;'>我的订单</h2>
							<hr>
						</div>
						<div class='b lf'>
							<div class='aa lf'>商品</div>
							<div class='bb lf'>单价/元</div>
							<div class='bb lf'>数量</div>
							<div class='bb lf'>实付款/元</div>
							<div class='bb lf'>订单状态及操作</div>
						</div>
						<?php 
							date_default_timezone_set("PRC");
							$status=  array(1 => "<span style='color:black'>新订单</span>" ,
											2 => "<span style='color:green'>已发货</span>" ,
											3 =>"<span style='color:yellow'>已收货</span>",
											4 =>"<span style='color:red'>无效订单</span>");
							$sql = "select detail.*,orders.* from detail,orders where orders.id=detail.orderid having uid={$_GET['id']}";
							// echo $sql;
							$result = mysqli_query($link,$sql);
							while($row = mysqli_fetch_assoc($result)){
								echo "<div class='c lf'>";
								echo "<div class='cc lf'>";
								echo "<div class='lf'>".date("Y-m-d H:i:s",$row['addtime'])."</div>";
								echo "<div class='lf'  style='margin-left:20px;'>订单号:<span style='color:red;'>{$row['orderid']}</span></div>";
								echo "</div>";
								echo "<div class='aa lf'>";
								echo "<div class='lf'><img src='../include/pic/s_{$row['picname']}'></div>";
								echo "<div class='lf'><span style='text-align:center'>{$row['name']}</span></div>";
								echo "</div>";
								echo "<div class='bb lf'>￥{$row['price']}</div>";
								echo "<div class='bb lf'>{$row['num']}</div>";
								echo "<div class='bb lf'>".$row['num'] * $row['price']."</div>";
								echo "<div class='bb lf'>{$status[$row['status']]} | <a href='./dingdanxq.php?id={$row['orderid']}'>订单详情</a>";
								if($row['status'] == 3){
									@$pl = $_GET['pl'];
									if(empty($pl)){
										echo " | <a href='./pl.php?id={$row['goodsid']}&orderid={$row['orderid']}'>评论</a>";
									}
								}
								echo "</div>"; 
								echo "</div>";
							}
						?>
					</div>
				</div>
			</div>
			<?php include("./indexweibu.php");?>
		</div>
	</body>
</html>