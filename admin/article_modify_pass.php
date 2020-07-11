<?php
session_start();
require_once('session.php');
require_once('../inc/conn.php');
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
$sql="update article set title='".$_POST['title']."',comefrom='".$_POST['comefrom']."',pubdate='".$_POST['pubdate']."',keywords='".$_POST['keywords']."',description='".$_POST['description']."',content='".$_POST['content']."',posid='".$posid."' where id='".$_GET['id']."'";
mysql_query($sql,$conn);
echo "<script>alert('修改成功！');window.location.href='article_list.php';</script>";
mysql_close($conn);
?>
</body>
</html>