<?php
	$htmlData = '';
	if (!empty($_POST['content1'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['content1']);
		} else {
			$htmlData = $_POST['content1'];
		}
	}
?>
<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta name="keywords" content="皈依山人">
	<meta name="description" content="皈依山人的网站后台管理系统。">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<!-- kindedit引入-->
		<link rel="stylesheet" href="/common/backend/kindedit//themes/default/default.css" />
	<link rel="stylesheet" href="/common/backend/kindedit//plugins/code/prettify.css" />
	<script charset="utf-8" src="/common/backend/kindedit//kindeditor.js"></script>
	<script charset="utf-8" src="/common/backend/kindedit//lang/zh_CN.js"></script>
	<script charset="utf-8" src="/common/backend/kindedit//plugins/code/prettify.js"></script>
	
    <title>编辑文章</title>
    <script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : '../plugins/code/prettify.css',
				uploadJson : '../php/upload_json.php',
				fileManagerJson : '../php/file_manager_json.php',
				allowFileManager : true,
					autoHeightMode : false,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
  </head>
  <body>
	<?php echo $htmlData; ?>	
	<form name="example" method="post" action="">
		文章标题:<input type="text" name=""></br>
		sketch:<textarea style="width:700px;height:30px;"></textarea>
		<textarea name="content1" style="width:800px;height:420px;visibility:hidden;"><?php echo htmlspecialchars($htmlData); ?></textarea>
		<br />
		<input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
	</form>

  </body>
</html>
