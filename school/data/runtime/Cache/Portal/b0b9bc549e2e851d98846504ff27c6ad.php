<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="/school/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" ></script>
<link rel="stylesheet" href="/school/tpl/simplebootx/Public/css/Global.css" />
<link rel="stylesheet" href="/school/tpl/simplebootx/Public/css/base.css" />
<link rel="stylesheet" href="/school/tpl/simplebootx/Public/css/message board.css" />
<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?> 留言板</title>
</head>
<body>
<div class="overall">
  <div class="top"> <a href="javascript:;" onClick="history.go(-1)"><img src="/school/tpl/simplebootx/Public/images/arrow_left.png"/></a> <span>留言板</span>
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
    <div class="messageimg"> <a><img src="/school/tpl/simplebootx/Public/images/message.png"></a> </div>
    <div class="message" style="height: 430px;">
      <ul class=" messageul">
        <li >姓名 :</li>
        <li >年龄 :</li>
        <li>手机号 :</li>
        <li>联系地址 :</li>
        <li>留言 :</li>
      </ul>
      <ul class="messageul1">
        <li>
          <input type="text" name="text" id="name" class="text"  style="width: 90%;"/>
        </li>
        <li >
          <input type="text" name="phone" id="age" class="text"  style="width: 90%;"/>
        </li>
        <li>
          <input type="text" name="phone" id="phone" class="text"  style="width: 90%;"/>
        </li>
        <li>
          <input type="text" name="text" id="address" class="text"  style="width: 90%;"/>
        </li>
        <li>
          <textarea  cols="20" rows="5" id="content">

</textarea>
        </li>
      </ul>
    </div>
    <p> <span style="display: block;margin-left:2% ;background:#8bc53f;
				   	height: 46px;width:96%;border-radius:10px 10px ;text-align:center;margin-top: 36px;" onClick="sendMessage()" > <a style="line-height: 46px; ; font-size: 25px; color:azure;">提交</a> </span> </p>
            <div class="bottom">
<ul>
<li>联系电话</li>
<li><a href="tel:4009982033">400-998-2033</a></li>               	
</ul>
</div>
  </div>
</div>
</body>
<script>
function sendMessage()
{
	var name = $("#name").val();
	var age = $("#age").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var content = $("#content").val();
	var data = {
		name:name,
		age:age,
		phone:phone,
		address:address,
		content:content,
		is_ajax:1
	}
	$.ajax({
		type:"POST",
		url:"",
		data:data,
		success: function(data){
			if (data.status == 0) {
				alert(data.info);
				return false;
			} else {
				alert('恭喜留言成功,我们会尽快联系您的！');
				window.location.href=data.referer;
			}
		}
	})
}
</script>
</html>