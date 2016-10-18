<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>技法与验方项目列表</title>
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/base.css">
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/main.css">
<script src="/zhongyi/tpl/simplebootx/Public/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/base.js" type="text/javascript"></script>
</head>
<body class="jifa yanfang">
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
			<h3>项目列表</h3>
			<p>UPCOMING EVENTS</p>
		</div>
		<div class="fr">
			<a href="<?php echo ($Tink["const"]["WEB_PATH"]); ?>">首页</a>><a href="<?php echo leuu('portal/index/page',array('id'=>22));?>">技术验方</a>><a>项目列表</a>
		</div>
	</div>
	<!--面包结束-->

	<!--主体开始-->
	<div class="main clearfix">
		<div class="left">
			<div class="tit">
				<h5>民间技法项目列表</h5>
			</div>
            <?php if(is_array($result)): foreach($result as $key=>$vo): ?><dl class="dl fixdl">
				<dt>
					<a href="<?php echo leuu('portal/list/technology_page',array('id'=>$vo['term_id']));?>"><img src="<?php echo ($vo["img"]); ?>" alt="<?php echo ($vo["name"]); ?>" width="156" height="106"></a>
				</dt>
				<dd>
					<h5><?php echo ($vo["name"]); ?></h5>
					<p>
						<?php echo ($vo["description"]); ?>
					</p>
				</dd>
			</dl><?php endforeach; endif; ?>
			<div class="center">
				<span class="page">
					<?php echo ($page); ?>
				</span>
			</div>			
		</div>
		<div class="right">
			<div class="box jiansuo">
				<div class="tit">
					<h5>技法检索</h5>
				</div>
				<ul class="xing">
					<li>
						<div class="one">
							<span>形式：</span><a href="<?php echo leuu('portal/list/technology');?>">全部</a>
						</div>
						<div class="two">
                        <?php $allTags = allTags(); ?>
                        <?php if(is_array($allTags)): foreach($allTags as $key=>$tag): ?><a href="javascript:void(0)" id="<?php echo ($tag["id"]); ?>" <?php if($tag['id'] == $tags): ?>class="selected"<?php endif; ?>><?php echo ($tag["name"]); ?></a><?php endforeach; endif; ?>
						</div>
					</li>
					<li class="center mt10">
                    <a style="display: inline-block;
  width: 100px;
  height: 30px;
  background-color: #e19d35;
  color: #fff;
  border: none;
  padding: 0;
  cursor: pointer;  width: 150px;
  border: 1px solid #c78003;
  border-radius: 1px;
  /* Webkit: Safari 4-5, Chrome 1-9; */
  background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd9213), to(#cd7308));
  /* Webkit: Safari 5.1+, Chrome 10+; */
  background-image: -webkit-linear-gradient(top, #fd9213, #cd7308); line-height:30px" href="javascript:;" onClick="searchs()">我要搜索</a>
			<!--			<input type="submit" value="我要搜索">-->
					</li>
				</ul>
				
			</div>
		
			<div class="box">
				<div class="banner">
					<a href="#">
						<img src="/zhongyi/tpl/simplebootx/Public/img/user_bg.jpg" alt="">
					</a>
				</div>
			</div>

			<div class="box">
				<div class="banner">
					<a href="#">
						<img src="/zhongyi/tpl/simplebootx/Public/img/user_bg.jpg" alt="">
					</a>
				</div>
			</div>
		</div>
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
$(function(){
	$('.xing li a').on("click",function(){
		$('.xing li a').attr("class","");
		$(this).toggleClass("selected");
	});
});
function searchs()
{
	var id = $(".xing .selected").attr("id");
	if (id == '') {
		alert('请选择条件');
		return false;
	}
	window.location.href='index.php?g=portal&m=list&a=technology&tag='+id;
}
</script>
</body>
</html>