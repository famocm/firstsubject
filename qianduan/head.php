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
				<div class="sousuocenter lf">
					<div class="dd">
						<span><input class="dx1" type="text" name="" placeholder="Mate9 荣耀畅玩6X 荣耀8 荣耀V8"></span>
						<span><input class="dx2" type="submit" name="" value="搜索"></span>
						<span class="dx3"><a href="">我的商城</a> | <a href="./gwc.php">我的购物车</a></span>
					</div>
				</div>
				<div class="sousuoright rh">
					<a href=""  ><img src="./image/qrcode_vmall_app01.png"></a>
				</div>
			</div>
			<!--导航栏-->
			<div class="dhl lf">
				<div class="dhlleft lf"><h2>全部商品</h2>
					<div class="ejcdleft lf">
							<?php
								include("../config/config.php");
								$link = mysqli_connect(LOC,USER,PASS);
								mysqli_select_db($link,NAME);
								mysqli_set_charset($link,"utf8");
								$sql1 = "select * from type where pid=0";
								$result1 = mysqli_query($link,$sql1);
								while($row1 = mysqli_fetch_assoc($result1)){
								echo "<div class=\"one\">";
								echo "<div class=\"two\">";
									echo "<a href=\"./splb.php?id={$row1['id']}\">{$row1['name']}</a>";
								echo "</div>";
								echo "<div class=\"three\">";
								$sqll = "select * from type where pid={$row1['id']} limit 0,3";
								$resultt = mysqli_query($link,$sqll);
								while($roww = mysqli_fetch_assoc($resultt)){
									echo "<a href='./zsplb.php?id={$roww['id']}'>{$roww['name']}</a>";
								}
								echo "</div>";
								echo "<div class=\"four lf\">";
								$sqll = "select * from type where pid={$row1['id']}";
								$resultt = mysqli_query($link,$sqll);
								// print_r ($resultt);
								// exit;
								while($roww = mysqli_fetch_assoc($resultt)){
								// print_r ($resultt);
								// exit;
								echo "<a href='./zsplb.php?id={$roww['id']}'>{$roww['name']}</a><br>";
								}
								echo "</div>";
								echo "</div>";
								}
						?>
						
					</div>
				</div>
				<div class="dhlright lf">
						<span class='span lf'><a href="./index.php"><h2>首页</h2></a></span>
					<?php
						$sql = "select * from type where pid=0";
						$result = mysqli_query($link,$sql);
						while($row = mysqli_fetch_assoc($result)){
							echo "<span class='span lf'><a href='./splb.php?id={$row['id']}'><h2>{$row['name']}</h2></a></span>";
						}
					?>
				</div>
			</div>