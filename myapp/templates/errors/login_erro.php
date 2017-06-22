<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>请登录</title>
</head>
<body>
<div class="jf_register">
	<h2>请你登录！<a class="blue" href="">请登录</a></h2>
</div>
<div class="jf_password">
<!-- 每一个地方都有我辛勤调试的汗水，即使有的时候犯得错误比较傻 -->
	<?php echo $error_message; ?>
	<!-- 这边可以重新填写表单 -->
	<ul>
		<li>系统将会在<strong id="endtime"></strong>秒后跳转到登录页！
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="blue" href="">直接跳转</a></li>
	</ul>
</div>
<script type="text/javascript">
	var i = 3;
	function remainTime(){
		if(i==0){
			location.href='';
		}
		document.getElementById('endtime').innerHTML=i--;
		setTimeout("remainTime()",1000);
	}
	remainTime();
</script>

</body>
</html>