<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
	<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
	<meta name="description" content="<?php echo ($site_seo_description); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
   <link rel="stylesheet" href="/new/tpl/simplebootx/Public/css/pintuer.css">
    <script src="/new/tpl/simplebootx/Public/js/jquery.js"></script>
    <script src="/new/tpl/simplebootx/Public/js/pintuer.js"></script>
    <script src="/new/tpl/simplebootx/Public/js/respond.js"></script>
    <link type="image/x-icon" href="http://www.pintuer.com/favicon.ico" rel="shortcut icon" />
    <link rel="stylesheet" href="/new/tpl/simplebootx/Public/css/styles.css" />
    <link href="http://www.pintuer.com/favicon.ico" rel="bookmark icon" />
    <link rel="stylesheet" href="/new/tpl/simplebootx/Public/css/index.css" />

<style>
		.demo-nav.fixed.fixed-top{z-index:8;background:#fff;width:100%;padding:0;border-bottom:solid 3px #0a8;-webkit-box-shadow:0 3px 6px rgba(0, 0, 0, .175);box-shadow:0 3px 6px rgba(0, 0, 0, .175);}
	</style>
    </head>

    <body>

<!--测试响应式结束-->
<div class="demo-nav "> 
      <!--测试响应式-->
      <div class="layout doc-header fixed line "  >
    <div class="contatop doc-naver">
          <div class="xm3 xb2">
        <button class="button icon-navicon float-right" data-target="#header-demo"></button>
        <a href="index.html" target="_blank" > <img src="/new/tpl/simplebootx/Public/images/logo.png" alt="matt官网"  style="margin-top: 12px;margin-left: 60px;"/> </a> </div>
          <div class=" xl12 xs9 xm9 xb10 nav-navicon "id="header-demo">
        <div class="line float-right padding-small  ">
              <ul class="nav nav-inline  ">
            <li> <a href="Datingrobot.html"><img src="/new/tpl/simplebootx/Public/images/logoone.png" 
			border="0" onMouseOver="this.src='/new/tpl/simplebootx/Public/images/logo1.png'" 
			onMouseOut="this.src='/new/tpl/simplebootx/Public/images/logoone.png'"  width="100%" /> </a> </li>
            <li> <a href="Mbindex.html"><img src="/new/tpl/simplebootx/Public/images/mtoy.png" 
			border="0" onMouseOver="this.src='/new/tpl/simplebootx/Public/images/mtoy_c.png'" 
			onMouseOut="this.src='/new/tpl/simplebootx/Public/images/mtoy.png'" width="100%"/> </a> </li>
            <li> <a href="Babyintimate.html"><img src="/new/tpl/simplebootx/Public/images/mprogram.png" 
			border="0" onMouseOver="this.src='/new/tpl/simplebootx/Public/images/mprogram_c.png'" 
			onMouseOut="this.src='/new/tpl/simplebootx/Public/images/mprogram.png'" width="100%"/> </a> </li>
            <li> <a href="Mbaoparadise.html"><img src="/new/tpl/simplebootx/Public/images/m.png" 
			border="0" onMouseOver="this.src='/new/tpl/simplebootx/Public/images/mhome_c.png'" 
			onMouseOut="this.src='/new/tpl/simplebootx/Public/images/m.png'"  width="100%"/> </a></li>
            <li > <a href="Mymattfive.html"> <img src="/new/tpl/simplebootx/Public/images/mfuture.png" 
			border="0" onMouseOver="this.src='/new/tpl/simplebootx/Public/images/mfuture_c.png'" 
			onMouseOut="this.src='/new/tpl/simplebootx/Public/images/mfuture.png'"  width="100%"/> </a> </li>
          </ul>
            </div>
      </div>
        </div>
  </div>
      
      <!--测试响应式结束--> 
      
    </div>
<!--导航结束-->

<div class="banner bg-main   ">
      <ul class="carousel">
    <li class="item" style="background:#FFFFFF url(/new/tpl/simplebootx/Public/images/banner1.1.jpg) center no-repeat;height:480px;"></li>
    <a href="Datingrobot.html">
        <li class="item" style="background:#FFFFFF url(/new/tpl/simplebootx/Public/images/banner2.1.png)  center no-repeat;height:480px;"> </li>
        </a> <a href="Mbindex.html">
        <li class="item" style="background:#FFFFFF url(/new/tpl/simplebootx/Public/images/banner3.3.png) center no-repeat;height:480px;"> </li>
        </a>
  </ul>
    </div>

<div class="contatop"> 
  <!--中间导航结束-->
  <div class=" text-large text-left line"> <a class="bg-one  button-big " href="Mymattseven.html"> 我们</a> <a > |</a> <a class=" bg-one  button-big " href="Mattxinwen.html">新闻 </a> <a > |</a> <a class="bg-one  button-big " href="Mymatttwo.html" > 大事件</a> <a  > |</a> <a class=" bg-one button-big " href="Mymattmeng.html" > 人物</a> <a > |</a> <a class="bg-one  button-big " href="Mymattfive.html"> 媒体专区</a> <a  > |</a> <a class=" bg-one  button-big " href="Mymattsix.html" > 分享</a> </div>
  <!--中间导航开始--> 
</div>
<div class="banner contatop"> 
  <script type="text/javascript">
    $(function(){
        $(".clearfix").hover(
            function(){
                var that=this;
                item1Timer=setTimeout(function(){
                    $(that).find("span").animate({"top":-15,"height":116},300,function(){
                    });
                },100);
            },
            function(){
                var that=this;
                clearTimeout(item1Timer);

                $(that).find("span").animate({"top":140,"height":116},300);
            }
        )
});
</script> 
  
  <!--测试结束-->
  
  <div class="line-middle">
    <div class="xl6 xs4 xm2  margin-bottom ">
      <div class="media clearfix  ">
        <div> <a href="MyMattZj.html"><img src="/new/tpl/simplebootx/Public/images/index1.png" width="100%"> <span class="conss">
          <h4>我们的专家</h4>
          </span> </a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom ">
      <div class="media clearfix ">
        <div> <a href="Datingrobot.html"><img src="/new/tpl/simplebootx/Public/images/index2.png" width="100%"> <span class="conss">
          <h4>Mapp</h4>
          </span> </a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix ">
        <div> <a href="HyZmy.html"><img src="/new/tpl/simplebootx/Public/images/index3.png" width="100%"> <span class="conss">
          <h4>麦麦育儿机器人上市</h4>
          </span> </a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix ">
        <div> <a href="MymattXz.html"><img src="/new/tpl/simplebootx/Public/images/index4.png" width="100%"> <span class="conss">
          <h4>朱家雄教授</h4>
          </span> </a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix ">
        <div> <a href="Mbindex.html"><img src="/new/tpl/simplebootx/Public/images/index5.png" width="100%"><span class="conss">
          <h4>Mtoy</h4>
          </span></a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix">
        <div> <a href="Mymattsix.html"><img src="/new/tpl/simplebootx/Public/images/index6.png" width="100%"></a> <span class="conss">
          <h4>妈妈的分享</h4>
          </span> </div>
      </div>
    </div>
  </div>
</div>

<div class="contatop  "> <br/>
      <div class="  text-right line " style="margin-top: 10px;"> <a class="text-little"> 友情链接</a> <a class="text-little"> 联系我们</a> <a class="text-little"> 招贤纳士</a> <a class="text-little"> TEl</a> <a class="text-little" > 400-998-2033</a> <a class="text-little" > FAX 021-51291998</a> </div>
      <a class="float-right " style="font-size: 10px; color:  #736868;;">Copyright 2015 麦忒教育科技有限公司版权所有</a> <br/>
    </div>
</div>
<!--尾巴结束--> 

<br />
<br/>
<div class="doc-backtop win-backtop icon-arrow-circle-up"></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</body>
</html>