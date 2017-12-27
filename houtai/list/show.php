<?php include("../../config/session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户浏览</title>
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
    <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>
    <div class="rightinfo">
    <ul class="seachform">
	<form action="show.php" method="get">
    <li><label>商品订单号查询</label><input name="orderid" type="text" class="scinput" /></li>
    <li><label>商品名字查询</label><input name="name" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
    </ul>
	</form>
    <table class="tablelist">
    	<thead>
    	<tr>
			<th>订单号<i class="sort"><img src="../images/px.gif" /></i></th>
			<th>会员ID</th>
			<th>收件人</th>
			<th>商品名字</th>
			<th>单价</th>
			<th>数量</th>
			<th>实付款</th>
			<th>地址</th>
			<th>联系电话</th>
			<th>下单时间</th>
			<th>状态</th>
			<th>操作</th>
        </tr>
		<?php 
			error_reporting(0);
			$wherelist = array();
			$wherelist1 = array();
			$url = array();
			//按商品名字搜索
			if(!empty($_GET['name'])){
				$wherelist[] = "name like '%{$_GET['name']}%'";
				$wherelist1[] = "name like '%{$_GET['name']}%'";
				$url[] = "name={$_GET['name']}";
			}
			//按商品订单号查询
			if(!empty($_GET['orderid'])){
				$wherelist[] = "orderid = {$_GET['orderid']}";
				$wherelist1[] = "orderid = {$_GET['orderid']}";
				$url[] = "orderid={$_GET['orderid']}";
			}
			// print_r($wherelist);
			// exit;
			if(count($wherelist)>0){
				$where = " having ".implode(" and ",$wherelist);
				$where1 = " where ".implode(" and ",$wherelist1);
				$url = "&".implode("&",$url);
			}else{
				$where = "";
				$where1 = "";
				$url = "";
			}
			include("../../config/config.php");
			$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
			mysqli_select_db($link,NAME);
			mysqli_set_charset($link,'utf8');
			$xxoo="select count(*) from detail".$where1;
			// echo $xxoo;
			// exit;
			$result = mysqli_query($link,$xxoo);
			
			$roww1 = mysqli_fetch_assoc($result); 
			
			//处理分页
			//一我得知道当前页数
			$num = $roww1["count(*)"];
			// echo $num;
			
			//二我的规格一页显示多少条
			$pagesize = 3;
			//三我分几页
			$maxpage =ceil($num/$pagesize);
			// echo $maxpage;
			
			//我得知道当前的页数----只要拿到当前的页数
			$page = @$_GET['p'];
			// echo $page;
			//限制(防止越界)
			if($page > $maxpage){
				$page  = $maxpage;
			}
			if($page< 1){
				$page = 1;
			}
			$limit = " limit ".($page - 1) * $pagesize.",".$pagesize;
			
			$status=  array(1 => "<span style='color:black'>新订单</span>" ,
							2 => "<span style='color:green'>已发货</span>" ,
							3 =>"<span style='color:yellow'>已收货</span>",
							4 =>"<span style='color:red'>无效订单</span>");
			$sql = "select detail.*,orders.* from detail,orders where orders.id=detail.orderid".$where.$limit;
			// $sql = "select goods.*,type.name,type.pid from goods,type where goods.typeid=type.id".$where.$limit;

			// print_r($sql);
			// exit;
			$result=mysqli_query($link,$sql);
			// print_r($result);
			// exit;
			while($row = mysqli_fetch_assoc($result)){
				// print_r($row);
				// exit;
				echo" <tbody>";
				echo "<tr>";
				echo "<td>{$row['orderid']}</td>";
				echo "<td>{$row['uid']}</td>";
				echo "<td>{$row['linkman']}</td>";
				echo "<td>{$row['name']}</td>";
				echo "<td>{$row['price']}</td>";
				echo "<td>{$row['num']}</td>";
				echo "<td>".$row['num']*$row['price']."</td>";
				echo "<td>{$row['address']}</td>";
				echo "<td>{$row['phone']}</td>";
				echo "<td>".date('Y-m-d',$row['addtime'])."</td>";
				echo "<td>{$status[$row['status']]}</td>";
				echo "<td><a href='./update.php?xiugai={$row['orderid']}' class='tablelink'>修改</a></td>";
				echo "</tr>";
				echo "</today>";
			}
			mysqli_close($link);
			
			
		?>
        </thead>
    </table>
    <div class="pagin">
    	<div class="message">共<i class="blue"><?php echo $num;?></i>条记录，当前显示第&nbsp;<i class="blue">
		 <?php 
		 if(empty($_GET['p'])){
			echo $_GET['p']=1;
		}else{
			echo $_GET['p'];
		}
		?>
		&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
		<?php
			for($i = 1;$i <= $maxpage;$i++){
			echo "<li class='paginItem'><a href='./show.php?p={$i}{$url}'>{$i}</a></li>";
			}
			
		?>
        <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
        </ul>
    </div>
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    </div>
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