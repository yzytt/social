<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
 <html lang="zh-CN">
 <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="__PUBLIC__/style/common.css">
   <link rel="stylesheet" href="__PUBLIC__/style/main.css">
   <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
   <script type="text/javascript" src="__PUBLIC__/js/colResizable-1.3.min.js"></script>
   <script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
   
   <script type="text/javascript">
      $(function(){  
        $(".list_table").colResizable({
          liveDrag:true,
          gripInnerHtml:"<div class='grip'></div>", 
          draggingClass:"dragging", 
          minWidth:30
        }); 
        
      }); 
   </script>
   <title></title>
 </head>
 <body>
  <div class="container">
   <table width="100%" border="0" cellspacing="1" cellpadding="3" class="list_table">
  <tr class="head"> 
    <td height="23" colspan="2">服 务 器 信 息</td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="50%">服务端信息：<?php echo ($systemMsg[SERVER_SOFTWARE]); ?></td>
    <td width="50%">邮件模式：<?php echo ($systemMsg[sys_mail]); ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="50%">PHP版本：<?php echo ($systemMsg[sysversion]); ?></td>
    <td width="50%">服务器IP：<?php echo ($systemMsg[SERVER_ADDR]); ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="50%">服务器端口：<?php echo ($systemMsg[SERVER_PORT]); ?></td>
    <td width="50%">是否允许文件上传：<?php echo ($systemMsg[file_uploads]); ?><span help="1">（如果不允许可把php.ini里的file_uploads=Off改成file_uploads=On，重启服务器即可）</span></td>
  </tr>
    
  <tr bgcolor="#FFFFFF"> 
    <td width="50%">最大上传限制：<?php echo ($systemMsg[max_upload]); ?><span help="1">（需更大可修改php.ini里的upload_max_filesize值，重启服务器即可）</span></td>
    <td width="50%">服务器所在时间：<?php echo ($systemMsg[systemtime]); ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="50%">最大执行时间：<?php echo ($systemMsg[max_ex_time]); ?><span help="1">（需更大可修改php.ini里的max_execution_time值，重启服务器即可）</span></td>
    <td width="50%">网站所在磁盘物理位置：<?php echo ($systemMsg[DOCUMENT_ROOT]); ?></td>
  </tr>
   <tr bgcolor="#FFFFFF"> 
    <td width="50%">空间限制内存：<?php echo ($systemMsg[memory_user_limit]); ?><span help="1">（需更大可修改php.ini里的memory_limit值，重启服务器即可）</span></td>
  <td width="50%">当前文件路径：<?php echo ($systemMsg[SCRIPT_FILENAME]); ?></td>  
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="50%">是否支持采集：<?php echo ($systemMsg[allow_url_fopen]); ?><span help="1">（如果不支持可把php.ini里的allow_url_fopen=Off改成allow_url_fopen=On，重启服务器即可）</span></td>
     <td width="50%">Zend Optimizer版本：<?php echo ($systemMsg[zendVersion]); ?></td>
  
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="50%">是否支持GD2库：<?php echo ($systemMsg[gdpic]); ?><span help="1">（如果不支持可把php.ini中;extension=php_gd2.dll前面的;去掉，重启服务器即可）</span></td>
    <td width="50%">是否允许Cookie：<?php echo ($systemMsg[ifcookie]); ?><span help="1">（如果不允许可在Windows控制面板 ,"Internet选项" ,隐私设置中调整）</span></td>
  </tr>

</table> 
  </div>
 </body>
 </html>