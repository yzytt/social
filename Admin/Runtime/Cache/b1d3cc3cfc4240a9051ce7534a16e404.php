<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title></title>
   <link rel="stylesheet" href="__PUBLIC__/Style/common.css">
   <link rel="stylesheet" href="__PUBLIC__/Style/main.css">
   <link rel="stylesheet" href="__PUBLIC__/Upload/ajaxfileupload.css">
   <script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>
   <script type="text/javascript" src="__PUBLIC__/Upload/ajaxfileupload.js"></script>  


<script type="text/javascript">
  $(function(){
  //上传图片
  $('#upload_button').click(function (){
      if($('#file').val() != ''){
          $('#file').nextAll('span').html('<img src="__ROOT__/Public/Images/loading.gif" />');
    
          $.ajaxFileUpload({
              url          : '__URL__/add_picture',
              secureuri    : false,
              fileElementId : 'file',
              dataType     : 'json',
              success      : function (json){
            if(json.status == 1){
                      $('#file').nextAll('span').html('广告图片上传成功！');
                      $('#roll_img').attr('src', '__ROOT__/Upload/c_picture/'+json.info).css({display: 'block'});
                      $('#img_src').val(json.info);
                      $('#tp').val(json.info);

                  } else {
                      $('#file').nextAll('span').html('上传失败');
                      alert(json.info);
                  }
              }
          })

      } else {
          alert('错误，未选择上传图片');
      }
  })
  })
</script>
</head>
<body>
<div style="width:100%;height:44px;line-height: 44px;padding-left: 20px; background:#fff url('__PUBLIC__/images/here.gif') 0px 0px repeat-x; position:fixed; top: 0px;">
  当前位置：广告管理 > 发布广告
</div>
<div style="width:100%;height:44px;"></div>
<div style="clear: both;"></div>
<div id="forms" class="mt10">
        <div class="box">
              <form action="<?php echo U('Ad/add');?>" class="jqtransform" method="post">
                <input type="hidden" name="a_pic" id="tp" value="<?php echo ($vo["fileurl"]); ?>">
               <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                  <td class="td_right">广告标题：</td>
                  <td class=""> 
                    <input type="text" name="a_name" class="input-text lh30" size="40">
                  </td>
                </tr>
                 <tr>
                  <td class="td_right">广告内容：</td>
                  <td class=""> 
                    <input type="text" name="a_describe" class="input-text lh30" size="40">               
                  </td>
                </tr>               
                <tr>
                  <td class="td_right">链接地址：</td>
                  <td class="">
                     <input type="text" name="a_link" class="input-text lh30" size="40">     
                  </td>
                </tr>
                 <tr>
                  <td class="td_right">排序：</td>
                  <td class="">
                     <input type="text" name="a_order" class="input-text lh30" size="40">     
                  </td>
                </tr>
                <tr>
                  <td class="td_right">所在位置：</td>
                  <td class="">
                    <select name="a_position" class="select"> 
                      <?php if(is_array($position)): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["value"]); ?>"><?php echo ($vo["position"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                  </td>
                 </tr>
                 <tr>
                <td class="td_right">状态：</td>
                  <td class="">
                    <input type="radio" name="a_status" value="1" checked="checked"> 开启</input>
                    <input type="radio" name="a_status" value="0"> 关闭</input>
                  </td>
                 </tr>

                <tr>
                   <td width="200" valign="middle" align="right" width="500">
                    <b class="must"></b>
                    上传广告图片：  
                    </td>
                    <td valign="middle" colspan="2">
                    <input id="file"  type="file" onblur="tip();" onfocus="" value="" name="file">
                    <input type="button" name="upload_button" id="upload_button"  class="input-text lh30" value="上传">
                    <img src="__ROOT__/Upload/c_picture/<?php echo ($vo["fileurl"]); ?>" id="roll_img" style="display: none; width:50px; height:50px; ">
                    <span id="fileTiShi" style="color:red; margin:0 0 0 10px;">*图片大小不能超过5M，格式为jpg,png,bmp
                    </span>
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