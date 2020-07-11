<?php
session_start();
require_once('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<?php
require_once('../inc/conn.php');
$sql="update single set title='".$_POST['title']."',comefrom='".$_POST['comefrom']."',pubdate='".$_POST['pubdate']."',keywords='".$_POST['keywords']."',description='".$_POST['description']."',content='".$_POST['content']."' where id='".$_GET['id']."'";
mysql_query($sql,$conn);
echo "<script>alert('修改成功！');window.location.href='single_list.php';</script>";
mysql_close($conn);
?>
</body>
</html>