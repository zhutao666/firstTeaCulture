<?php
session_start();
require_once('session.php');
require_once('inc/conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<?php
	if ($_POST['title']==""){
		echo "<script>alert('标题不能为空！');history.go(-1)</script>";
		exit;
		}
	if ($_POST['thumbnail']==""){
		echo "<script>alert('缩略图不能为空！');history.go(-1)</script>";
		exit;
		}
	if (!is_numeric($_POST['orderid'])){
		echo "<script>alert('排序必须为数字！');history.go(-1)</script>";
		exit;
		}
$sql_add="insert into slide (title,link,thumbnail,orderid) values ('".$_POST['title']."','".$_POST['link']."','".$_POST['thumbnail']."','".$_POST['orderid']."')";
mysql_query($sql_add,$conn);
echo "<script>alert('添加成功！');window.location.href='slide_list.php';</script>";
mysql_close($conn);
?>
</body>
</html>
