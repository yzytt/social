<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title></title>
   <link rel="stylesheet" href="__PUBLIC__/Style/common.css">
   <link rel="stylesheet" href="__PUBLIC__/Style/main.css">
   <script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>
   <script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
</head>
<body>



<div style="width:100%;height:44px;line-height: 44px;padding-left: 20px; background:#fff url('__PUBLIC__/Images/here.gif') 0px 0px repeat-x; position:fixed; top: 0px; font-size: 13px; font-family: '微软雅黑';">
 	  当前位置：好友管理 > 添加好友
</div>

<div style="width:100%;height:44px;"></div>
<div style="clear: both;"></div>
<div>
    <div> 
      <div style="margin:10px;float:right;">
        <div style="margin-right:10px;">
          <form method="post" action="<?php echo U('Friend/addFriend');?>">
          选择分类：&nbsp;&nbsp;&nbsp;
          <select name="type">
            <option value="1">体育</option>
            <option value="2">学习</option>
            <option value="3">生活</option>
            <option value="4">音乐</option>
          </select>
          <input type="submit"  value="搜索">
         </form>
        </div>
      </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
            <tr>
               <th >用户编号</th>
			         <th >用户名称</th>
               <th >用户标签</th>
               <th >操作</th>
            </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">     
                  <td><?php echo ($vo["id"]); ?></td> 
			            <td><?php echo ($vo["name"]); ?></td>
                  <td><?php echo ($vo["showlabel"]); ?></td>
                  <td>
				            <a href="<?php echo U('Friend/doAdd',array('id'=>$vo['id']));?>" onclick="return guanzhu()">关注</a>
			            </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr align="center">
              <td colspan="11"><?php echo ($page); ?></td>      
            </tr>
        </table>
    </div>
</div>

</body>


<script type="text/javascript">
function guanzhu(){
if (confirm("确定要关注该用户么？")){
	return true;
  }
else
  {
	return false;
  }
}

</script>

</html>