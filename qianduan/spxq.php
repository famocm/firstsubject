<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
	<link style="text/css"  href="./css/spxq.css" rel="stylesheet">
</head>
<body>
	<div class="zt font">
		<?php include("./head.php");?>
			<!--主要内容-->
			<div class="zy lf">
				<?php
					$state=  array(1 => "<span style='color:black'>预售</span>" ,
									2 => "<span style='color:green'>火爆销售</span>" ,
									3 =>"<span style='color:yellow'>下架</span>");
					$sql1 = "select * from goods where id = {$_GET['id']}";
					// echo $sql1;
					// exit;
					$result1 = mysqli_query($link,$sql1);
					$row1 = mysqli_fetch_assoc($result1);
					// echo "<pre>";
					// print_r($row1);
					$clicknum=$row1['clicknum'] + 1;
					$sql2 = "update goods set clicknum={$clicknum} where id = {$_GET['id']}";
					mysqli_query($link,$sql2);
					
				?>
				<div class="top lf">
					<span><a href="shouye.php" target="_blank">首页</a> > <?php echo $row1['goods'];?></span>
				</div>
				<div class='center lf'>
					<div class="lfte lf">
						<div class="a lf">
							<image src='../include/pic/m_<?php echo $row1['picname'];?>'>
						</div>
						<div class="b lf">
							<div class="tp lf">
								<image src="../include/pic/s_<?php echo $row1['picname'];?>">
							</div>
							<div class="tp lf">
								<image src="../include/pic/s_<?php echo $row1['picname'];?>">
							</div>
							<div class="tp lf">
								<image src="../include/pic/s_<?php echo $row1['picname'];?>">
							</div>
							<div class="tp lf">
								<image src="../include/pic/s_<?php echo $row1['picname'];?>">
							</div>
						</div>
					</div>
					<div class="right rh">
							<h2 style="text-align:center;margin-top:30px;"><?php echo "<span>{$row1['goods']}</span><p style='color:red'>{$row1['descr']}</p>";?></h2>
							<hr style="margin-top:40px;">
							<p>生产厂家 : <?php echo "<span style='color:red'>{$row1['company']}</span>";?></p>
							<p>简介 : <?php echo $row1['descr'];?></p>
							<p>单价 : <span style='color:red'>￥<?php echo "{$row1['price']}";?></span></p>
							<p>状态 : <span style='color:red'><?php echo "{$state[$row1['state']]}";?></span></p>
							<p>库存量 : <span style='color:red'><?php echo "{$row1['store']}";?></span></p>
							<p>点击次数 : <span style='color:red'><?php echo "{$row1['clicknum']}";?></span></p>
							<hr style="margin-top:40px;">
							<div>
								<?php
								if($row1['state'] == 3){
									echo "<h1 stytle='text-align:center;margin-top:20px;color:red;'>该商品已经下架,请另外选择商品!!!</h1>";
								}
								if($row1['state'] !=3){
									echo "<a href='./gouwuche.php?id={$row1['id']}' class='gwc lf'>加入购物车</a>";
									echo "<a href='./gouwuche.php?id={$row1['id']}' class='xd lf'>立即下单</a>";
								}
								
								?>	
							</div>
						</form>
					</div>
				</div>
				<div class="bottom lf">
					<div class="lfte lf">
						<div class="d lf">
							<p>热销榜单</p>
						</div>
						<div class="extj lf">
							<div class="a lf">	
								<div class="tp lf">
									<image src='./image/60_60_1476790999472mp.jpg'>
								</div>
								<div class="wenzi lf">
									<a href=''><span>荣耀8 4GB+32GB 全网通版（魅海蓝）</span></a>
									<p>¥2299</p>
								</div>
							</div>
							<div class="a lf">	
								<div class="tp lf">
									<image src='./image/60_60_1476790999472mp.jpg'>
								</div>
								<div class="wenzi lf">
									<a href=''><span>荣耀8 4GB+32GB 全网通版（魅海蓝）</span></a>
									<p>¥2299</p>
								</div>
							</div>
							<div class="a lf">	
								<div class="tp lf">
									<image src='./image/60_60_1476790999472mp.jpg'>
								</div>
								<div class="wenzi lf">
									<a href=''><span>荣耀8 4GB+32GB 全网通版（魅海蓝）</span></a>
									<p>¥2299</p>
								</div>
							</div>
							<div class="a lf">	
								<div class="tp lf">
									<image src='./image/60_60_1476790999472mp.jpg'>
								</div>
								<div class="wenzi lf">
									<a href=''><span>荣耀8 4GB+32GB 全网通版（魅海蓝）</span></a>
									<p>¥2299</p>
								</div>
							</div>
							<div class="a lf">	
								<div class="tp lf">
									<image src='./image/60_60_1476790999472mp.jpg'>
								</div>
								<div class="wenzi lf">
									<a href=''><span>荣耀8 4GB+32GB 全网通版（魅海蓝）</span></a>
									<p>¥2299</p>
								</div>
							</div>
							<div class="a lf">	
								<div class="tp lf">
									<image src='./image/60_60_1476790999472mp.jpg'>
								</div>
								<div class="wenzi lf">
									<a href=''><span>荣耀8 4GB+32GB 全网通版（魅海蓝）</span></a>
									<p>¥2299</p>
								</div>
							</div>
						</div>
					</div>
					<div class="right rh">
						<div class="f">
							<span>商品详情 | 用户评价 | 规格参数 | 包装清单 | 售后服务</span>
						</div>
						<div class="i">
							<image src='../include/pic/m_<?php echo $row1['picname'];?>'>
							<div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("./indexweibu.php");?>
		</div>
</body>
</html>