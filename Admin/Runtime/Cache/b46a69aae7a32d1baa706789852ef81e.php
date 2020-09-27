<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>测试平台</title>
<link href="__PUBLIC__/Style/base.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/Style/login.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/Js/jquery.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">

</script>
<body>
<!--登陆框-->
<div id="login-box">
   <div class="login-top"></div>
      <div class="login-main">
    <form name="form1" method="post" action="<?php echo U('login');?>">
      <dl>

	   <dt>用户名：</dt>
	   <dd><input type="text" name="u_name"/></dd>
	   <dt>密&nbsp;&nbsp;码：</dt>
	   <dd><input type="password" class="alltxt" name="u_password"/></dd>
	   	   <dt>验证码：</dt>
	   <dd><input id="vdcode" type="text" name="validate" style="text-transform:uppercase;"/><img id="vdimgck" align="absmiddle" onClick="this.src=this.src+'?'" style="cursor: pointer; width:80px; height:25px;" alt="看不清？点击更换" src="<?php echo U('verify');?>" />
           <!-- <a href="#" onClick="changeAuthCode();">看不清？ </a> --></dd>
        
		<dt> </dt>		
		<dd><button type="submit" name="sm1" class="login-btn" onclick="this.form.submit();">登录</button><a href="<?php echo U('Register/register');?>"><button type="button" class="login-btn" style="margin-left:10px;">注册</button></a></dd>
	 </dl>
	</form>
   </div>
</div>
</body>