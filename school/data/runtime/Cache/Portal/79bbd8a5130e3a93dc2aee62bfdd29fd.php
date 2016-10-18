<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="/tpl/simplebootx/Public/css/Global.css" />
    <link rel="stylesheet" href="/tpl/simplebootx/Public/css/base.css" />
    <link rel="stylesheet" href="/tpl/simplebootx/Public/css/Team intro.css" />
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" ></script>

    <script type="text/javascript" src="/tpl/simplebootx/Public/js/list_index.js" ></script>
    <script type="text/javascript">
        $(function(){
            $(".down").click(function(){
                $(this).css("display","none");
                $(this).parent().parent().next().show();
            })
            $(".up").click(function(){
                $(this).parent().parent().hide();
                $(this).parent().parent().prev().show();
                $(".down").show();
            })
        })

    </script>
    <title>团队介绍</title>
    <style type="text/css">
        .link dl dt{
            float:left;
            margin-right: 2%;
        }
    </style>

</head>
<body>
<div class="overall">
    <div class="top">
        <a href="javascript:history.back();"><img src="/tpl/simplebootx/Public/images/arrow_left.png" style="height: 20px; margin-top: 14px;margin-left: 8%;"/></a>
        <span>专家团队</span>
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
        <div style="width: 100%; margin: auto;">
            <ul id="accordion" class="accordion">
                <?php if(is_array($experts)): foreach($experts as $key=>$vo): $expertType = $types[$vo['expert_type']]; ?>
                <li>
                    <div class="link">
                        <a>
                            <dl>
                                <dt style="width: 160px;height: 210px"><img src="<?php echo ($vo["photo"]); ?>"  style="margin: 0px 0%;width: 160px;height: 210px"> </dt>
                                <dd style="font-size: 34px;"><?php echo ($vo["name"]); ?></dd>
                                <dd style="font-size: 12px;margin-top: 20px;"><?php echo ($expertType); ?></dd>
                                <dd style="font-size: 22px;margin-top: 20px;"><?php echo ($vo["position"]); ?></dd>

                                <dd style="font-size: 22px;margin-top: 40px;margin-left: 74%;">简介
                                    <img src="/tpl/simplebootx/Public/images/arrow_down.png" id="V" class = "down" style="width: 18%;  position: relative;left: 90%; display: block;top:10px">
                                </dd>
                            </dl>
                        </a>
                    </div>

                    <ul class="submenu" id="su" class="su">
                        <li style="margin-left: 5px;margin-right: 5px"><?php echo ($vo["introduce"]); ?></li>
                        <li style="height: 170px;">
                            <a  class="up">
                                <img src="/tpl/simplebootx/Public/images/arrow_up.png" style="margin-top: 150px;width: 5%;margin-left: 89%;">
                            </a>

                        </li>
                    </ul>

                </li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="bottom">
<ul>
<li>联系电话</li>
<li><a href="tel:4009982033">400-998-2033</a></li>               	
</ul>
</div>
    </div>

</div>
</div>
</body>
</html>