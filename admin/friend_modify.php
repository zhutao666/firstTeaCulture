<?php
session_start();
require_once('session.php');
require_once('inc/conn.php');
$sql="select * from friend where id='".$_GET['id']."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form1" id="form1" action="friend_modify_pass.php?id=<?=$row['id']?>" method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="41" colspan="2" class="tt">修改友情链接</td>
    </tr>
    <tr>
      <td width="13%" height="35"><span style="color:#F60">*</span>标题：</td>
      <td width="87%"><input name="title" type="text" id="title" value="<?=$row['title']?>" /></td>
    </tr>
    <tr>
      <td height="35"><span style="color:#F60">*</span>链接地址：</td>
      <td><input name="url" type="text" id="url" value="<?=$row['url']?>" /></td>
    </tr>
    <tr>
      <td height="35" colspan="2"><input type="submit" name="button" id="button" value="提交" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_close($conn);
?>