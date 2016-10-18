<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/Global.css" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/base.css" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/style.css" />
<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" ></script>
<script language=javascript>
function show_amnt(){
    var s=0,i;
    for (i=0;i<form1.Fruit.length;i++)
        if (form1.Fruit[i].checked) s+=parseFloat(form1.Fruit[i].value);
    form1.amnt.value=s;
}
/*JS获取选择中的值*/
function checkbox()
{
var str=document.getElementsByName("Fruit");
var objarray=str.length;
var chestr="";
for (i=0;i<objarray;i++)
{
if(str[i].checked == true)
{
chestr+=str[i].id+"   ";
}
}
if(chestr == 0)
{
	$("#checkValue").attr("value",chestr);
}
else
{
	$("#checkValue").attr("value",chestr);
}
}
</script>
<!--<script type="text/javascript" src="index.js" ></script>-->

<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?> 选课</title>
</head>
<body>
<div class="overall">
  <div class="top"> <a href="javascript:;" onClick="history.go(-1)"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"/></a> <span>选课</span>
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
    <p > <span style="display: block;margin-left:42% ;background-color:#ABCD04;
				   	height: 38px;width:48%;border-radius:40px 40px ;text-align:center;margin-top: 32px;" > <a href="<?php echo leuu('portal/list/classInfo');?>" style="line-height: 38px; ; font-size: 19px; margin-left:20% ;color: #FFFFFF;">课程介绍<img src="/tpl/simplebootx/Public/images/arrow_right.png" style="width: 6%;margin-top: -5px;margin-left: 14%;"></a> </span> </p>
    <div style="width: 96; margin: auto;height: 540px;">
      <form action="<?php echo leuu('user/center/code');?>" method="post" name="form1">
        <ul id="accordion" class="accordion">
          <?php if(is_array($data)): foreach($data as $key=>$vo): ?><li>
              <div class="link" <?php if($vo['id'] > 20): ?>style="background-color: #ABCD04;"<?php endif; ?>>&nbsp;&nbsp;<?php echo ($vo["name"]); ?></div>
              <ul class="submenu">
                <?php if(is_array($vo["son"])): foreach($vo["son"] as $key=>$v): ?><li><a onclick="checkbox()">
                    <label>
                      <input id="<?php echo ($v["id"]); ?>" name="Fruit" type="checkbox" value="<?php echo ($v["price"]); ?>" onClick="show_amnt();"  />
                      <span style="color: #F7AB00;"  >&nbsp;&nbsp;<?php echo ($v["name"]); ?>&nbsp;&nbsp;&nbsp;<span style="color: #F7AB00;">￥<?php echo ($v["price"]); ?></span></label>
                    </a></li><?php endforeach; endif; ?>
              </ul>
            </li><?php endforeach; endif; ?>
        </ul>
        <!--获取复选框中的东西-->
        
        <input type="hidden" name="checkValue" id="checkValue" value="">
        <p>
        <span style="display: block;margin-left:2% ;background-color:brown;
				   	height: 43px;width:96%;border-radius:10px 10px ;text-align:center;margin-top: 36px;" >
                    
                    <a style="line-height: 43px; ; font-size: 25px; color:azure; margin-left:2%">支付共计:<span style="color: #F7AB00;">￥</span>
          <input type="text" name="amnt" value="0" readonly style="line-height: 30px;width: 30%;color: #F7AB00;margin-top: -8px;
				   			background-color:brown ;
				   			  border-bottom-width: 0px;
	                          border-left-width:0px;
	                          border-right-width:0px;
	                          border-top-width:0px;">
          </a>
          
          <!--<?php if($payment == 1): ?><input type="submit" value="去支付" style="border:0px; background:brown">
           
           <?php else: ?>
           <a href="javascript:;" onClick="wxPay()" style="color:#FFF; text-decoration:none">去支付</a><?php endif; ?>-->
           
          <input type="submit" value="获取优惠码" style="border:0px; background:brown;">
          </span> </p>
      </form>
      <p  style="font-size: 14px; color: #00A73D;margin-left: 42%;margin-top: 15px;">联系电话:</p>
      <p style="font-size: 20px; color: #00A73D;margin-left:33%;"><a >400-9982-033</a></p>
    </div>
  </div>
</div>

</body>
</html>
<script>
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
</script>
<script>
function wxPay()
{
	var info = $("#checkValue").val();
	if (info  == '') {
		alert('请选择课程');
		return false;
	}
	var datas = {
		info:info,
		is_ajax:1
	}
	$.ajax({
		type:"POST",
		url:"<?php echo U('user/center/saveInfo');?>",
		data:datas,
		success: function(data){
			window.location.href='<?php echo U('user/center/wxpay');?>';
		}
	})
	return false;
}
</script>