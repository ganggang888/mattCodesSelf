<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"><!--手机端必须要加的代码，非常重要！！！-->
    <meta content=
    "width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
    name="viewport">

    <title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
    <link href="/school/tpl/simplebootx/Public/css/index.css" rel="stylesheet"><!--公司引用的base，公司专门用的-->
    <link href="/school/tpl/simplebootx/Public/css/base.css" rel="stylesheet"><!--描述：轮播的样式和js-->
    	
    	<!--另一个轮播-->
    	<script type="text/javascript" src="/school/tpl/simplebootx/Public/js/swipe.js" ></script>

<script type="text/javascript" src="/school/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" ></script>
    
</head>

<body>
    <div class="overall">
        <div class="above">
           <a><img src="/school/tpl/simplebootx/Public/images/mattt.png"></a>
        </div>
        <div class="dengl">
        <?php if(!empty($_SESSION['user']['id'])): ?><a href="<?php echo leuu('user/center/index');?>" style="margin-left: 40%;">用户中心</a>
        <?php else: ?>
        <a href="<?php echo leuu('user/login/index');?>" style="margin-left: 16%;">登录</a>
        	<a href="<?php echo leuu('user/register/index');?>">注册</a><?php endif; ?>
        	
        </div>
        <!--中间-->
         <?php $home_slides=sp_getslide("index"); ?>
        <div class="middle">
            <!--图片轮播一大块--><!--效果html开始-->
<div class="addWrap" >
  <div class="swipe" id="mySwipe">
    <div class="swipe-wrap">
     
      <?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><div><a href="<?php echo ($vo["slide_url"]); ?>"><img class="img-responsive" src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>"/></a></div><?php endforeach; endif; ?>
    </div>
  </div>
  <ul id="position">
  <?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li class="<?php if($key == 0): ?>cur<?php endif; ?>"></li><?php endforeach; endif; ?>
  </ul>
</div>
<script src="/school/tpl/simplebootx/Public/js/swipe.js"></script> 
<script type="text/javascript">
var bullets = document.getElementById('position').getElementsByTagName('li');
var banner = Swipe(document.getElementById('mySwipe'), {
	auto: 2000,
	continuous: true,
	disableScroll:false,
	callback: function(pos) {
		var i = bullets.length;
		while (i--) {
		  bullets[i].className = ' ';
		}
		bullets[pos].className = 'cur';
	}
});
</script>
<!--效果结束-->
            <div class="select">
                <p><img src="/school/tpl/simplebootx/Public/images/Choose%20Us.png" style=
                "width: 80%;margin-left: 10%;margin-top:15px ;"></p>
            </div>

              <div class="md_03">
            	<a href="<?php echo U('portal/list/expert_info');?>"><img src="/school/tpl/simplebootx/Public/images/team of experts.png"></a>
            </div>

            <div class="md_03">
            	<img src="/school/tpl/simplebootx/Public/images/4.png">
            </div>
  <div class="md_03">
            	<a href="<?php echo U('portal/page/index',array('id'=>5));?>"><img src="/school/tpl/simplebootx/Public/images/Professional tutorial.png"></a>
            </div>
          

            <div class="md_05">
                 <div class="Student">
                  	 <a href="<?php echo leuu('portal/list/classInfo');?>">   
                       <dl>
                       	<dt><img src="/school/tpl/simplebootx/Public/images/6.png"></dt>
                       	<dd>课程介绍</dd>
                       </dl>
                     </a>    
                   	 <a href="<?php echo leuu('portal/index/inquiry');?>">   
                       <dl style="background-color:#00a73c;">
                       	<dt><img src="/school/tpl/simplebootx/Public/images/5.png"></dt>
                       	<dd>考试查询</dd>
                       </dl>
                     </a>  
                     	 <a href="<?php echo U('portal/list/expert_info');?>">   
                       <dl style="background-color:#8bc53f;">
                       	<dt><img src="/school/tpl/simplebootx/Public/images/9.png"></dt>
                       	<dd>专家团队</dd>
                       </dl>
                     </a> 
                     	 <a href="<?php echo leuu('portal/list/index',array('id'=>1));?>">   
                       <dl>
                       	<dt><img src="/school/tpl/simplebootx/Public/images/8.png"></dt>
                       	<dd>最新活动</dd>
                       </dl>
                     </a> 
                     	 <a href="<?php echo U('portal/list/certificate_info');?>">   
                       <dl style="background-color:#00a73c;">
                       	<dt><img src="/school/tpl/simplebootx/Public/images/10.png" style="width: 38%;"></dt>
                       	<dd>证书介绍</dd>
                       </dl>
                     </a> 
                     	 <a href="<?php echo U('portal/page/index',array('id'=>4));?>">   
                       <dl style="background-color:#8bc53f;">
                       	<dt><img src="/school/tpl/simplebootx/Public/images/7.png" style="width: 57%;"></dt>
                       	<dd>关于我们</dd>
                       </dl>
                     </a> 
                 </div>
            </div>
        </div>

        <div class="md_04">
            <a href="<?php echo U('Portal/List/students_info');?>">
            <p style="font-size: 1.5em;color: #FFFFFF;height: 95px;text-align: center;padding-top: 7px;letter-spacing: 2px;">本期优秀学员介绍</p></a>
        </div>
        
      <a href="<?php echo leuu('portal/page/message');?>">   
      <div class="md_06">
                 留言板
        </div>
        <br/>
        
      </a>
      <p><input type="text" id="chaxun" style="display: block;margin: 0px 0px 0px 2%; width: 80%;float: left; 
        	BACKGROUND-COLOR: transparent;
        	 border: 2px solid #00A67E; 
        	border-radius:40px 40px ; height: 40px;"><a href="javascript:;" style="margin-left: 2%;" onClick="searchs()">
        		<img src="/school/tpl/simplebootx/Public/images/Shousuo.png" >
        			
        		</a>
        </p>
        <script>
        function searchs()
		{
			var chaxun = $("#chaxun").val();
			if (chaxun == '') {
				alert('请输入信息');
				return false;
			}
			window.location.href='/index.php?g=portal&m=list&a=chaxun&name='+chaxun;
		}
        </script>
        <div class="footer">
            <ul>
                <li>联系电话</br>
                
                
                <a href="tel:4009982033" style="color:#8bc53f">400-998-2033</a></li>

                <li>学校地址</br>
                	东体育会路上海外国语大学贤达学院行政楼14F</li>

                <li style="margin-top: 45px;margin-left: 67%;font-size: 14px;">麦麦育儿机器人</li>
            </ul>
        </div>
    </div>
</body>
</html>