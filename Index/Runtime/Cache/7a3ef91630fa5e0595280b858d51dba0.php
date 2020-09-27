<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="UTF-8">
        <title>登录</title>
        <link href="__PUBLIC__/css/login.css" rel="stylesheet" type="text/css" />
        <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>

   
   
    </head> 
   <body>

<div class="view-container  ">
  <div id="account_register_phone" class="account-box-wrapper">
    <div class="account-box">
      <div class="">
        <div class="account-form-title">
          <label>帐号注册</label>
        </div>
        <form  method="post" action="<?php echo U('doRegister');?>" onsubmit="return check()">
        <div class="account-input-area">
          <input id="name" name="name" type="text" placeholder="用户名">
          <span id="nameMessage" ></span>
        </div>
        <div class="account-input-area">
          <input id="c_password" name="password" type="password" placeholder="密码">
          <span id="passMessage" ></span> 
        </div>
         <div style="margin-left:35px">
          <input type="checkbox" name="label[]" value="1">体育
          <input type="checkbox" name="label[]" value="2">学习
          <input type="checkbox" name="label[]" value="3">生活
          <input type="checkbox" name="label[]" value="4">音乐
        </div>
       
        <input type="submit" class="account-button"  value="注册" id="submit" onchange="check();">
        </form>
        <div class="account-bottom-tip top-tip">
          <label></label>
        </div>
        <div class="account-bottom-tip ">
          <label>已注册过帐号？<a href="<?php echo U('Login/login');?>">点击登录！</a></label>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>