<?php
require_once('session.php');
require_once('inc/conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="5">单页管理</td>
    </tr>
    <tr>
      <td width="6%" height="35">单页ID</td>
      <td width="19%">标题</td>
      <td width="29%">发布日期</td>
      <td colspan="2">操作</td>
    </tr>
<?php
	 //记录的总条数
	$total_num=mysql_num_rows(mysql_query("select id from single"));
	//设置每页显示的记录数 
	$pagesize=10; 
	//计算总页数
	$page_num=ceil($total_num/$pagesize);  
	//设置页数
	$page=$_GET['page'];
	if($page<1 || $page==''){
		$page=1;
		}
	if($page>$page_num){
		$page=$page_num;
		}
	//计算记录的编移量
	$offset=$pagesize*($page-1);
	//上一页、下一页
	$prepage=($page<>1)?$page-1:$page;
	$nextpage=($page<>$page_num)?$page+1:$page;
	//读取指定记录数
	$sql="select * from single limit $offset,$pagesize";
	$result=mysql_query($sql);
	if($total_num>0){
	while($row=mysql_fetch_array($result)){
	?>
    <tr>
      <td height="31"><?php echo $row['id']?></td>
      <td><?php echo $row['title']?></td>
      <td><?php echo $row['pubdate']?></td>
      <td width="12%"><input type="button" name="button" id="button" value="修改" onclick="window.location.href='single_modify.php?id=<?php echo $row['id']?>'" /></td>
      <td width="11%"><input type="button" name="button2" id="button2" value="删除" onclick="window.location.href='single_delete.php?id=<?php echo $row['id']?>'" /></td>
    </tr>
<?php
  }
}else{
	  echo "<tr><td colspan='5' height='31' style='color:red;font-size:13px'>暂无记录</td></tr>";
	  }
mysql_close($conn);
?>
    <tr>
      <td height="43" colspan="5" align="center"><?=$page?>/<?=$page_num?>&nbsp;&nbsp;<a href="?page=1">首页</a>&nbsp;&nbsp;	<a href="?page=<?=$prepage?>">上一页</a>&nbsp;&nbsp;<a href="?page=<?=$nextpage?>">下一页</a>&nbsp;&nbsp;<a href="?page=<?=$page_num?>"> 尾页</a></td>
    </tr>
  </table>
</body>
</html>
