<?php
session_start();
require_once('session.php');
require_once('inc/conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<?php
/*处理推荐位数据开始*/
if($_POST['posid']<>""){
$posid=implode(",",$_POST['posid']);
	}
/*处理推荐位数据结束*/

$sql="insert into article (title,comefrom,pubdate,keywords,description,content,posid) values ('".$_POST['title']."','".$_POST['comefrom']."','".$_POST['pubdate']."','".$_POST['keywords']."','".$_POST['description']."','".$_POST['content']."','".$posid."')";
mysql_query($sql,$conn);
echo "<script>alert('数据写入成功！');window.location.href='article_add.php';</script>";
mysql_close($conn);
?>
</body>
</html>