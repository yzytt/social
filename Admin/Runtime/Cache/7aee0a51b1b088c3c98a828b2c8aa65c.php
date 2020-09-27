<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理后台</title>
<link href="__PUBLIC__/Style/login.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/Js/jquery.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">

</script>
<body>
<!--登陆框-->
<div class="view-container" >
  <div id="account_login" class="account-box-wrapper">
    <div class="account-box">
      <form name="form1" method="post" action="<?php echo U('Login/dologin');?>">
        <div class="account-form-title">
        
          <label>管理登录</label>
        </div>
        <div class="account-input-area">
          <input name="name" type="text" placeholder="用户名">
        </div>
        <div class="account-input-area">
          <input type="password" name="password" placeholder="密码">
        </div>

        <button class="account-button login-btn" type="submit" name="sm1" onclick="this.form.submit();"><span>登录</span></button>
        <p style="text-align:center;"><a href="<?php echo U('Login/register');?>">没有账号，点此注册</a></p>
      </form>
    </div>
  </div>
</div>
</body>
</html>