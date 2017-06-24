<?php
	$htmlData = '';
	
?>
<?php 
var_dump($category);
?>
<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta name="keywords" content="皈依山人">
	<meta name="description" content="皈依山人的网站后台管理系统。">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrom=1">
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
	<form name="example" method="post" action="/index.php/backend/index/article/add">
		文章标题:<input type="text" name="title"></br>
		sketch:<textarea style="width:700px;height:30px;" name="sketch"></textarea>
		<textarea name="content1" id="content1" style="width:800px;height:420px;visibility:hidden;"></textarea>
		<br />
		
		
		<!-- 文章分类 -->
		<select name="category" id="category">
			<option disabled selected value>请选择</option>
			<?php 
				foreach($category as $v)
				{
					echo "<option value='".$v->idcategory."'>{$v->name}</option>";
				}
						
			?>
		</select>
		<input type="submit" id="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
	</form>

  </body>
  <script type="text/javascript">
  function $( eleStr ){
			switch(eleStr.substr(0,1)){
			 case "#":
		            return document.getElementById(eleStr.substr(1));
		            break;
		        case ".":
		            return document.getElementsByClassName(eleStr.substr(1));
		            break;
		        case "_":
		            return document.getElementsByName(eleStr.substr(1));
		            break;
		        default:
		            return document.getElementsByTagName(eleStr);
		        break;
			}
	  }
	window.onload = function(){
			
			$('#submit').onclick = function(){
      				//注意要读取kindedit中textarea的数据不能简单的获取，具体看kindedit文档，
					if( $('#category').value == '' ){
						confirm('请选择分类');
						return false;
						}
				}
			
			
		}
  </script>
</html>




















