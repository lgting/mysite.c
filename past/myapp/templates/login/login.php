
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

<meta charset="utf-8">
<title><?=SITENAME?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- CSS -->

<link rel="stylesheet" href="/common/login/css/supersized.css">
<link rel="stylesheet" href="/common/login/css/login.css">
<link href="/common/login/css/bootstrap.min.css" rel="stylesheet">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	<script src="/common/login/js/html5.js"></script>
<![endif]-->
<script src="/common/login/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/common/login/js/jquery.form.js"></script>
<script type="text/javascript" src="/common/login/js/tooltips.js"></script>
<script type="text/javascript" src="/common/login/js/login.js"></script>
</head>

<body>

<div class="page-container">
	<div class="main_box">
		<div class="login_box">
			<div class="login_logo">
				<img src="/common/login/images/logo.png" >
			</div>
		
			<div class="login_form">
				<!--跳转页面在js设置-->
					<div class="form-group">
						<label for="j_username" class="t">邮　箱：</label>
						<?php
							$data=array(
								'id' => 'email',
								'name' => 'email',
								'placeholder' => '请输入你的登录邮箱',
								'type' => 'text',
								'class' => 'form-control x319 in',
								'autocomplete'  => 'off',
						
							);
						echo form_input($data);
						?>
					</div>
					<div class="form-group">
						<label for="j_password" class="t">密　码：</label>
						<?php
						$data=array(
							'id' => 'password',
							'name' => 'password',
							'placeholder' => '请输入你的登录密码',
							'class' => 'password form-control x319 in',
						);
						echo form_password($data);
						?>
					</div>
					<div class="form-group">
						<label for="j_captcha" class="t">验证码：</label>
						<?php
						$data=array(
							'id' => 'j_captcha',
							'name' => 'j_captcha',
							'placeholder' => '请输入验证码',
							'class' => 'form-control x164 in',
						);
						echo form_input($data);
						?>
						<!-- <img id="captcha_img" alt="点击更换" title="点击更换" src="backend/born_captcha" class="m"> ci依照此段标签信息打印-->
						<?php echo $captcha; ?>
						<!-- 验证码输入后ajax验证 -->
					
					</div>
					<div class="form-group">
						<label class="t"></label>
						<label for="j_remember" class="m">
							<?php
							$data=array(
								'id' => 'j_remember',
								'value' => 'true',
							);
							echo form_checkbox($data);
							?>
						&nbsp;记住登陆账号!</label>
					</div>
					<div class="form-group space">
						<label class="t"></label>
						　　<?php
						$data=array(
							'id' => 'submit_btn',
							'class' => 'btn btn-primary btn-lg',
							'content'   => '&nbsp;登&nbsp;录&nbsp; ',
						);
						echo form_button($data);
						?>
						<input type="reset" value="&nbsp;重&nbsp;置&nbsp;" class="btn btn-default btn-lg">
					</div>
				</form>
			</div>
		</div>
		<div class="bottom">Copyright &copy; 2014 - 2015 <a href="#">系统登陆</a></div>
	</div>
</div>

<!-- Javascript -->

<script src="/common/login/js/supersized.3.2.7.min.js"></script>
<script src="/common/login/js/supersized-init.js"></script>
<script src="/common/login/js/scripts.js"></script>
<div style="text-align:center;">
<p>模板来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>