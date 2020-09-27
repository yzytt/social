<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
   <meta http-equiv=Content-Type content="text/html; charset=utf-8" >
   <title>新闻网站</title>
   <link href="__PUBLIC__/css/main.css" rel="stylesheet" type="text/css" />
  
</head>
<body>
<div class="contain">
   <div class="logo"><a href="<?php echo U(index);?>"></a></div>
	  <div class="menu">
		<ul >
		<?php if(is_array($t_list)): $i = 0; $__LIST__ = $t_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li ><span>|&nbsp;&nbsp;&nbsp;<span><a href="<?php echo U('newsList',array('t_id'=>$vo['t_id']));?>"><?php echo ($vo["t_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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
	   <div class="select">
	   <form action="<?php echo U('Index/select');?>" method="post" >
	      <div class="select_left">
			<strong>搜索:</strong>
			<input name="keyword"  type="text" value='<?php echo ($keyword); ?>' placeholder="请输入关键字"/>
	      </div>
		  <div class="select_right">
			<input name="Submit" type="Submit"  value="立即搜索"  />
	      </div>
		</form>		
		</div>	
		<div class="currect_position">
		<?php if(empty($keyword)): ?>搜索到所有新闻共<font color='red'><?php echo ($count); ?></font>篇>
	    <?php else: ?>    
	               搜索到与<font color='red'><?php echo ($keyword); ?></font>有关的文章共计<font color='red'><?php echo ($count); ?>篇：</font><?php endif; ?>
		</div>
		<div style="clear: both;"></div>
		<div class="details" >
		    <?php if(is_array($n_list)): $i = 0; $__LIST__ = $n_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table>
			  <tr> 
				<td>
				   <a href="<?php echo U('message',array('n_id'=>$vo['n_id']));?>" title="<?php echo ($vo["n_title"]); ?>"><?php echo ($vo["n_title"]); ?></a>
				</td>
		  	  </tr>
			  <tr> 
				<td >
				   <font color="#8F8C89">日期：<?php echo (date("Y-m-d",$vo["n_addtime"])); ?> 点击：<?php echo ($vo["n_nums"]); ?> </font>
				</td>
			  </tr>
			  <tr> 
				<td ><?php echo (mb_substr($vo["n_message"],0,77,'utf-8')); ?>...</td>
			  </tr>
			</table>
			<div class='line2' ></div><?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="page">
				<?php echo ($page); ?>
			</div>	
		</div>		
 	  </div>

		<div class="footer">
		<?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == count($link)): ?><a href=<?php echo ($vo["a_link"]); ?>><?php echo ($vo["a_name"]); ?></a>
			<?php else: ?>
			<a href=<?php echo ($vo["a_link"]); ?>><?php echo ($vo["a_name"]); ?></a>&nbsp|&nbsp<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<div style='display:none'></div>
		</div>
	</div>
</div>

</body>

</html>