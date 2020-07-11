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
if ($_POST['title']==""){
		echo "<script>alert('标题不能为空！');history.go(-1)</script>";
		exit;
		}
if ($_POST['thumbnail']==""){
		echo "<script>alert('缩略图不能为空！');history.go(-1)</script>";
		exit;
		}
if ($_POST['content']==""){
		echo "<script>alert('内容不能为空！');history.go(-1)</script>";
		exit;
		}
/*处理推荐位数据开始*/
if($_POST['posid']<>""){
	$posid=implode(",",$_POST['posid']);
	}
/*处理推荐位数据结束*/

$sql="insert into produce (title,comefrom,pubdate,thumbnail,keywords,description,content,posid) values ('".$_POST['title']."','".$_POST['comefrom']."','".$_POST['pubdate']."','".$_POST['thumbnail']."','".$_POST['keywords']."','".$_POST['description']."','".$_POST['content']."','".$posid."')";
mysql_query($sql,$conn);
echo "<script>alert('写入成功！');window.location.href='produce_list.php';</script>";
mysql_close($conn);
?>
</body>
</html>