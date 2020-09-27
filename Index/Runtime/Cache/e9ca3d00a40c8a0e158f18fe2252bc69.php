<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
   <meta http-equiv=Content-Type content="text/html; charset=utf-8" >
   <title>动态浏览</title>
   <link href="__PUBLIC__/css/main.css" rel="stylesheet" type="text/css" />
   <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
   function hiddenad(id){
		$("#close_" + id).css("display", "none");
		$("#ad_" + id).css("display", "none");
		}
   </script>
</head>
<body>
<div class="contain">
   <div ><a href="<?php echo U(index);?>"></a></div>
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
		<div class="main_list" >
		   <div class="main_list_left" >
			<div class="main_type_title">					
			   <span>时政新闻</span>
			   <em><a href="<?php echo U('newsList?t_id=13');?>">更多>></a></em>
			</div>
			<div class="main_news_title">
			   <ul>
				 <?php if(is_array($t_list1)): $i = 0; $__LIST__ = $t_list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('message',array('n_id'=>$vo['n_id']));?>" title="<?php echo ($vo["n_title"]); ?>"><?php echo ($vo["n_title"]); ?></a>
					<span><font color=#297ad6><?php echo (date("Y-m-d",$vo["n_addtime"])); ?></font></span>
			  	 </li><?php endforeach; endif; else: echo "" ;endif; ?>
			   </ul>
			</div>
		 </div>

		 <div class="main_list_right">
			<div class="main_type_title">
				<span style="float:left;">国际新闻</span>
				<em style="float:right;"><a href="<?php echo U('newsList?t_id=14');?>">更多>></a></em>
			</div>
		    <div class="main_news_title">
				<ul>
				<?php if(is_array($t_list2)): $i = 0; $__LIST__ = $t_list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					  <a href="<?php echo U('message',array('n_id'=>$vo['n_id']));?>" title="<?php echo ($vo["n_title"]); ?>"><?php echo ($vo["n_title"]); ?></a>
					  <span><font color=#297ad6><?php echo (date("Y-m-d",$vo["n_addtime"])); ?></font></span>
				   </li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		  </div>
	    </div>
		
		<div class="main_list" >
		  <div class="main_list_left" >
			<div class="main_type_title">					
			  <span>体育新闻</span>
			  <em><a href="<?php echo U('newsList?t_id=12');?>">更多>></a></em>
			</div>
			<div class="main_news_title">
			  <ul>
			  <?php if(is_array($t_list3)): $i = 0; $__LIST__ = $t_list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
				  <a href="<?php echo U('message',array('n_id'=>$vo['n_id']));?>" title="<?php echo ($vo["n_title"]); ?>"><?php echo ($vo["n_title"]); ?></a>
				  <span><font color=#297ad6><?php echo (date("Y-m-d",$vo["n_addtime"])); ?></font></span>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		      </ul>
			</div>
		  </div>

		  <div class="main_list_right">
			<div class="main_type_title">
			   <span style="float:left;">娱乐新闻</span>
		   	   <em style="float:right;"><a href="<?php echo U('newsList?t_id=15');?>">更多>></a></em>
			</div>
			<div class="main_news_title">
			   <ul>
			   <?php if(is_array($t_list4)): $i = 0; $__LIST__ = $t_list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					 <a href="<?php echo U('message',array('n_id'=>$vo['n_id']));?>" title="<?php echo ($vo["n_title"]); ?>"><?php echo ($vo["n_title"]); ?></a>
					 <span><font color=#297ad6><?php echo (date("Y-m-d",$vo["n_addtime"])); ?></font></span>
				   </li><?php endforeach; endif; else: echo "" ;endif; ?>
			   </ul>
			</div>
		  </div>
		</div>
		
		<div id="close_1" style="position:fixed;left:120px;bottom:250px;cursor:pointer" onClick="hiddenad(1)">
 			 关闭X
		</div>
		<div id="ad_1" style="position:fixed;left:0px;bottom:40px">
		<?php if(is_array($left)): $i = 0; $__LIST__ = $left;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["a_link"]); ?>" title="<?php echo ($vo["a_link"]); ?>" target="_blank">	
					<img alt="<?php echo ($vo["a_describe"]); ?>" src="__ROOT__/Upload/c_picture/<?php echo ($vo["a_pic"]); ?>" height="200" width="170">
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>	
        
        <div id="close_2" style="position:fixed;right:120px;bottom:250px;cursor:pointer" onClick="hiddenad(2)">
 			 关闭X
		</div>
		<div id="ad_2" style="position:fixed;right:0px;bottom:40px">
			<?php if(is_array($right)): $i = 0; $__LIST__ = $right;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["a_link"]); ?>" title="<?php echo ($vo["a_link"]); ?>" target="_blank">	
					<img alt="<?php echo ($vo["a_describe"]); ?>" src="__ROOT__/Upload/c_picture/<?php echo ($vo["a_pic"]); ?>" height="200" width="170">
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>	
		<div class="footer">
		
		<?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == count($link)): ?><a href=<?php echo ($vo["a_link"]); ?>><?php echo ($vo["a_name"]); ?></a>
			<?php else: ?>
			<a href=<?php echo ($vo["a_link"]); ?>><?php echo ($vo["a_name"]); ?></a>&nbsp|&nbsp<?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
</div>

</body>

</html>