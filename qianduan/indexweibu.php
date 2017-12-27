	<!--五百强-->
			<div class="wbq lf">
				<span><a>500强企业 品质保证</a></span>
				<span><a>7天退货 15天换货</a></span>
				<span><a>99元起免运费</a></span>
				<span><a>448家维修网点 全国联保</a></span>
			</div>
			<!-- 服务 -->
			<div class="fuwulang lf">
					<div class="a lf">
						<span><b>帮助中心</b></span>
						<ul>
							<li><a>购物指南</a></li>
							<li><a>配送方式</a></li>
							<li><a>支付方式</a></li>
							<li><a>常见问题</a></li>
						</ul>
					</div>
					<div class="a lf">
						<span><b>售后服务</b></span>
						<ul>
							<li><a>保修政策</a></li>
							<li><a>退换货政策</a></li>
							<li><a>退换货流程</a></li>
							<li><a>保修状态查询</a></li>
						</ul>
					</div>
					<div class="a lf">
						<span><b>技术支持</b></span>
						<ul>
							<li><a>售后网点</a></li>
							<li><a>荣耀零售店铺</a></li>
							<li><a>预约维修</a></li>
							<li><a>手机寄修服务</a></li>
							<li><a>维修配件价格查询</a></li>
							<li><a>软件下载</a></li>
						</ul>
					</div>
					<div class="a lf">
						<span><b>关于商城</b></span>
						<ul>
							<li><a>公司介绍</a></li>
							<li><a>华为商城简介</a></li>
							<li><a>联系客服</a></li>
						</ul>
					</div>
					<div class="a lf">
						<span><b>关注我们</b></span>
						<ul>
							<li><a>新浪微博</a></li>
							<li><a>腾讯微博</a></li>
							<li><a>花粉俱乐部</a></li>
							<li><a>商城手机版</a></li>
						</ul>
					</div>
			</div>
			 <div class="yqlj lf">
				<div class="top lf">
			        <ul>
					   <li>友情链接:</li>
					   <?php 
					   $sql = "select * from yqlj";
					   $result = mysqli_query($link,$sql);
					   while($row = mysqli_fetch_assoc($result)){
						     echo "<li><a href='{$row['lianjie']}'>{$row['name']}|</a></li>";
					   }
					   ?>
				    </ul>
				</div>
				<div class="center rh">
					<ul>	
						<li><a>隐私政策</a></li>
						<li><a>服务协议</a></li> 
						<li>Copyright © 2012-2016 VMALL.COM 版权所有 保留一切权利</li>
					</ul>
				</div>
				<div class="bottom lf">
				    <a href=""><image src="image/20160226162415360.png"></a>
				    <a href=""><image src="image/20160226162521265.png"></a>
				    <a href=""><image src="image/20160226162531395.png"></a>
				</div>
			</div>
			<div>
				<a href=""><div class="gd"></div></a>
				
				<a href=""><div class="gd1"></div></a>	
			</div>
		</div>