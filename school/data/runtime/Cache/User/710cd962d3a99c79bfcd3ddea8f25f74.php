<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta content=
    "width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
    name="viewport">
    <link href="/tpl/simplebootx/Public/css/Global.css" rel="stylesheet">
    <link href="/tpl/simplebootx/Public/css/base.css" rel="stylesheet">
    <link rel="stylesheet" href="/tpl/simplebootx/Public/css/My Coup.css" />
    <script src="/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" type="text/javascript"></script>

    <title>我的优惠码</title>
    </head>
    
    <body>
    <div class="overall">
      <div class="top"> <a href="" onclick="history.go(-1)"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style=
            "height: 20px; margin-top: 14px;margin-left:8%;"></a> <span class=
            "MySapn">我的优惠码</span>
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
             <!--<span style=
            "margin-left: 40%;margin-top: -3px;"><a href="#" style=
            "color: #F0FFFF;font-size: 18px;" onclick="one()">编辑</a></span>--> 
      </div>
      <div class="middle" style="font-size: 19px;"> 
        <!--前面的页面-->
        
        <div id="head1">
        <?php $i = 1; ?>
        <?php if(is_array($result)): foreach($result as $key=>$vo): $a = $i % 1; $b = $i % 2; $c = $i % 3; ?>
        <div class="My" id="My">
        <?php if($c == 0): ?><img src="/tpl/simplebootx/Public/images/3.png" style="width: 100%;">
        <?php elseif($b == 0): ?>
        <img src="/tpl/simplebootx/Public/images/2.png" style="width: 100%;">
        <?php else: ?>
        <img src="/tpl/simplebootx/Public/images/1.png" style="width: 100%;"><?php endif; ?>
        
            <p class="Myp1"><?php $info = orderInfo($vo['info']); echo ($info[0]['name']); ?>优惠码</p>
            <p class="Myp"><?php echo ($vo["code"]); ?>
            <?php if($status == 1): ?>（已兑换）
            <?php else: ?>
            （未兑换）<?php endif; ?>
            </p>
            <section title=".roundedOne" style="display: block;margin-top: -56px;margin-left: 86%;"> 
              <!-- .roundedOne -->
              <p class="roundedOne" style="background:none">
                <a href="<?php echo U('user/center/del',array('id'=>$vo[id]));?>" style="color:#FFF">删除</a>
              </p>
            </section>
          </div>
          <?php $i++; endforeach; endif; ?>
          
          
          
          <!--<p class="pone"> <a>删除 DELECT</a>
          <p>--> 
        </div>
        <!--后面的页面--> 
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