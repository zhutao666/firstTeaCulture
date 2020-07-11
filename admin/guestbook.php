<?php
session_start();
require_once('session.php');
require_once('inc/conn.php');
//记录的总条数
$total_num=mysql_num_rows(mysql_query("select * from guestbook"));
//每页记录数
$pagesize=5;
//总页数
$page_num=ceil($total_num/$pagesize);
//设置页数
$page=$_GET['page'];
if($page<1 || $page==''){
	$page=1;
	}
if($page>$page_num){
	$page=$page_num;
	}
//计算机记录的偏移量
$offset=$pagesize*($page-1);
//上一页、下一页
$prepage=($page<>1)?$page-1:$page;
$nextpage=($page<>$page_num)?$page+1:$page;
$result=mysql_query("select * from guestbook  order by id desc limit $offset,$pagesize");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="7">留言列表</td>
    </tr>
    <tr>
      <td width="13%" height="29"><strong>标题</strong></td>
      <td width="11%"><strong>日期</strong></td>
      <td width="11%"><strong>留言人</strong></td>
      <td width="8%"><strong>联系方式</strong></td>
      <td width="30%"><strong>留言内容</strong></td>
      <td width="15%"><strong>是否处理</strong></td>
      <td width="12%"><strong>操作</strong></td>
    </tr>
<?php
if($total_num>0){
   while($row=mysql_fetch_array($result)){
?>
    <tr>
      <td><?php echo $row['title']?></td>
      <td><?php echo $row['pubdate']?></td>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['contact']?></td>
      <td><?php echo $row['content']?></td>
      <td><?=$row['deal']?>(<?php if($row['deal']=='否'){?><a href="guestbook_deal.php?deal=yes&id=<?=$row['id']?>">点击设置为"已处理"</a><?php }else{?><a href="guestbook_deal.php?deal=no&id=<?=$row['id']?>">点击设置为"未处理"</a><?php }?>）</td>
      <td><input type="submit" name="button2" id="button2" value="删除" onclick="window.location.href='guestbook_delete.php?id=<?php echo $row['id']?>'" /></td>
    </tr>   
<?php
}
}else{
	  echo "<tr><td colspan='5' height='31' style='color:red;font-size:13px'>暂无记录</td></tr>";
	  }
?>
    <tr>
      <td height="43" colspan="7" align="center"><?=$page?>/<?=$page_num?>&nbsp;&nbsp;<a href="?page=1">首页</a>&nbsp;&nbsp;	<a href="?page=<?=$prepage?>">上一页</a>&nbsp;&nbsp;<a href="?page=<?=$nextpage?>">下一页</a>&nbsp;&nbsp;<a href="?page=<?=$page_num?>"> 尾页</a></td>
    </tr>
  </table>
</body>
</html>
<?php
mysql_close($conn);
?>