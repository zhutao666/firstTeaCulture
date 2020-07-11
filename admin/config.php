<?php
session_start();
require_once('session.php');
require_once('inc/conn.php');
$sql="select * from config where id=1";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) 
	{
	var editor = K.editor({
					allowFileManager : true
				});
	//上传logo
	K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : true,
							imageUrl : K('#site_logo').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#site_logo').val(url);
								editor.hideDialog();
							}
						});
					});
				});
	//上传公司二维码			
	K('#image4').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : false,
							imageUrl : K('#company_ewm').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#company_ewm').val(url);
								editor.hideDialog();
							}
						});
					});
				});			
			});
</script>
<style type="text/css">
table{border:1px solid #DDD;}
td{border:1px dotted #F2F2F2;font-size:13px;padding-left:10px;}
.tt{font-size:14px;font-weight:bold;background:#F9F9F9}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="?act=save">
  <table width="98%" height="634" align="center"  cellpadding="0" cellspacing="0">
    <tr>
      <td height="34" colspan="2" class="tt">网站基本配置</td>
    </tr>
    <tr>
      <td width="20%" height="28">网站标题</td>
      <td width="80%"><input type="text" name="site_title" id="site_title" value="<?=$row['site_title']?>" /></td>
    </tr>
    <tr>
      <td height="32">网站logo</td>
      <td><input name="site_logo" type="text" id="site_logo" size="40" value="<?=$row['site_logo']?>" />
      <input type="button" id="image3" value="上传" /></td>
    </tr>
    <tr>
      <td height="31">公司的二维码</td>
      <td><input name="company_ewm" type="text" id="company_ewm" value="<?=$row['company_ewm']?>" size="40" />
      <input type="button" id="image4" value="上传" /></td>
    </tr>
    <tr>
      <td height="26">网站地址</td>
      <td><input type="text" name="site_url" id="site_url" value="<?=$row['site_url']?>" /></td>
    </tr>
    <tr>
      <td height="89">网站关键字</td>
      <td><textarea name="site_keywords" id="site_keywords" cols="45" rows="5"><?=$row['site_keywords']?></textarea></td>
    </tr>
    <tr>
      <td height="102">网站描述</td>
      <td><textarea name="site_description" id="site_description" cols="45" rows="5"><?=$row['site_description']?></textarea></td>
    </tr>
    <tr>
      <td height="90">底部版 权信息</td>
      <td><textarea name="site_copyright" id="site_copyright" cols="45" rows="5"><?=$row['site_copyright']?></textarea></td>
    </tr>
    <tr>
      <td height="28">公司名称</td>
      <td><input type="text" name="company_name" id="company_name" value="<?=$row['company_name']?>" /></td>
    </tr>
    <tr>
      <td height="26">联系电话</td>
      <td><input type="text" name="company_phone" id="company_phone" value="<?=$row['company_phone']?>" /></td>
    </tr>
    <tr>
      <td height="30">传真</td>
      <td><input type="text" name="company_fax" id="company_fax" value="<?=$row['company_fax']?>" /></td>
    </tr>
    <tr>
      <td height="29">电子邮箱 </td>
      <td><input type="text" name="company_email" id="company_email" value="<?=$row['company_email']?>" /></td>
    </tr>
    <tr>
      <td height="28">微信</td>
      <td><input type="text" name="company_weixin" id="company_weixin" value="<?=$row['company_weixin']?>" /></td>
    </tr>
    <tr>
      <td height="31">公司地址</td>
      <td><input name="company_address" type="text" id="company_address" size="60" value="<?=$row['company_address']?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="button" id="button" value="保存" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
if($_GET['act']=='save'){
	$sql="update config set site_title='".$_POST['site_title']."',site_logo='".$_POST['site_logo']."',company_ewm='".$_POST['company_ewm']."',site_url='".$_POST['site_url']."',site_keywords='".$_POST['site_keywords']."',site_description='".$_POST['site_description']."',site_copyright='".$_POST['site_copyright']."',company_name='".$_POST['company_name']."',company_phone='".$_POST['company_phone']."',company_fax='".$_POST['company_fax']."',company_email='".$_POST['company_email']."',company_weixin='".$_POST['company_weixin']."',company_address='".$_POST['company_address']."' where id=1";
	if(mysql_query($sql)){
		echo"<script>alert('保存成功！');window.location.href='config.php'</script>";
		exit;
		}else{
			echo"<script>alert('保存失败！');window.locaiton.href='config.php'</script>";
		    exit;
			}
	}
mysql_close($conn);
?>