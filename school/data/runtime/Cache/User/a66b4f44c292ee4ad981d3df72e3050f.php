<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">
<meta name="author" content="ganggang">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/register.css" />
<!--公司引用的base，公司专门用的-->
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/base.css" />
</head>

<body>
		<div class="overall">
			<div class="top">			
				<a href="javascript:;" onClick="history.go(-1)"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"/></a>
				<span>注册成功</span>
			</div>
			<div class="middle">
				   <p style="height: 110px;margin-left: 20%;margin-top: 30px;">
				   	<img src="/tpl/simplebootx/Public/images/Cha.png" style="width: 75%;">
				   </p>			   
				    <p style="margin-left: 33%;margin-top: 90px;">
				     <img src="/tpl/simplebootx/Public/images/success_logo.png"style="width: 48%;"/ >
				   </p>	
				    <p>
				   	<span style="display: block;margin-left:29% ;background:#00A73D;
				   	height: 45px;width: 40%;border-radius:10px 10px ;
				   	text-align:center;margin-top: 52px;" >
				   		<a href="<?php echo U('User/center/index');?>" style="line-height: 45px; ; font-size: 19px; color:azure;letter-spacing: -1px;">进入会员中心</a>
				   	</span>
				   </p>
			</div>
			<div class="bottom">
				<p style="margin-top: 20px;"><span style="color:#27B410;font-size: 14px;margin-left: 6%;">联系电话</span></p>
				<p><a style="color:#27B410;font-size: 22px;margin-left: 6%;margin-top: 95px;">400-9982-033</a></p>
			</div>
		</div>
	</body>
</html>