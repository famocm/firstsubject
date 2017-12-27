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
    <li><label>商品名称查询</label><input name="goods" type="text" class="scinput" /></li>
    <li><label>商品类别</label>  
    <div class="vocation">
    <select name="typeid" class="select3">
		<option value="">全部</option>
	<?php 
			
			//链接数据库
			include("../../config/config.php");
			$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
			mysqli_select_db($link,NAME);
			mysqli_set_charset($link,'utf8');
			$sql1 = "select * from type order by concat(path,id)";
			$result=mysqli_query($link,$sql1);
			while($roww = mysqli_fetch_assoc($result)){
			// 把跟类别禁用掉;
				$disabled = ($roww['pid'] ==0)?"disabled":"";
				echo "<option {$disabled} value='{$roww['id']}'>{$roww['name']}</option>";
			}
			
	?>
    
    </select>
    </div>
    </li>
    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
    </ul>
	</form>
	<?php
	switch (@$_GET['error']){
		case 1:
			echo "<span style='color:red';>不能删除在售商品!!!!</span>";
		break;
	}
	?>
    <table class="tablelist">
    	<thead>
    	<tr>
			<th>商品类别<i class="sort"><img src="../images/px.gif" /></i></th>
			<th>商品名称</th>
			<th>商品图片</th>
			<th>生产厂家</th>
			<th>简介</th>
			<th>单价</th>
			<th>状态</th>
			<th>库存量</th>
			<th>被购买数量</th>
			<th>点击次数</th>
			<th>添加时间</th>
			<th>操作</th>
        </tr>
		<?php 
			$wherelist = array();
			$wherelist1 = array();
			$url = array();
			//按商品名称搜索
			if(!empty($_GET['goods'])){
				$wherelist[] = "goods like '%{$_GET['goods']}%'";
				$wherelist1[] = "goods like '%{$_GET['goods']}%'";
				$url[] = "goods={$_GET['goods']}";
			}
			//按商品类别查询
			if(!empty($_GET['typeid'])){
				$wherelist[] = "typeid = {$_GET['typeid']}";
				$wherelist1[] = "typeid = {$_GET['typeid']}";
				$url[] = "typeid={$_GET['typeid']}";
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
			$xxoo="select count(*) from goods".$where1;
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
			
			
		
			$state=  array(1 => "<span style='color:black'>预售</span>" ,
							2 => "<span style='color:green'>火爆销售</span>" ,
							3 =>"<span style='color:yellow'>下架</span>");
			$sql = "select goods.*,type.name,type.pid from goods,type where goods.typeid=type.id".$where.$limit;
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
				echo "<td>{$row['name']}</td>";
				echo "<td>{$row['goods']}</td>";
				echo "<td><img src='../../include/pic/s_{$row['picname']}'></td>";
				echo "<td>{$row['company']}</td>";
				echo "<td>{$row['descr']}</td>";
				echo "<td>{$row['price']}</td>";
				echo "<td>{$state[$row['state']]}</td>";
				echo "<td>{$row['store']}</td>";
				echo "<td>{$row['num']}</td>";
				echo "<td>{$row['clicknum']}</td>";
				echo "<td>".date('Y-m-d',$row['addtime'])."</td>";
				echo "<td><a href='./update.php?xiugai={$row['id']}' class='tablelink'>修改</a> | <a href='./del.php?del={$row['id']}&state={$row['state']}&picname={$row['picname']}' class='tablelink'>删除</a></td>";
				echo "</tr>";
				echo "</today>";
			}
			mysqli_close($link);
			
			
		?>
        </thead>
    </table>
    <div class="pagin">
    	<div class="message">共<i class="blue"><?php echo $num;?></i>条记录，当前显示第&nbsp;<i class="blue">
		<?php if(empty($_GET['p'])){
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