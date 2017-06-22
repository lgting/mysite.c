// JavaScript Document
//支持Enter键登录
document.onkeydown = function(e){
	if($(".bac").length==0)
	{
		if(!e) e = window.event;
		if((e.keyCode || e.which) == 13){
			var obtnLogin=document.getElementById("submit_btn")
			obtnLogin.focus();
		}
	}
}

$(function(){
			//提交表单
			$('#submit_btn').click(function(){
				show_loading();
				var myReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; //邮件正则
				if($('#email').val() == ''){
					show_err_msg('邮箱还没填呢！');	
					$('#email').focus();
				}else if(!myReg.test($('#email').val())){
					show_err_msg('您的邮箱格式错咯！');
					$('#email').focus();
				}else if($('#password').val() == ''){
					show_err_msg('密码还没填呢！');
					$('#password').focus();
				}else if($('#j_captcha').val() == ''){
				    show_err_msg('验证码必须要填');
				    $('#j_captcha').focus();
                }else{
					//ajax提交表单，#login_form为表单的ID。 如：$('#login_form').ajaxSubmit(function(data) { ... });
					$.ajax({
						type: "POST",
						url: "backend/judge_login",/*用is_login方法判断登录*/
						data: "email="+$('#email').val()+"&password="+$('#password').val()+"&captcha="+$('#j_captcha').val()+"&captcha_url="+$('#captcha_img').attr('src'),
						success: function(msg){
							if(msg==1)
							{
								show_msg('登录成功咯！  正在为您跳转...','backend');
							}
							else
							{
								show_msg(msg+'登录失败请重新登录！','');
								document.write(msg);
							}
						}
					});
					/*这边看服务器返回的信息如果登录成功提示登录成功的消息，失败则提醒失败的消息*/
				}
			});
			/*验证码输入框失去焦点就ajax验证*/
			/*	$('#j_captcha').blur( function () { alert("这里ajax验证"); } );*/
			$('#captcha_img').click(function(){
			    /*ajax向服务器发出换图片的请求，服务器得到请求，生成图片并返回图片的url*/
                $.ajax({
                    type: "POST",
                    url: "backend/switch_captcha",
                    data: "写不写都无所谓",
                    success: function(msg){
                        $('#captcha_img').attr('src','/common/captcha/'+msg);

                    }
                });
			});
		});