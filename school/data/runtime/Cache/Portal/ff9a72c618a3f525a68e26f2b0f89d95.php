<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <script type="text/javascript" src="/school/tpl/simplebootx/Public/js/jquery-1.8.2.min.js" ></script>
		<link rel="stylesheet" href="/school/tpl/simplebootx/Public/css/Global.css" />
		<link rel="stylesheet" href="/school/tpl/simplebootx/Public/css/base.css" /><link rel="stylesheet" href="css/index.css" />
		<title>诚信查询系统</title>

	</head>
	<body>
		<div class="overall">
			<div class="top">			
				<a href="javascript:;" onClick="history.go(-1)"><img src="/school/tpl/simplebootx/Public/images/arrow_left.png"/></a>
				<span style="margin-left: -8%;"><?php echo ($info["name"]); ?>-<?php echo ($info["student_id"]); ?></span>
			</div>
			<div class="middle">
				<br/>
				<br/>
	<div>
		<a style="display: block;margin-left:33% ;width: 33%;">
			<img src="<?php echo ($info["photo"]); ?>" style="border-radius:50% 50% ; width: 100%;">
				<a>
		
	</div>
	<br/>
	<br/>
	<style type="text/css">
		 .div CXCX{
				   	float: left;
				   }
				   .CXCX{
				   	width: 38%;
				   	color: #666666;
				   	font-size: 16px;
			
				   }
				      .CXCX1{
				   	width: 62%;
				   	  	
				   }
				   	.CXCX li{
				   		list-style: none;
				   		text-align:right;
				   		margin-top: 10px;
				   	}
				   	.CXCX1 li{
				   			color: #666666;
				   	font-size: 16px;
				   		margin-left: 4%;
				   		list-style: none;
				   		text-align:left;	
				   		margin-top: 10px;		   		
		 }
		 
		 
		 
		 .div Pen{
				   	float: left;
				   }
				   .Pen{
				   	width: 38%;
				   	font-size: 16px;
				   	color: #F9A51A;
				   }
				      .Pen1{
				   	width: 62%;
				   		   	color: #F9A51A;
				   }
				   	.Pen li{
				   		list-style: none;
				   		text-align:right;
				   		margin-top: 10px;
				   	}
				   	.Pen1 li{
	   	color: #F9A51A;
				   	font-size: 16px;
				   		margin-left: 40%;
				   		list-style: none;
				   		text-align:left;	
				   		margin-top: 10px;		   		
		 }
	</style>
<p><img src="/school/tpl/simplebootx/Public/images/Fen1.png" width="100%"></p>
	  <div class="div" style="height: 200px;">
				   <ul class="CXCX">
				     	<li>姓名&nbsp;&nbsp;:</li>
				   		<li>年龄&nbsp;&nbsp;:</li>
                        <?php $should = array(0=>'未填',1=>'小学',2=>'初中',3=>'高中(中专)',4=>'专科',5=>'本科'); ?>
				   		<li>学历&nbsp;&nbsp;:</li>
                        <?php $certificate = json_decode($info['certificate'],true); ?>
				   		<li style="height: 70px;	">证书&nbsp;&nbsp;:
                        
                        </li>
				   		<li>工作经历&nbsp;&nbsp;:</li>
				   </ul>
				   <ul class="CXCX1">
				     	<li ><?php echo ($info["name"]); ?></li>
				     	<li><?php echo ($info["age"]); ?></li>
				   		<li><?php echo ($should[$info['education']]); ?></li>
				   		<li>
				   			<?php if(is_array($certificate)): foreach($certificate as $key=>$vo): echo ($vo); ?><br/><?php endforeach; endif; ?>
				   		</li>
				   		<li>
                        <?php $student_work = D('student_work'); $rows = $student_work->where(array('student_id'=>$info['id']))->select(); ?>
                        <?php if(is_array($rows)): foreach($rows as $key=>$vo): echo ($vo["work_address"]); ?><br/><?php echo ($vo["from_time"]); ?>&nbsp;至&nbsp;<?php echo ($vo["to_time"]); ?><br/><br/><?php endforeach; endif; ?>
                        </li>
				   </ul>			   
                </div>		   			   
<p><img src="/school/tpl/simplebootx/Public/images/Fen2.png" width="100%"></p>

 <div class="div" style=" line-height:25px; font-size:16px; text-align:center">
			<?php if(is_array($result)): foreach($result as $key=>$vo): ?><li style="list-style:none" style="margin:0">
            <?php echo ($vo["name"]); ?>:<br/><?php if(empty($vo['general_result'])): ?>无<?php endif; echo ($vo["general_result"]); ?><br/><br/>
            </li><?php endforeach; endif; ?>
                </div>		   
<!--<p><img src="/school/tpl/simplebootx/Public/images/Fen3.png" width="100%"></p>-->
	<div></div>
	<div></div>
       </div>
          <!--<div class="md_06">
                 <a>工号：001A<a>
        </div>-->
				<div class="bottom">
				 <ul>
                   <li>联系电话</li>
                 <li><a>400-998-2033</a></li>               	
                 </ul>
			</div>
		</div>
	</body>
</html>