<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content=
    "width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
    name="viewport">
    <link href="/tpl/simplebootx/Public/css/Global.css" rel="stylesheet">
    <link href="/tpl/simplebootx/Public/css/base.css" rel="stylesheet">
    	<link rel="stylesheet" href="/tpl/simplebootx/Public/css/activity.css" />
    	
    <script src="/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <base target="_blank">
   <title><?php echo ($name); ?> <?php echo ($seo_title); ?> <?php echo ($site_name); ?></title>
</head>

<body class="drawer">
    <div class="overall">
        <div class="top">
            <a href="javascript:;" onClick="history.go(-1)"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"></a> <span >活动</span>
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
            <div style="width: 96%; margin: auto;">
            <?php $lists = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",100); ?>
                <?php if(is_array($lists['posts'])): $i = 0; $__LIST__ = $lists['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="activity" id="acti" style="color:#FFF"><?php echo ($vo["post_title"]); ?>
               <a class="down"><img src="/tpl/simplebootx/Public/images/arrow_down.png"></a>
               </div>
               <div id="huodong" class="display" style="display: none;">
               <span ><?php echo ($vo["post_title"]); ?></span>
               	<?php echo ($vo["post_content"]); ?>
                <a class="attend" style="color:#FFF" href="<?php echo U('user/center/checkClass');?>">参加</a>
                <a class="up">
                	<img src="/tpl/simplebootx/Public/images/arrow_up.png" 
                		style="height: 13px; margin-top:-14px;margin-left: 85%;width: 6%;">
                </a>
               </div><?php endforeach; endif; else: echo "" ;endif; ?>
               
                
<script>
$(function(){
  $(".down").click(function(){
	$(this).parent().hide();
  	$(this).parent().next().show();
  });
  $(".up").click(function(){
	$(this).parent().hide();
  	$(this).parent().prev().show();
  })
})
</script>
                      
                
               
               
                      
                
               
             
            </div>
            </div>
              <div class="bottom">
<ul>
<li>联系电话</li>
<li><a href="tel:4009982033">400-998-2033</a></li>               	
</ul>
</div>
            
            
        </div>
        
    </div>
<style>
#huodong p{ text-align:left; text-indent:2ems}
</style>
</body>
</html>