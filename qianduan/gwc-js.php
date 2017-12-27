<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:./denglu");
	}  
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>购物车</title>
		<link style='text/css' rel='stylesheet' href='./css/gwc.css'>
		<link style='text/css' rel='stylesheet' href='./css/spxq.css'>
	</head>
	<body>
		<div class="zt font">
			<!--最顶上部分-->
			<div class="top">
				<div class="topleft lf">
					<ul>
						<li><a href="">华为官网</a></li>
						<li><a href="">荣耀官网</a></li>
						<li class="aone"><a href="">软件应用</a>
							<ul>
								<li><a href="">EMUI</a></li>
								<li><a href="">应用市场</a></li>
								<li><a href="">云服务</a></li>
								<li><a href="">开发者联盟</a></li>
							</ul>
						</li>
						<li><a href="">花粉俱乐部</a></li>
						<li><a href="">Select Region</a></li>
					</ul>
				</div>
				<div class="topcenter lf"> 
					<ul>
						<li><?php
								if(!empty($_SESSION["username"])){
									echo "<a href='./gerenzhongxin.php'>欢迎你,尊贵的{$_SESSION['username']}用户</a>";
								}
								if(empty($_SESSION['username'])){
									echo "<a href='./denglu.php'>登录</a> | <a href='./zhuce.php'>注册</a>";
								}
							?></li>
						<li><a href="./dlout.php">退出</a></li>
					</ul>
				</div>
				<div class="topright lf">
						<ul>
							<li><a href="">我的订单</a></li>
							<li><a href="">V码(优购码)</a></li>
							<li><a href="">手机版</a></li>
							<li class='aone'><a href="">网站导航</a>
								<ul>
									<li><a href="">帮助中心</a></li>
									<li><a href="">pc软件</a></li>
									<li><a href="">数字音乐</a></li>
									<li><a href="">爱旅</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!--搜索栏-->
				<div class="sousuo lf">
					<div class="sousuoleft lf">
						<div class="tp">
							<a href=""><img src="./image/logo.png" ></a>
						</div>
					</div>
					<div>
					</div>
				</div>
				<div class='gwc lf'>
					<div class='top lf'>
						<div class='a lf'>商品</div>
						<div class='b lf'>单价</div>
						<div class='b lf'>数量</div>
						<div class='b lf'>小计</div>
						<div class='b lf'>操作</div>
					</div>
					<div class="center lf">
							<?php
								if(empty($_SESSION['shoplist'])){
										echo "<div class='c lf'>";
										echo "<div><span>购物车已经被结算,请再去选购商品</span><a href='index.php'>亲,来这里哦!</a></div>";
										echo "</div>";
										}
								if(!empty($_SESSION['shoplist'])){
										foreach($_SESSION['shoplist'] as $shop){
										// echo "<pre>";
										// print_r($shop);
										// exit;
										echo "<div class='d lf'>";
										echo "<div class='a lf'>";
										echo "<div class='lf'><img src='../include/pic/s_{$shop['picname']}'></div>";
										echo "<div class='lf'><span>{$shop['goods']}</span><span style='color:red'>{$shop['descr']}</span></div>";
										echo "</div>";
										echo "<div class='b lf'><span style='color:red'>￥{$shop['price']}</span></div>";
										echo "<div class='b lf'><span>{$shop['num']}</span></div>";
										echo "<div class='b lf'>￥<span>".$shop['num'] * $shop['price']."</div>";
										echo "<div class='b lf'><a href='./delgwc.php?id={$shop['id']}'>删除</a></div>";
										echo "</div>";
										echo "<hr class='lf'>";
										}
							
								}
								$zongjia = 0;
								if(empty($_SESSION['shoplist'])){
										
										}
								if(!empty($_SESSION['shoplist'])){
									foreach($_SESSION['shoplist'] as $shop){
										$zongjia += $shop['num'] * $shop['price'];
									}
								}
								$_SESSION['zongjia'] = $zongjia;
							?>
					</div>
					<div class='dd lf'>
						<?php
							include("../config/config.php");
							$link = mysqli_connect(LOC,USER,PASS);
							mysqli_select_db($link,NAME);
							mysqli_set_charset($link,"utf8");
							$sql = "select * from users where id = {$_SESSION['userid']}";
							$result = mysqli_query($link,$sql);
							$row = mysqli_fetch_assoc($result);
							
							
						?>
						<?php
						if(empty($_SESSION['shoplist'])){
						
						}
						if(!empty($_SESSION['shoplist'])){
							echo "<div class='one lf'>";
							echo "<span>收货人信息</span>";
							echo "</div>";
							// echo "<div class='rh'>";
							// echo "<a href='./gwcupdate.php'>修改</a>";
							// echo "</div>";
							echo "<div class='two lf'>";
							echo "<p>姓名:{$row['name']}</p>";
							echo "<p>地址:{$row['address']}</p>";
							echo "<p>邮箱:{$row['email']}</p>";
							echo "<p>手机号:{$row['phone']}</p>";
							echo "<p>邮编:{$row['code']}</p>";
							echo "</div>";
							
						}
						?>
					</div>
					<div class='bottom rh'>
					<?php
					if(empty($_SESSION['shoplist'])){
						
					}
					if(!empty($_SESSION['shoplist'])){
						echo "<div class='zj lf'>";
						echo "应付款:<span>￥{$zongjia}</span>";
						echo "</div>";
						echo "<div class='js rh'>";
						echo "<a href='./dogwc-js.php'>提交订单</a>";
						}
					?>
						
					</div>
				</div>
				<?php include("./indexweibu.php");?>
			</div>
			
	</body>
</html>