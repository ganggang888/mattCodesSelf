<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <script src="/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <link href="/tpl/simplebootx/Public/css/Global.css" rel="stylesheet">
    <link href="/tpl/simplebootx/Public/css/base.css" rel="stylesheet">
    <link rel="stylesheet" href="/tpl/simplebootx/Public/css/outs.css" />

    <title>优秀学员</title>
    <style type="text/css">
        .middle ul li
        {
            display: block;
            list-style: none;
            width: 29.2%;
            height: 30%;
            background-color: #f9a51a;
            float: left;
            margin: 1% 1% ;
            padding: 1% 1%;
            border-radius:10px  10px ;
        }
        .middle ul li img{
            width:90% ;
            padding: 5% 5%;
            height:78%;
        }
        .middle ul li span{
            text-align: center;
            font-size: 16px;
            display: block;
        }
        .aboclkey{
            position: relative;
            width: 7%;
            margin-left: 86%;
            height: 24px;
            line-height: 24px;
            display: block;
        }
        .bu{
            float: right;
        }
        .bu span{
            color: #FFFFFF;
        }
    </style>
</head>

<body>
<div class="overall">
    <div class="top">
        <a href="#"><img src="/tpl/simplebootx/Public/images/arrow_left.png"></a> <span style="margin-left: -12%;">优秀优秀学员</span>
    </div>
    <?php $i = 0; ?>
    <div class="middle">
        <?php if(is_array($students)): foreach($students as $key=>$vo): ?><div class="Student">

                <a class="md-trigger" data-modal="modal-<?php echo ($i); ?>">
                    <dl>
                       <dt>
                          <img src="<?php echo ($vo["photo"]); ?>">
                       </dt>
                       <dd>
                           <?php echo ($vo["name"]); ?>
                       </dd>

                    </dl>
                </a>
        </div>

        <!--弹窗-->
        <div class="md-modal md-effect-15" id="modal-<?php echo ($i); ?>">
            <div class="md-content">
                <h3>学员介绍</h3>
                <div>
                    <p>
                        <?php echo ($vo["introduce"]); ?>
                    </p>
                    <button class="md-close" style="margin-left: 80%">关闭</button>
                </div>
            </div>
        </div>
            <?php $i++; endforeach; endif; ?>
        <!--弹窗结束-->
    </div>

    <div class="bottom" style=" position:fixed;bottom:0;left:0;">
        <ul>
            <li>联系电话</li>
            <li><a>400-998-2033</a></li>
        </ul>
    </div>
</div>
<script>
    var polyfilter_scriptpath = '/js/';
</script>
</body>
<script type="text/javascript" src="/tpl/simplebootx/Public/js/outs.js" ></script>
</html>