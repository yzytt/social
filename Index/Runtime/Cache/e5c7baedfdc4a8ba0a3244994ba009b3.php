<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="UTF-8">
        <title>登录</title>
         <link href="__PUBLIC__/css/login.css" rel="stylesheet" type="text/css" />
    </head> 
    <body>
    <div class="view-container  ">
	  <div id="account_login" class="account-box-wrapper">
	    <div class="account-box">
	      <form  method="post" action="<?php echo U('doLogin');?>">
	        <div class="account-form-title">
	          <label>帐号登录</label>
	        </div>
	        <div class="account-input-area">
	          <input name="name" type="text" placeholder="用户名">
	        </div>
	        <div class="account-input-area">
	          <input type="password" name="password" placeholder="密码">
	        </div>
	       
	        <input class="account-button " type="submit" value="登录">
	        <div class="account-bottom-tip ">
	          <label>还没有账户?<a href="<?php echo U('Register/register');?>">马上注册!</a></label>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
	</body>
</html>