<?php if (!defined('THINK_PATH')) exit();?><!doctype html>

<html lang="zh-CN">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="__PUBLIC__/style/common.css">
  <link rel="stylesheet" href="__PUBLIC__/style/style.css">
  <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/js/jquery.SuperSlide.js"></script>
  <script type="text/javascript">
  $(function(){
      $(".sideMenu").slide({
         titCell:"h3", 
         targetCell:"ul",
         defaultIndex:0, 
         effect:'slideDown', 
         delayTime:'500' , 
         trigger:'click', 
         triggerTime:'150', 
         defaultPlay:true, 
         returnDefault:false,
         easing:'easeInQuint',
         endFun:function(){
              scrollWW();
         }
       });
      $(window).resize(function() {
          scrollWW();
      });
  });

  function scrollWW(){
    if($(".side").height()<$(".sideMenu").height()){
       $(".scroll").show();
       var pos = $(".sideMenu ul:visible").position().top-38;
       $('.sideMenu').animate({top:-pos});
    }else{
       $(".scroll").hide();
       $('.sideMenu').animate({top:0});
       n=1;
    }
  } 

var n=1;
function menuScroll(num){
  var Scroll = $('.sideMenu');
  var ScrollP = $('.sideMenu').position();
  /*alert(n);
  alert(ScrollP.top);*/
  if(num==1){
     Scroll.animate({top:ScrollP.top-38});
     n = n+1;
  }else{
    if (ScrollP.top > -38 && ScrollP.top != 0) { ScrollP.top = -38; }
    if (ScrollP.top<0) {
      Scroll.animate({top:38+ScrollP.top});
    }else{
      n=1;
    }
    if(n>1){
      n = n-1;
    }
  }
}
  </script>
  <title>管理后台</title>
</head>

<body>
    <div class="top">

      <div id="top_t">

        <div id="logo" class="fl"></div>

        <div id="photo_info" class="fr">

          <div id="photo" class="fl">

            <a href="#"><img src="__PUBLIC__/images/a.png" alt="" width="60" height="60"></a>

          </div>

          <div id="base_info" class="fr">

            

            <div class="info_center">您好：
      
              <?php echo ($u_name); ?>        

            </div>
            <div class="help_info">


              <a href="__ROOT__/index.php?Index/index" id="gy" target="blank">&nbsp; 首页</a>

              <!-- <a href="__ROOT__/index.php?Login/loginOut" id="out">&nbsp;退出</a> -->

            </div>

          </div>

        </div>

      </div>




    </div>



    <div style="clear: both;"></div>

    <div id="side_here_l" class="fl"></div>

    <div class="side">
        <div class="sideMenu" style="margin:0 auto">
          <?php if($level == 1): ?><h3>用户管理</h3>
          <ul>
              <a href="<?php echo U('User/userList');?>" target="right" ><li>用户列表</li></a>
          </ul>
      <h3>公告管理</h3>
          <ul>
              <a href="<?php echo U('News/NoticeList');?>" target="right" ><li>公告列表</li></a>
              <a href="<?php echo U('News/publishNotice');?>" target="right" ><li>发布公告</li></a>              
          </ul>
   <!--    <h3>动态管理</h3>
          <ul>
              <a href="<?php echo U('News/newsList');?>" target="right" ><li>动态列表</li></a>               
          </ul>
      <h3>评论管理</h3>
          <ul>
              <a href="<?php echo U('Comment/commentList');?>" target="right" ><li>评论列表</li></a>             
          </ul> -->
          
       <?php else: ?>
       <h3>动态管理</h3>
          <ul>
              <a href="<?php echo U('News/NewsList');?>" target="right" ><li>动态列表</li></a>
              <a href="<?php echo U('News/publishNews');?>" target="right" ><li>发布动态</li></a>              
          </ul>
      <h3>好友管理</h3>
          <ul>
              <a href="<?php echo U('Friend/friendList');?>" target="right" ><li>好友列表</li></a>     
              <a href="<?php echo U('Friend/addFriend');?>" target="right" ><li>添加好友</li></a>            
          </ul>
      <h3>评论管理</h3>
          <ul>
              <a href="<?php echo U('Comment/commentList');?>" target="right" ><li>我的评论</li></a>             
          </ul><?php endif; ?>

       </div>

    </div>

    <div class="main">

          <iframe name="right" id="rightMain" src="<?php echo U('Index/hello');?>" frameborder="no" scrolling="auto" width="100%" height="auto" allowtransparency="true"></iframe>

    </div>

    <div class="bottom">

      <div id="bottom_bg">Copyright ©  </div>

    </div>

   

</body>



</html>