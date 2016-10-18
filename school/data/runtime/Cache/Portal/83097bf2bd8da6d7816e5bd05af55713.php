<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content=
                  "width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
          name="viewport">
    <link href="/tpl/simplebootx/Public/css/Global.css" rel="stylesheet">
    <link href="/tpl/simplebootx/Public/css/base.css" rel="stylesheet">
    <link href="/tpl/simplebootx/Public/css/course description.css" rel="stylesheet">
    <script src="/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/index1.js" ></script>
    <title>证书介绍</title>
</head>

<body>
<div class="overall">
<div class="top">
    <a href="javascript:history.back();"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style=
            "height: 20px; margin-top: 14px;margin-left: 8%;"></a> <span style=
                                                                                 "margin-left: -3%;">证书介绍</span>
                                                                                 <!--开始-->

<?php $allNav = theNav(); ?>
<a onclick="tor()" id="tor">
<div class="drawer-toggle drawer-hamberger"> <span></span></div>
</a> <a onclick="one()"><span class="indexspan" id="one"></span></a>
<div class="indexUL" id="indexUL">
  <ul>
  <?php if(is_array($allNav)): foreach($allNav as $key=>$vo): if ($vo['href'] == 'home') { $url = '/'; } else { $href = unserialize($vo[href]); if ($href) { $url = "/".$href['action']."?id=".$href['param']['id']; } else { $url = $vo['href']; } } ?>
  <a href="<?php echo ($url); ?>" style="color:#FFF">
    <li> <?php echo ($vo["label"]); ?> </li>
    </a><?php endforeach; endif; ?>
  </ul>
</div>
<!--结束--> 

<script>
             function one(){/*这是那二个XX*ONE是XXtorSHIｎａｇｅ*/
                 document.getElementById("indexUL").style.display='none';
                 document.getElementById("one").style.display='none';
                 document.getElementById("tor").style.display='block';
                 }
    	         function tor(){
                 document.getElementById("indexUL").style.display='block';
                 document.getElementById("tor").style.display='none';
                 document.getElementById("one").style.display='block';
                 }
             </script>
</div>

<div class="middle">
<div style="width: 96%; margin: auto;height: 540px;">
<ul class="accordion" id="accordion">
    <?php if(is_array($gov)): foreach($gov as $key=>$vo): ?><li>
        <div class="link" style="margin-top: 50px;">
            <img src="/tpl/simplebootx/Public/images/laodonju.png" style="margin-left:0">
            <?php echo ($vo["title"]); ?>
        </div>

        <ul class="submenu" style="padding: 10px">
            <?php echo ($vo["introduce"]); ?>
            <li style="margin-top: 70px;"></li>
        </ul>
    </li><?php endforeach; endif; ?>
    <div  style="margin-top: 80px;"></div>
    <?php if(is_array($matt)): foreach($matt as $key=>$vo): ?><li>
            
			<div class="link">
                        	<img src="/tpl/simplebootx/Public/images/mattzhengshu.png" style="margin-left:0">
                        		<?php echo ($vo["title"]); ?>
                        </div>
            <ul class="submenu" style="padding: 10px">
                <?php echo ($vo["introduce"]); ?>
                <li style="margin-top: 70px;"></li>
            </ul>
        </li><?php endforeach; endif; ?>
</ul><!--获取复选框中的东西-->

<div id="checkValue" style="display: none;"></div>

<p><span style=
                 "display: block;margin-left:2% ;background-color:#cc4747; height: 43px;width:96%;border-radius:10px 10px ;text-align:center;margin-top: 36px;">
                <a href="<?php echo leuu('user/center/checkClass');?>" style=
                           "line-height: 43px; ; font-size: 22px; color:azure;">马上报名</a></span></p>

<div class="bottom">
<ul>
<li>联系电话</li>
<li><a href="tel:4009982033">400-998-2033</a></li>               	
</ul>
</div>
</div>

</div>

</div>
<style>
.submenu p{ line-height:25px; padding:10px;}
</style>
</body>
</html>