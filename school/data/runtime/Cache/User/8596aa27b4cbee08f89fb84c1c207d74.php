<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<base target="_blank">
<title><?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">
<meta name="author" content="ganggang">
<link rel="stylesheet" href="/school/tpl/simplebootx/Public/css/Global.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--公司引用的base，公司专门用的-->
<link rel="stylesheet" href="/school/tpl/simplebootx/Public/css/base.css" />
</head>
<script type="text/javascript" src="/school/tpl/simplebootx/Public/js/jquery-1.8.2.min.js"></script>
<body>
<div class="overall">
  <div class="top"> <a href="javascript:;" onClick="history.go(-1)"><img src="/school/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"/></a> <span>登录</span>
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
    <div style="background-color: #339900;width: 96%;margin:0 auto;height: 280px;margin-top: 6px;"></div>
    <div class="div" style="height: 200px;">
      <ul class="ul">
        <li>用户名</li>
        <li>密码:</li>
      </ul>
      <ul class="ul1">
        <li>
          <input type="phone" name="username" id="username" class="text"  style="width: 80%;"/>
        </li>
        <li>
          <input type="password" name="password" id="password" class="text"  style="width: 80%;"/>
        </li>
      </ul>
    </div>
    <p> <span style="display: block;margin-left:2% ;background:#00A73D;
				   	height: 46px;width:96%;border-radius:10px 10px ;text-align:center;margin-top: 36px; color:#FFF; line-height:46px" onClick="dologin()" >立即登录</span> </p>
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
<script>
function dologin()
{
	var username = $("#username").val();
	var password = $("#password").val();
	if (username == '') {
		alert('用户名不能为空');
		return false;
	}
	if (username.length != 11) {
		alert('请填入正确的手机号');
		return false;
	}
	if (username.length < 6) {
		alert('密码最少六位数');
		return false;
	}
	
	var infos ={
		username:username,
		password:password,
		is_ajax:1
	}
	$.ajax({
		type:"POST",
		url:"<?php echo U('user/login/dologin');?>",
		data:infos,
		success: function(data){
			if (data.status == 1) {
				window.location.href='<?php echo U('user/center/index');?>';
				
			} else {
				alert(data.info);
				return false;
			}
		}
	})

}
</script>