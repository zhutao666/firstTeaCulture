<?php 
session_start();
require_once('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) 
	{
		editor = K.create('textarea[name="content"]', {
					allowFileManager : true
				});
	K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : false,
							imageUrl : K('#url3').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url3').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
</script>
</head>
<body>
<?php
require_once('inc/conn.php');
$sql="select * from single where id='".$_GET['id']."'";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?>
<form id="form1" name="form1" method="post" action="single_modify_pass.php?id=<?php echo $rs['id']?>">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td  colspan="2" class="tt">修改单页</td>
    </tr>
    <tr>
      <td width="12%" height="35"><span style="color:#F30">*</span>标题：</td>
      <td width="88%"><input name="title" type="text" id="title" value="<?php echo $rs['title']?>" size="50" /></td>
    </tr>
    <tr>
      <td height="31">来源：</td>
      <td><input name="comefrom" type="text" id="comefrom" value="<?php echo $rs['comefrom']?>" /></td>
    </tr>
    <tr>
      <td height="29">发布日期：</td>
      <td><input name="pubdate" type="text" id="pubdate" value="<?php echo $rs['pubdate']?>" /></td>
    </tr>
    <tr>
      <td height="68">关键字：</td>
      <td><label for="keywords"></label>
      <textarea name="keywords" cols="60" rows="3" id="keywords"><?php echo $rs['keywords']?></textarea></td>
    </tr>
    <tr>
      <td height="69">描述：</td>
      <td><textarea name="description" cols="60" rows="3" id="url3"><?php echo $rs['description']?></textarea></td>
    </tr>
    <tr>
      <td height="353"><span style="color:#F30">*</span>内容：</td>
      <td><textarea name="content" id="content" style="width:800px;height:300px;visibility:hidden;">
<?php echo htmlspecialchars($rs['content']); ?>
</textarea></td>
    </tr>
    <tr>
      <td height="35" colspan="2"><input type="submit" name="Submit" value="提交" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_close($conn);
?>