<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title></title>
   <link rel="stylesheet" href="__PUBLIC__/style/common.css">
   <link rel="stylesheet" href="__PUBLIC__/style/main.css">
   <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
   <script type="text/javascript" src="__PUBLIC__/js/colResizable-1.3.min.js"></script>
   <script type="text/javascript" src="__PUBLIC__/js/common.js"></script></head>
<body>
<div style="width:100%;height:44px;line-height: 44px;padding-left: 20px; background:#fff url('__PUBLIC__/images/here.gif') 0px 0px repeat-x; position:fixed; top: 0px;">
  当前位置：动态管理 > 修改动态
</div>
<div style="width:100%;height:44px;"></div>
<div style="clear: both;"></div>
<div id="forms" class="mt10">
        <div class="box">
              <form action="<?php echo U('update');?>" class="jqtransform" method="post">
              	<input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
               <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                  <td class="td_right">动态标题：</td>
                  <td class=""> 
                    <input type="text" name="title" value="<?php echo ($list["title"]); ?>" class="input-text lh30" size="40">
                  </td>
                </tr>
                 <tr>
                  <td class="td_right">动态内容：</td>
                  <td class=""> 
                    <textarea name="message"><?php echo ($list["message"]); ?></textarea>                 
                  </td>
                </tr>

                 <tr>
                   <td class="td_right">&nbsp;</td>
                   <td class="">
                     <input type="submit" name="button" class="btn btn82 btn_save2" value="保存"> 
                    <input type="reset" name="button" class="btn btn82 btn_res" value="重置"> 
                   </td>
                 </tr>
               </table>
               </form>
            </div>
            </div>
            
</body>
</html>