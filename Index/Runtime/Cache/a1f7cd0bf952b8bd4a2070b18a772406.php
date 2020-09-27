<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <title>动态浏览</title>
    <link href="__PUBLIC__/css/main.css" rel="stylesheet" type="text/css" />
    <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">
    function publish(){
        var id=document.getElementById("id").value; 
        var message=document.getElementById("message").value;
        $.ajax( {  
            url:'__APP__/Index/addComment',
            data:{  
                'id':id,
                'message':message
            }, 
            type:'post',  
            cache:false,  
            dataType:'json',  
            success:function(data) {
                alert("发布成功");
                location.reload();  
            },  
            error : function() {  
                alert("发布失败");  
            }  
        }); 
    }

    function zan(){
        var id=document.getElementById("id").value; 
        $.ajax( {  
            url:'__APP__/Index/zan',
            data:{  
                'id':id
            }, 
            type:'post',  
            cache:false,  
            dataType:'json',  
            success:function(data) {
                alert("点赞成功");
                location.reload();  
            },  
            error : function() {  
                alert("点赞失败");  
            }  
        }); 
    }
    </script>
</head>
<body>
<div class="contain">
    <div class="menu">
        <ul>
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
           <div class="details_news_title">
              <?php echo ($news["title"]); ?>
           </div> 
           <div class="details_news_author">
              <span style="margin-right:5px">作者：<?php echo ($author); ?> </span> 
              <span style="margin-right:5px">点赞数：<?php echo ($news["nums"]); ?> </span> 
              <span class="updatetime" style="margin-right:5px">发布时间：<?php echo (date("Y-m-d",$news["addtime"])); ?></span>
           </div>  
           <div class="details_news_message">
            <div style="text-align:center;">
            <img  src="__ROOT__/Upload/c_picture/<?php echo ($news["pic"]); ?>" width="250px" height="250px">
          </div>
          
                  　 	  <?php echo ($news["message"]); ?>
           </div>
           <?php if($c_name != null): ?><div style="text-align:center;padding-bottom:10px">
            <input type="button" onclick="zan()"  style="width:80px;height:50px;color:white;background-color:#F75000;border:0px" value="点赞">
          </div><?php endif; ?>
        </div>
        <div class="answer">
        	<div class="details_news_title">评论</div>

        	<div class="answer_cont">
            <?php if(is_array($c_list)): $i = 0; $__LIST__ = $c_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="answer_list">
                    <span><?php echo ($vo["name"]); ?>:</span><?php echo ($vo["message"]); ?>
                    <p><?php echo (date("Y-m-d",$vo["addtime"])); ?></p>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="details_news_bottom"><?php echo ($page); ?></div>
			<div class="answer_cont_bottom">
            <?php if($c_name != null): ?><table>
                  <input type="hidden" name="id" id="id" value="<?php echo ($news["id"]); ?>">
				  <tr>
              		<td > 我的评论：</td>
              		<td>
                       <textarea name="message" id="message"  rows="2" cols="90" ></textarea>       
                    </td>
                  </tr>
                  <tr>
              		<td colspan=2 align=center>
                 	   <input type="button" onclick="publish()"  value="发布">   
              		</td>
            	  </tr>
          	   </table>
            <?php else: ?> 
                你尚未登录，请登录后再进行评论。
             <p>
            	<a href="<?php echo U('Login/login');?>" >登录</a>
	        	<a href="<?php echo U('Register/register');?>">注册</a>
          	</p><?php endif; ?> 
       </div>       
   </div>
</div>          

    <div class="footer">
	<?php if($c_name != null): ?><a href="__ROOT__/admin.php?Index/index">管理后台</a><?php endif; ?>
      <div style='display:none'></div>
    </div>

</body>
</html>