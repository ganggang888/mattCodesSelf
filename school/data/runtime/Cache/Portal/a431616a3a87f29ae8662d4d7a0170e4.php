<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/Global.css" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/base.css" />
<link rel="stylesheet" href="/tpl/simplebootx/Public/css/course description.css" />
<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" ></script>
<script type="text/javascript" src="/tpl/simplebootx/Public/js/index.js" ></script>
<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?> 选课</title>
</head>
<body class="drawer">
<div class="overall">
  <div class="top"> <a href="javascript:;" onclick="history.go(-1)"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"/></a> <span style="margin-left: -3%;">课程介绍</span>
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
    <ul id="accordion" class="accordion">
      <?php if(is_array($result)): foreach($result as $key=>$vo): ?><li> <div class="link" 
          <?php if($vo['id'] > 20): ?>style="background-color: #ABCD04;"<?php endif; ?>
          >
          <?php if($vo['id'] > 20): ?><img src="/tpl/simplebootx/Public/images/mattzhengshu.png" style="margin-left: 0px">
            <?php else: ?>
            <img src="/tpl/simplebootx/Public/images/laodonju.png" style="margin-left: 0px"><?php endif; ?>
          <?php echo ($vo["name"]); ?>
        </div>
        <ul class="submenu" style="padding-top:22px">
          <?php echo ($vo["content"]); ?>
        </ul>
        </li><?php endforeach; endif; ?>
    </ul>
    </li>
    </ul>
    <!--获取复选框中的东西-->
    <div style="display: none;" id="checkValue"> </div>
    <p> <span style="display: block;margin-left:2% ;background-color:brown;
				   	height: 43px;width:96%;border-radius:10px 10px ;text-align:center;margin-top: 36px;" > <a href="<?php echo leuu('user/center/checkClass');?>" style="line-height: 43px; ; font-size: 22px; color:azure; text-decoration:none">马上报名</a> </span> </p>
    <p  style="font-size: 16px; color: #00A73D;margin-left: 42%;margin-top: 15px;">联系电话:</span></p>
    <p style="font-size: 22px; color: #00A73D;margin-left:33%;"><a >400-9982-033</a></p>
  </div>
</div>
</div>
</body>
</html>
<style>
.submenu p {
	padding: 0px 22px 22px 22px!important;
}
</style>
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