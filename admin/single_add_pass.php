<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<?php
require_once('session.php');
require_once('inc/conn.php');
$sql="insert into single (title,comefrom,pubdate,keywords,description,content) values ('".$_POST['title']."','".$_POST['comefrom']."','".$_POST['pubdate']."','".$_POST['keywords']."','".$_POST['description']."','".$_POST['content']."')";
mysql_query($sql,$conn);
echo "<script>alert('添加成功！');window.location.href='single_add.php';</script>";
mysql_close($conn);
?>
</body>
</html>