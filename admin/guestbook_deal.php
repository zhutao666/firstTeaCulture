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
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
if($_GET['deal']=="yes"){
	mysql_query("update guestbook set deal='是' where id='".$_GET['id']."'");
	echo "<script>alert('已设置为\"已处理\"！');window.location.href='guestbook.php';</script>";
}
if($_GET['deal']=="no"){
	mysql_query("update guestbook set deal='否' where id='".$_GET['id']."'");
	echo "<script>alert('已设置为\"未处理\"！');window.location.href='guestbook.php';</script>";
}
mysql_close($conn);
?>
</body>
</html>