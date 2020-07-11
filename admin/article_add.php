<?php
session_start();
require_once('session.php');
require_once("inc/conn.php");
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
<form id="form1" name="form1" method="post" action="article_add_pass.php">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="2">添加文章</td>
    </tr>
    <tr>
      <td width="12%" height="35"><span style="color:#F30">*</span>标题：</td>
      <td width="88%"><input name="title" type="text" id="title" size="50" /></td>
    </tr>
    <tr>
      <td height="31">来源：</td>
      <td><input name="comefrom" type="text" id="comefrom" value="本站" /></td>
    </tr>
    <tr>
      <td height="29">发布日期：</td>
      <td><input name="pubdate" type="text" id="pubdate" value="<?php 
	  date_default_timezone_set('UTC');
	  echo date(Y年m月d日);
	  ?>" /></td>
    </tr>
    <tr>
      <td height="60">关键词：</td>
      <td><label for="keywords"></label>
      <textarea name="keywords" cols="60" rows="3" id="keywords"></textarea></td>
    </tr>
    <tr>
      <td height="60">描述：</td>
      <td><label for="description"></label>
      <textarea name="description" id="description" cols="60" rows="3"></textarea></td>
    </tr>
    <tr>
      <td height="243"><span style="color:#F30">*</span>内容：</td>
      <td><textarea name="content" style="width:800px;height:300px;visibility:hidden;"></textarea></td>
    </tr>
    <tr>
      <td height="33">推荐位：</td>
      <td><input name="posid[]" type="checkbox" id="posid" value="setindex" />
        首页推荐&nbsp;&nbsp;<input name="posid[]" type="checkbox" id="posid" value="settop" />
        首页置顶</td>
    </tr>
    <tr>
      <td height="43" colspan="2"><input type="submit" name="Submit" value="提交" /></td>
    </tr>
  </table>
</form>
</body>
</html>
