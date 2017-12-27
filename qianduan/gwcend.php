<?php session_start();?>
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
								include("../config/config.php");
								$link = mysqli_connect(LOC,USER,PASS);
								mysqli_select_db($link,NAME);
								mysqli_set_charset($link,"utf8");
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
						<div class='c lf'>
							<div><span>订单提交成功!!!!</span></div>
						</div>
					</div>
					<div class='bottom rh'>
						<div class='js rh'>
							<?php echo"<p><a href='./dingdanye.php?id={$_SESSION['userid']}'>我的订单</a></p>";?>
						</div>
						<div class='gw rh'><a href='./index.php'>继续购物</a></div>
					</div>
				</div>
				<?php include("./indexweibu.php");?>
			</div>
			
	</body>
</html>