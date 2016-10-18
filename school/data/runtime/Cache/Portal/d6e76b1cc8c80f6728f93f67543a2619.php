<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/Global.css" />
		<!--公司引用的base，公司专门用的-->
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/base.css" />
		<base target="_blank">
		<title><?php echo ($post_title); ?> <?php echo ($site_name); ?></title>
		<style type="text/css">
.middle p {
	font-size: 18px;
}
.footer {
	width: 96%;
	margin: 0 auto;
	margin-top: 40px;
}
.footer ul {
	margin-top: 12px;
}
.footer ul li {
	margin-top: 8px;
	color: #8bc53f;
	font-size: 15px;
	font-weight: bold;
	text-align: center;
}
.middle p {
	text-indent: 2em;
	line-height: 25px;
	padding-left: 10px;
}
</style>
		</head>
		<body class="drawer">
        <div class="overall">
          <div class="top"> <a href="javascript:;" onClick="history.go(-1)"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"/></a> <span ><?php echo ($post_title); ?></span>
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
          <div class="middle" style="padding-top:10px"> <?php echo ($post_content); ?> </div>
          <div class="bottom">
<ul>
<li>联系电话</li>
<li><a href="tel:4009982033">400-998-2033</a></li>               	
</ul>
</div>
        </div>
</body>
</html>