<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/Global.css" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/base.css" />
<base target="_blank">
<title>用户中心</title>
</head>
<body class="drawer">
<div class="overall">
  <div class="top"> <a href="javascript:;" onClick="history.go(-1)"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"/></a> <span style="margin-left:-4.5%;">用户中心</span>
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
    <p> <span style="display: block;margin-left:2% ;background:#F7AB00;
				   	height: 45px;width:96%;border-radius:5px 5px ;text-align:center;margin-top: 8px; line-height:45px; color:#FFF" > <?php echo ($user["user_login"]); ?><a style="line-height: 45px; ; font-size: 22px; color:azure;"></a> </span> </p>
    <style type="text/css">
				   	 .Yh a{
				   	 	float: left;
				   	 	display: block;margin-left:2.2% ;background:#F7AB00;
				     	height: 70px;width:30.5%;border-radius:5px 5px ;margin-top: 8px;
				   	 }
				   	 .Yh span{
				   	 	line-height: 70px;
				   	    margin-left: 31%;
				   	 }
				   </style>
    <div class="Yh" style="width: 100%;height: 165px;margin: 0 auto;">
      <p><a href="<?php echo leuu('user/center/checkClass');?>" style="background: #ABCD04;"><span>选课</span></a><a href="<?php echo leuu('user/center/codeInfo');?>" style="background: #00A73D;"><span>优惠码</span></a><a href="<?php echo leuu('portal/list/classInfo');?>"><span>课程</span></a></p>
      <p><a href="<?php echo leuu('portal/index/inquiry');?>" style="background: #00A73D;"><span>考试</span></a><a href="<?php echo leuu('portal/list/certificate_info');?>"><span>证书</span></a><a href="<?php echo U('portal/list/index',array('id'=>1));?>" style="background: #ABCD04;"><span>活动</span></a></p>
    </div>
    <div style="width: 96%;height: 240px;background:#ABCD04 ;margin: 0 auto;"> bodyer </div>
    <p> <span style="display: block;margin-left:2% ;background-color:brown;
				   	height: 43px;width:96%;border-radius:10px 10px ;text-align:center;margin-top: 13px;" > <a href="<?php echo leuu('user/center/logout');?>" style="line-height: 43px; ; font-size: 25px; color:azure; text-decoration:none">退出</a> </span> </p>
  </div>
  <div class="bottom">
<ul>
<li>联系电话</li>
<li><a href="tel:4009982033">400-998-2033</a></li>               	
</ul>
</div>
</div>
</body>
</html>
<style>
.Yh a {
	color: #000
}
</style>