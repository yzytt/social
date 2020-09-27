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
<div style="width:100%;height:44px;line-height: 44px;padding-left: 20px; background:#fff url('__PUBLIC__/images/here.gif') 0px 0px repeat-x; position:fixed; top: 0px; font-size: 13px; font-family: '微软雅黑';">
  当前位置：广告管理 > 广告列表
</div>

<div style="width:100%;height:44px;"></div>
<div style="clear: both;"></div>
 <div>
    <div> 
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
            <tr>
              <th >广告名称</th>
              <th >内容</th>
              <th >链接地址</th>
              <th >所在位置</th>
              <th >状态</th>
              <th >排序</th>
              <th >操作</th>
            </tr>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">         
              <td><?php echo ($vo["a_name"]); ?></td>
              <td><?php echo ($vo["a_describe"]); ?></td>
              <td><?php echo ($vo["a_link"]); ?></td>
               <td>
              <?php if(is_array($position)): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($vo[a_position] == $v[value]): echo ($v["position"]); endif; endforeach; endif; else: echo "" ;endif; ?>
              </td>
              <?php if($vo["a_status"] == 1): ?><td><font color="green">开启</font></td>
              <?php else: ?>
                  <td><font color="red">关闭<font/></td><?php endif; ?>
             
              
             
              <td><?php echo ($vo["a_order"]); ?></td>
              
              <td>
				        <a href="<?php echo U('updateAd',array('a_id'=>$vo['a_id']));?>" >修改</a>
				        <a href="<?php echo U('delete',array('a_id'=>$vo['a_id']));?>" onclick="return del()">删除</a>
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
function del(){
if (confirm("确定要删除该广告么？")){
  return true;
  }
else
  {
  return false;
  }
}

</script>
</html>