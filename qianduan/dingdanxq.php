<?php session_start();
	if(empty($_SESSION['username'])){
		header("location:./denglu.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>订单详情页</title>
		<link style="text/css"  href="./css/spxq.css" rel="stylesheet">
		<link style="text/css"  href="./css/dingdanxq.css" rel="stylesheet">
	</head>
	<body>
		<div class="zt font">
		<?php include("./head.php");?>
			<!--主要部分-->
			<div class="zy">
				<div class="grzx lf">
					<div class="wdsc lf">
						<div class="a1 lf"><h1><a href="">我的商城</a></h1></div>
						<div class="b1 lf">
							<p align="center" class="dd">订单中心</p>
							<p><a href=''>我的订单</a></p>
							<p><a href=''>我的退换货</a></p>
							<p><a href=''>我的团购</a></p>
							<p><a href=''>我的回收单</a></p>
							
						</div>
						<div class="c1 lf">
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
						<div class="d1 lf">
							<p align="center" class="dd">社区中心</p>
							<p><a href=''>商品评价</a></p>
							<p><a href=''>站内信</a></p>
						</div>
					</div>
					<div class='ddxq lf'>
						<?php 
							$status=  array(1 => "<span style='color:black'>新订单</span>" ,
											2 => "<span style='color:green'>已发货</span>" ,
											3 =>"<span style='color:yellow'>已收货</span>",
											4 =>"<span style='color:red'>无效订单</span>");
							$sql = "select detail.*,orders.* from detail,orders where orders.id=detail.orderid and orderid={$_GET['id']}";
							$result = mysqli_query($link,$sql);
							$row = mysqli_fetch_assoc($result);
							
						?>
						<div class='id lf'>
							<h1>订单号:<?php echo "<span style='color:red;'>{$row['orderid']}</span>";?></h1>
							<hr>
						</div>
						<div class='sh lf'>
							<div class='xx lf'>
								<h3>收货信息</h3>
								<hr>
							</div>
							<div class='xxx lf'>
								<p>收货人姓名:<?php echo "<span style='color:#888888;'>{$row['linkman']}</span>";?></p>
								<p>收货地址:<?php echo "<span style='color:#888888;'>{$row['address']}</span>";?></p>
								<p>联系手机号:<?php echo "<span style='color:#888888;'>{$row['phone']}</span>";?></p>
							</div>
						</div>
						<div class='sp lf'>
							<div class='spxx lf'>
								<h3>商品清单</h3>
								<hr>
							</div>
							<div class='spxx1 lf'>
								<div class='aa1 lf'>商品</div>
								<div class='bb1 lf'>单价/元</div>
								<div class='bb1 lf'>数量</div>
								<div class='bb1 lf'>小计/元</div>
								<div class='bb1 lf'>订单状态及操作</div>
							</div>
							<?php 
								$sqll = "select detail.*,orders.* from detail,orders where orders.id=detail.orderid and orderid={$_GET['id']}";
								$resultt = mysqli_query($link,$sqll);
								while($roww = mysqli_fetch_assoc($resultt)){
									echo "<div class='spxx2 lf'>";
										echo "<div class='aa1 lf'>";
											echo "<div class='lf'><img src=\"../include/pic/s_{$roww['picname']}\"></div>";
											echo "<div class='lf'><span style='text-align:center;color:#888888;'>{$roww['name']}</span></div>";
										echo "</div>";
										echo "<div class='bb1 lf'>";
											echo "<span style='color:#888888;'>{$roww['price']}</span>";
										echo "</div>";
										echo "<div class='bb1 lf'>";
											echo "<span style='color:#888888;'>{$roww['num']}</span>";
										echo "</div>";
										echo "<div class='bb1 lf'>";
											echo "<span style='color:#888888;'>".$roww['num'] * $roww['price']."</span>";
										echo "</div>";
										echo "<div class='bb1 lf'>";
											echo "<span style='color:red;'>{$status[$roww['status']]}</span>";
										echo "</div>";
									echo "</div>";
								}
							?>
							
						</div>
						<div class='zj rh'>
							<p style='font-size:30px;color:red;'>总价:￥<?php echo "<span style='color:red;'>{$row['total']}</span>";?></p>
							<?php
							// echo $row['orderid'];
							if($row['status'] == 2){
							 echo "<p style='font-size:30px;color:red;'><a href='./shouhuo.php?idd={$row['orderid']}'>确认收货</a></p>";
							}
							if($row['status'] != 2){
								
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php include("./indexweibu.php")?>
		</div>
	</body>
</html>