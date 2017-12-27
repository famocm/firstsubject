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
    <li><label>姓名查询</label><input name="name" type="text" class="scinput" /></li>
    <li><label>性别</label>  
    <div class="vocation">
    <select name="sex" class="select3">
    <option value="">全部</option>
    <option  value='1'>男</option>
    <option value='2'>女</option>
    </select>
    </div>
    </li>
    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
    </ul>
	</form>
	<?php
	switch (@$_GET['error']){
		case 3:
			echo "不能删除管理者!!!!";
		break;
	}
	?>
    <table class="tablelist">
    	<thead>
    	<tr>
			<th>编号<i class="sort"><img src="../images/px.gif" /></i></th>
			<th>账号</th>
			<th>真实姓名</th>
			<th>性别</th>
			<th>地址</th>
			<th>邮编</th>
			<th>电话</th>
			<th>邮箱</th>
			<th>状态</th>
			<th>注册时间</th>
			<th>操作</th>
        </tr>
		<?php 
			$wherelist = array();
			$url = array();
			//按姓名搜索
			if(!empty($_GET['name'])){
				$wherelist[] = "name like '%{$_GET['name']}%'";
				$url[] = "name={$_GET['name']}";
			}
			//按性别查询
			if(!empty($_GET['sex'])){
				$wherelist[] = "sex = {$_GET['sex']}";
				$url[] = "sex={$_GET['sex']}";
			}
			// print_r($wherelist);
			// exit;
			if(count($wherelist)>0){
				$where = " where ".implode(" and ",$wherelist);
				$url = "&".implode("&",$url);
			}else{
				$where = "";
				$url = "";
			}
			//链接数据库
			include("../../config/config.php");
			$link = mysqli_connect(LOC,USER,PASS) or die("数据库链接不成功");
			mysqli_select_db($link,NAME);
			mysqli_set_charset($link,'utf8');
			
			
			$xxoo="select count(*) from users".$where;
			$result = mysqli_query($link,$xxoo);
			$row = mysqli_fetch_assoc($result);
			
			//处理分页
			//一我得知道当前页数
			$num = $row["count(*)"];
			// echo $num;
			//二我的规格一页显示多少条
			$pagesize = 2;
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
			// echo $limit;
			
			// echo $where;
			$sex = array(1 => "<span style='color:blue';>男</span>" ,
						2 => "<span style='color:red'>女</span>");
			$state=  array(1 => "<span style='color:black'>普通用户</span>" ,
							2 => "<span style='color:green'>会员</span>" ,
							3 =>"<span style='color:yellow'>管理者</span>");
							
			$sql = "select * from users".$where.$limit;
			// echo $sql;
			// echo $sql;
			// exit;
			// print_r($sql);
			// exit;
			$result=mysqli_query($link,$sql);
			// print_r($result);
			// exit;
			while($row = mysqli_fetch_assoc($result)){
				echo" <tbody>";
				echo "<tr>";
				echo "<td>{$row['id']}</td>";
				echo "<td>{$row['username']}</td>";
				echo "<td>{$row['name']}</td>";
				echo "<td>{$sex[$row['sex']]}</td>";
				echo "<td>{$row['address']}</td>";
				echo "<td>{$row['code']}</td>";
				echo "<td>{$row['phone']}</td>";
				echo "<td>{$row['email']}</td>";
				echo "<td>{$state[$row['state']]}</td>";
				echo "<td>".date('Y-m-d',$row['addtime'])."</td>";
				echo "<td><a href='./update.php?xiugai={$row['id']}' class='tablelink'>修改</a> | <a href='./newspass.php?new={$row['id']}&state={$row['state']}' class='tablelink'>重置密码</a> | <a href='./del.php?del={$row['id']}&state={$row['state']}' class='tablelink'>删除</a></td>";
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
		?>&nbsp;</i>页</div>
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