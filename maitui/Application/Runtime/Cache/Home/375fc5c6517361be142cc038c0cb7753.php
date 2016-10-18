<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo ($siteinfo[0]['company']); ?></title>
	<meta name="Keywords" content="<?php echo ($siteinfo[0]['seo_key']); ?>"/>
    <meta name="description" content="<?php echo ($siteinfo[0]['seo_description']); ?>"/>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content=" maximum-scale=100.0, user-scalable=0">
    <!-- Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/Public/Home/ui/joinbootstrap/style/bootstrap.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="/Public/Home/ui/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/Public/Home/ui/joinbootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/Public/Home/style/publicjoin.css">

    




<!-- mattservice.com Baidu tongji analytics -->
<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "//hm.baidu.com/hm.js?0f1613d9e02019a4ea5f6ff5f5926759";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>
    <style>
        .top input{
            margin-top:2%;
            margin-bottom:2%;
           
            font-weight:bold;
            width:83%;
            height:13.5%;
            background-color:#f8b62c;
            border:0px;
        }
         .bottom input{
            margin-top:1%;
            margin-bottom:1%;
           
            font-weight:bold;
            width:83%;
            height:14%;
            background-color:#f8b62c;
            border:0px;
        }


    </style>

</head>
<body>


    <style>
    body{font-family: '微软雅黑';}
</style>

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" style="background: rgba(0, 0, 0, 0.77);">
    <div class="container">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" style="padding-left:0; margin-top: -10px;"> <img src="/Public/Home/images/logo.png" width="90" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
                <ul class="nav navbar-nav" >
                    <li><a href="/zhouji">怀孕周记</a></li>
                    <li><a href="/huli">月嫂服务</a></li>
                    <li><a href="/mamashouce">妈妈手册</a></li>
                    <li><a href="/fuwu">育婴服务</a></li>
                    <li><a href="/discover">萌萌绘本</a></li>
					<li><a href="/about">公司介绍</a></li>
                    <li><a href="/fenxiang">客户分享</a></li>
                    <li><a href="/news">新闻</a></li>
                    <li><a href="/research">小调查</a></li>
                    <li><a href="/join" id="joinmatt">加盟麦忒</a></li>
					<li style="padding-left:30px; line-height:50px; color:rgb(173,211,177); font-weight:bold; font-size:16px;">
						加盟热线:4009982033
					</li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>


<!--当前样式-->
<script>
    $(document).ready(function(){
        $('.navbar-collapse .navbar-nav li a').each(function(){
            if($($(this))[0].href==String(window.location))
                $(this).parent().addClass('active');
        });
    })


   
var i = 0;

function getColor(){
 i++;
 switch(i){ 
     case 1: return "#a7cf38";
     case 2: return "#22b34c";
     case 3: return "#fba71a";
  default:return "white";
 }
}

function colorful(){
 var o =document.getElementById('joinmatt');
 o.style.color = getColor();

 if(i==3)i=0;
 setTimeout('colorful()',1000);
}

colorful();

</script>


    <!--pc端banner:移动端隐藏-->
    <div style="max-width:1316px;margin-left:auto;margin-right:auto; position:relative;text-align:center">
        
        <img src="/Public/Home/images/join/1.jpg" />
        <img src="/Public/Home/images/join/2.jpg" />
        <img src="/Public/Home/images/join/3.jpg" />
        <img src="/Public/Home/images/join/4.jpg" />
        <img src="/Public/Home/images/join/home.jpg" />
        <img src="/Public/Home/images/join/5.jpg" style="margin-top:3%;"/>
        <img src="/Public/Home/images/join/6.jpg" />
        <img src="/Public/Home/images/join/7.jpg" style="margin-top:3%;margin-bottom:2%"/>
        <img src="/Public/Home/images/join/8.jpg" />
        




        <div class="top" style="width:25.5%;height:3.6%; border-radius:10px;position:absolute;top:2.47%;left:1.24%;z-index:9;">
            
            <div style="width:100%;height:100%;margin-top:15%">
                <input type="text" name="add" placeholder="地址"  />
                <input type="text" name="name" placeholder="姓名" />
                <input type="text" name="tel" placeholder="手机" />
                <div style="width:83%;margin-left:auto;margin-right:auto;height:13.5%"><input type="text" name="code" placeholder="验证码" style="width:60%;float:left;height:100%"/>
                    <img width="15%;" style="width:60%;float:left;height:100%" class="left15" alt="验证码" src="<?php echo U('Home/Index/verify_c',array());?>" title="点击刷新"> 
                <!-- <input type="button" name="add" placeholder="" style="width:20%;float:right;height:100%;margin-right:0.5%" title="验证码" /> --></div>
                <input type="button" name="add" title="" style="width:40%;height:13.5%; margin-top:4.1%;background-color:transparent;" />
            </div>

    </div>



          <div class="bottom" style="width:49.2%;height:4.1%; border-radius:10px;position:absolute;bottom:2.58%;left:18.7%;z-index:9;">
            
            <div style="width:100%;height:100%;margin-top:9%">
                <input type="text" name="add" placeholder="地址"  />
                <input type="text" name="name" placeholder="姓名" />
                <input type="text" name="tel" placeholder="手机" />
                <div style="width:83%;margin-left:auto;margin-right:auto;height:14%"><input type="text" name="code" placeholder="验证码" style="width:40%;float:left;height:100%"/><!-- <input type="button" name="add" placeholder="" style="width:15%;height:100%;margin-left:-25%;" title="验证码" /> -->
                <img width="15%;" style="width:15%;height:100%;margin-left:-25%;" class="left15" alt="验证码" src="<?php echo U('Home/Index/verify_c',array());?>" title="点击刷新">  
                </div><br />
                <input type="button" name="add" title="" style="width:25%;height:14%; margin-top:1%;background-color:transparent;" />

            </div>

    </div>
        <a href="http://qr.mattservice.com/app" target="_blank"><img style="position:absolute;bottom:1.35%;left:71%;width:12.3%" src="/Public/Home/images/join/app.png" /></a>
        <img style="position:absolute; bottom:1.35%;left:85.5%;width:12.3%" src="/Public/Home/images/join/wexin.png" />

        <video style="position:absolute;top:12.5%;left:49%;width:50%" controls="controls" src="/Public/Home/images/join/pro.mp4"></video>

    </div>


    
<style>
    /**
    footer
    **/
    .main-footer{border-top:1px solid #eee; background:#000; }
    .main-footer h3{font-size: 18px; padding-bottom: 5px; color: #ccc;}
    .main-footer .row a{margin-right: 10px;display: inline-block;color: #999;}
    .main-footer .row img{width: 120px;display: block;}
    .main-footer .bottom{text-align: center;line-height: 60px;color: #999;font-size: 12px;}
</style>
<footer class="main-footer" style="padding-bottom:30px;">
    <div class="container">
        <div class="bottom" style="line-height:30px!important">www.mattservice.com 沪ICP备09045106号-1 <?php if($shows == 1): ?><br/><a href="javascript:;" id="theMap" style="color:#FFF">麦忒地图</a><?php endif; ?></div>
		
    </div>
</footer>
<div class="bottom" style="color:#fff; line-height:30px; position:fixed; bottom:0; z-index:9999; background:#333; text-align:center; width:100%;filter:alpha(opacity=70);-moz-opacity:0.70; opacity:0.70;">加盟热线：<a href="tel:4009982033" style="color:#fff">4009982033</a> &nbsp; &nbsp;</div>

<script>
$("#theMap").click(function(){

    if ($("#map").css("display") == 'inline-block') {
        $("#map").hide(300);
        $('html,body').animate({ scrollTop: document.body.clientHeight }, 700);
    } else {
        $("#map").show(300);
        $('html,body').animate({ scrollTop: document.body.clientHeight }, 700);
    }
    

})
</script>
    <script>
function theWith()
{
    return $(window).width();
}
    </script>

    

    <script>


        $("img.lazy").lazyload({
           
        });
    </script>

</body>
</html>