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
    欢迎使用！
  </div>
 </body>
 </html>