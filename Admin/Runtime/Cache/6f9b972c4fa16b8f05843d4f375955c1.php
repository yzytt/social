<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title></title>
   <link rel="stylesheet" href="__PUBLIC__/Style/common.css">
   <link rel="stylesheet" href="__PUBLIC__/Style/main.css">

   <script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>

</head>


<body>
<div style="width:100%;height:44px;line-height: 44px;padding-left: 20px; background:#fff url('__PUBLIC__/images/here.gif') 0px 0px repeat-x; position:fixed; top: 0px;">
  当前位置：广告管理 > 发布广告
</div>
<div style="width:100%;height:44px;"></div>
<div style="clear: both;"></div>
<div id="forms" class="mt10">
        <div class="box">
              <form action="<?php echo U('add');?>" class="jqtransform" method="post" enctype="multipart/form-data">
              	
               <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                  <td class="td_right">广告标题：</td>
                  <td class=""> 
                    <input type="text" name="co_type" class="input-text lh30" size="40">
                  </td>
                </tr>
                 <tr>
                  <td class="td_right">广告标题：</td>
                  <td class=""> 
                    <input name="co_message" type="file" />
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