<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo ($post_title); ?> <?php echo ($site_name); ?></title>
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/base.css">
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/main.css">
<script src="/zhongyi/tpl/simplebootx/Public/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/base.js" type="text/javascript"></script>
</head>
<body class="xianji">
<div class="limiter">
	<!--头部开始-->
<?php $allTrees = sp_get_menu_tree(); ?>
<?php $now_term = sp_get_term($term_id); $pid = $now_term['parent']; if($pid != 0){ $p_term = sp_get_term($pid); $grand_id = $p_term['parent']; if($grand_id != 0){ $grand = sp_get_term($grand_id); } } ?>
	<div class="header">
		<h2 class="logo"></h2>
		<div class="navbox">
			<div class="search" style="height:28px">
				<!--<input type="text" value="请输入你要查询的内容"><span class="icon"></span>-->
			</div>
			<div class="nav clearfix">
      <ul>
      <?php if(is_array($allTrees)): foreach($allTrees as $key=>$vo): $one_url = parse_url($vo['href']); if ($one_url['query']) { $re = explode('=',$one_url['query']); $the_list = $re[1]; $the_id = $re[3]; } if ($vo['child']) { foreach($vo['child'] as $i) { $urlss = parse_url($i['href']); if ($urlss['query']) { $dog = explode('=',$urlss['query']); if ($dog[3] == $term_id) { $isIn = 'good'; } if ($dog[3] == $id && $dog[1] == 'page&a') { $isIns = 'good'; } } } } ?>
      
      <li <?php if($the_id == $term_id && $the_list == 'list&a' ): ?>class="now"<?php endif; if($the_id == $tid && $the_list == 'article&a'): ?>class="now"<?php endif; ?> <?php if($pids == 2 && $the_id == 22): ?>class="now"<?php endif; if($id == $the_id && $the_list == 'page&a'): ?>class="now"<?php endif; if($isIn == 'good'): ?>class="now"<?php endif; if($isIns == 'good'): ?>class="now"<?php endif; if($index == 'index' && $vo['label'] == '首页'): ?>class="now"<?php endif; ?>> <a href="<?php echo ($vo["href"]); ?>" target="<?php echo ($vo["target"]); ?>"><?php echo ($vo["label"]); ?></a><?php unset($isIn);unset($isIns);$tid = 'haha'; ?>
      <if condition="!empty($vo['child'])">
      <ol>
      <?php if(is_array($vo['child'])): foreach($vo['child'] as $key=>$v): ?><li><a href="<?php echo ($v["href"]); ?>" target="<?php echo ($v["target"]); ?>"><?php echo ($v["label"]); ?></a></li><?php endforeach; endif; ?>
      </ol><?php endforeach; endif; ?>
      </li>
      </foreach>
      </ul>
    </div>
		</div>
	</div>
	<!--头部结束-->

	<!--面包开始-->
	<div class="bread">
		<div class="fl">
			<h3><?php echo ($post_title); ?></h3>
			<p><?php echo ($post_keywords); ?></p>
		</div>
		<div class="fr">
			<a href="<?php echo (WEB_PATH); ?>">首页</a>>我要献计><a><?php echo ($post_title); ?></a>
		</div>
	</div>
	<!--面包结束-->

	<!--主体开始-->
	<div class="main clearfix">
		<ul class="tab">
			<li class="now"><a href="javascript:;">我有一技</a></li>
			<li><a href="<?php echo leuu('portal/page/index',array('id'=>18));?>">我有线索</a></li>
		</ul>
		<form class="edit">
			<div class="con">
				<table>
					<colgroup> 
					    <col width="50%"> 
					    <col width="50%">
					</colgroup>
					<tbody>
						<tr>
							<td>
								<label for="">*技法名称：</label>
								<input type="text" name="name" id="name" placeholder="请输入技法名称">
							</td>
							<td>
								<label for="">*地点：</label>
								<input type="text" name="address" id="address" placeholder="请输入您的地址">
							</td>
						</tr>
						<tr>
							<td>
								<label for="">*申请人：</label>
								<input type="text" name="username" id="username" placeholder="请输入申请人名称">
							</td>
							<td>
								<label for="">*邮箱：</label>
								<input type="text" name="" id="email" placeholder="请输入您的邮箱">
							</td>
						</tr>
						<tr>
							<td>
								<label for="">*传承人：</label>
								<input type="text" id="man" placeholder="请输入传承人">
							</td>
							<td>
								<label for="">*联系电话：</label>
								<input type="text" id="phone" placeholder="请输入您的联系电话">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<label for="">*技术特点：</label>
								<textarea placeholder="请输入您的技术特点" id="goods"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2">
                            <?php $all = skillInfo(); ?>
								<label for="">*技术类型：</label>
                                <?php if(is_array($all)): foreach($all as $key=>$vo): ?><a href="javascript:;"><?php echo ($vo["name"]); ?></a><?php endforeach; endif; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="center mt20 mb15">
				<a href="javascript:;" style="font-size: 20px;
font-weight: bold;
width: 290px;
height: 52px;display: inline-block;
background-color: #E19D35;
color: white;
border: none;
padding: 0;
cursor: pointer; line-height:52px" id="upload" onClick="upload()">同意并上传</a>
			</div>
		</form>
	</div>
	<!--主体结束-->
<!--底部开始-->
<?php $links=sp_getlinks(); ?>
	<div class="footer">
		<div class="frd-line"><span></span></div>
		<div class="frd-img">
        <?php if(is_array($links)): foreach($links as $key=>$vo): if(!empty($vo['link_image'])): ?><a href="<?php echo ($vo["link_url"]); ?>" target="<?php echo ($vo["link_target"]); ?>"><img src="<?php echo ($vo["link_image"]); ?>" alt="<?php echo ($vo["link_name"]); ?>"></a><?php endif; endforeach; endif; ?>
		</div>
		<div class="frd-txt">
        <?php if(is_array($links)): foreach($links as $key=>$vo): if(empty($vo['link_image'])): ?><a href="<?php echo ($vo["link_url"]); ?>" target="<?php echo ($vo["link_target"]); ?>"><?php echo ($vo["link_name"]); ?></a><?php endif; endforeach; endif; ?>
		</div>
		<div class="copyright">
			<p>
				Copyrights 2012-2015 All Rights Reserved. 上海民间中医特色诊疗技术评价中心 版权所有 
			</p>
			<p>
				地址：上海市浦东新区张衡路528号 
			</p>
			<p>
				<span>沪ICP备13046115号</span>  
			</p>
			
		</div>
	</div>
	<!--底部结束-->
</div>

<!--边块开始-->
<div class="fixed-pad">
	<ul>
		<li><a href="<?php echo leuu('portal/page/index',array('id'=>18));?>"><i>我有</i><i>线索</i></a></li>
		<li><a href="<?php echo leuu('portal/page/index',array('id'=>16));?>"><i class="icon"></i><i>我有一技</i></a></li>
		<li class="special"><a href="<?php echo leuu('portal/list/index',array('id'=>38));?>"><i>下载</i><i>中心</i></a></li>
		<li class="special"><a href="<?php echo leuu('portal/page/index',array('id'=>24));?>"><i>联系</i><i>我们</i></a></li>
	</ul>
</div>
<!--边块结束-->
<style>
	
	#think_page_trace_open{ display:none!important;}
</style>
<script>
var term_info;
    $(function(){
		$(".xianji td a").click(function()
		{
			$(".xianji td a").attr("class",'');
			$(this).attr("class","good");
			term_info = $(this).html();
		}
		)
	})
</script>
<script>
function upload()
{
	var name = $("#name").val();
	var address = $("#address").val();
	var username = $("#username").val();
	var email = $("#email").val();
	var man = $("#man").val();
	var goods = $("#goods").val();
	var phone = $("#phone").val();
	if (phone.length != 11) {
		alert('请输入正确的手机号码');
		return false;
	}
	if (name == '') {
		alert('请输入技法名称');
		return false;
	}
	if (username == '') {
		alert('请输入申请人名称');
		return false;
	}
	if (goods == '') {
		alert('请输入您的技术特点');
		return false;
	}
	if (term_info == '') {
		alert('请选择技术特点');
		return false;
	}
	var infos = {
		name:name,
		address:address,
		username:username,
		email:email,
		man:man,
		goods:goods,
		phone:phone,
		term_info:term_info,
		is_ajax:1
	}
	$.ajax({
		type:"POST",
		url:"<?php echo (WEB_PATH); ?>/index.php?g=portal&m=index&a=xianji",
		data:infos,
		success: function(data){
			if (data.status == 1) {
				alert("恭喜您上传成功，我们会尽快联系您的");
			} else {
				alert(data.info);
				return false;
			}
		}
	})
}
</script>
</body>
</html>