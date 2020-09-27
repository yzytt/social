<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
   <meta http-equiv=Content-Type content="text/html; charset=utf-8" >
   <title>动态浏览</title>
   <link href="__PUBLIC__/css/main.css" rel="stylesheet" type="text/css" />
  
</head>
<body>
<div class="contain">
   <div><a href="<?php echo U(index);?>"></a></div>
	  <div class="menu">
		<ul >
		<?php if(is_array($t_list)): $i = 0; $__LIST__ = $t_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li ><span>|&nbsp;&nbsp;&nbsp;<span><a href="<?php echo U('newsList',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>				
   <?php if($c_name != null): ?><ul id="loged">
	  	   <li><a href="<?php echo U('Login/loginOut');?>" target="_self">退出登录</a></li>
		   <li><a>欢迎您,<?php echo ($c_name); ?></a></li>
		</ul>	
	<?php else: ?>
		<ul id="login">
		   <li><a href="<?php echo U('Register/register');?>" target="_self">注册</a></li>
		   <li><a href="<?php echo U('Login/login');?>" target="_self">登录</a></li>
		</ul><?php endif; ?>				
	</div>
	<div class="line1" ></div>
	<div class="main">
	
		<div style="clear: both;"></div>

		<div class="details" >
		<div style="font-size:28px;text-align:center">
			
			<?php switch($typeid): case "1": ?>体育<?php break;?>
                    <?php case "2": ?>学习<?php break;?>
                    <?php case "3": ?>生活<?php break;?>
                    <?php case "4": ?>音乐<?php break;?>
                    <?php default: ?>公告<?php endswitch;?>
		</div>
		<?php if(is_array($n_list)): $i = 0; $__LIST__ = $n_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table>
		   <tr>
			 <td>
			   <a href="<?php echo U('message',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a>
			 </td>
		   </tr>
		   <tr> 
			 <td >
			   <font color="#8F8C89">日期：<?php echo (date("Y-m-d",$vo["addtime"])); ?>  </font>
			 </td>
	 	   </tr>
		   <tr> 
			 <td ><?php echo (mb_substr($vo["message"],0,77,'utf-8')); ?>...</td>
		   </tr>
		 </table>
		 <div class='line2' ></div><?php endforeach; endif; else: echo "" ;endif; ?>
          <div class="page" >
					<?php echo ($page); ?>
		  </div>	
		</div>
		</div>
		<div class="footer">
		<?php if($c_name != null): ?><a href="__ROOT__/admin.php?Index/index">管理后台</a><?php endif; ?>
			<div style='display:none'></div>
		</div>
	</div>
</body>
</html>