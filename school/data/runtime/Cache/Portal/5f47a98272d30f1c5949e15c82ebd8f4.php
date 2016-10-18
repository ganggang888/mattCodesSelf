<?php if (!defined('THINK_PATH')) exit();?>
<?php if(empty($url)): ?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">
<meta name="author" content="ganggang">
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/Global.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--公司引用的base，公司专门用的-->
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/base.css" />
</head>
<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.2.min.js"></script>
<body>
		<div class="overall">
			<div class="top">			
				<a href="javascript:;" onClick="history.go(-1)"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"/></a>
				<span>考试查询</span>
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
            
                   <form method="post" action="">
			<div class="middle">
				<div style="background-color: #339900;width: 96%;margin:0 auto;height: 280px;margin-top: 6px;"></div>
				  <div class="div" style="height: 200px;">
				   <ul class="ul">
				   		<li>身份证</li>
				   		<li>其他证件:</li>
                        <li>验证码:</li>
				   </ul>
				   <ul class="ul1">
				   		<li><input type="text" name="idcard" id="idcard" class="text"  style="width: 80%;"/></li>
				   		<li><input type="text" name="zjhm" id="zjhm" class="text"  style="width: 80%;"/></li>
                        <li>
                        <a href="javascript:;" onClick="reloadImage()" style="padding-right:20px"><img src="http://www.12333sh.gov.cn/wsbs/zypxjd/jnjd/jdcx/Bmblist.jsp" id="pic" style="float:right; margin-right:30px" /></a><input type="text" name="sj_mima1" class="text"  style="width: 30%; float:left" id="sj_mima1"/></li>
                        
				   </ul>			   
                </div>
                    <p>
				   	<span style="display: block;margin-left:2% ;background:#00A73D;
				   	height: 46px;width:96%;border-radius:10px 10px ;text-align:center;margin-top: 86px;" >
                    <input type="submit" value="立即查询"  style="line-height: 46px; ; font-size: 25px; color:azure; border:0px; background:#00A73D">
				   	</span>
				   </p>
             </div>
             </form>
			<div class="bottom">
<ul>
<li>联系电话</li>
<li><a href="tel:4009982033">400-998-2033</a></li>               	
</ul>
</div>
		</div>
	</body>
</html>
<script>
function reloadImage(){    
	var img = document.getElementById("pic");    
	img.src = "http://www.12333sh.gov.cn/wsbs/zypxjd/jnjd/jdcx/Bmblist.jsp?dt="+Math.random();
	//autoFillRandom();
}

</script>
<script>
function searchs()
{
	var sj_mima1 = $("#sj_mima1").val();
	if (sj_mima1.length != 4) {
		alert('请输入正确的验证码');
		return false;
	}
	var idcard = $("#idcard").val();
	if (idcard.length != 18) {
		alert('请输入正确的身份证号码');
		return false;
	}
	var zjhm = $("#zjhm").val();
	var info = {
		idcard:idcard,
		zjhm:zjhm,
		sj_mima1:sj_mima1,
		is_ajax:1
	}
	$.ajax({
		type:"POST",
		url:"<?php echo U('portal/index/inquiry');?>",
		data:info,
		success: function(data){
			if (data.status == 1) {
				window.location.href='<?php echo U('portal/index/inquiry');?>';
				
			} else {
				alert(data.info);
				return false;
			}
		}
	})
}
</script>
<?php else: ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>考试查询</title>
</head>

<body>
<iframe runat="server" src="<?php echo ($url); ?>" width="750" height="700" frameborder="no" border="0" marginwidth="0" name="content" id="content" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
<h1 style="position:fixed; top:0px; left:350px;font-size:15px;padding-top:5px">点击<a href="<?php echo leuu('portal/index/inquiry');?>">返回</a>重新查询</h1>

</body>
</html><?php endif; ?>