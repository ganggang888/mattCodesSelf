<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo ($post_title); ?> <?php echo ($site_name); ?></title>
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/base.css">
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/main.css">
<script src="/zhongyi/tpl/simplebootx/Public/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/base.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/base.js" type="text/javascript"></script>
</head>
<body class="guasha2">
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
			<a href="<?php echo (WEB_PATH); ?>">首页</a>><a><?php echo ($post_title); ?></a>
		</div>
	</div>
	<!--面包结束-->
<?php $result = yanjiuInfo(); ?>
	<!--主体开始-->
	<div class="main clearfix">
		<!--article s-->
        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><div class="article">
			<div class="title">
				<h5><?php echo ($vo["name"]); ?></h5>
				<a href="<?php echo leuu('portal/list/yanjiu_list',array('id'=>$vo['term_id']));?>" class="more">更多>></a>
			</div>
			<div class="gline">
				<span class="lft gtit">工作<i class="red">动态</i></span>
				<span class="rt gtit"><i class="red">专家</i>介绍</span>
			</div>
			<div class="gcon">
				<div class="lft">
                <?php  $one = Allwenzhang($vo['term_id'],"工作动态",0,4,'post_modified'); ?>
					<div class="job has-bg">
						<dl class="">
							<dd>
								<h6><a href="<?php echo leuu('portal/article/index',array('id'=>$one[0]['tid']));?>">标题：<?php echo ($one[0]['post_title']); ?></a></h6>
							</dd>
						</dl>
						<ul>
                        <?php if(is_array($one)): foreach($one as $key=>$vo): if($key != 0): ?><li><a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid']));?>">
								<?php echo ($key); ?>.<?php echo ($vo["post_title"]); ?>
							</a></li><?php endif; endforeach; endif; ?>
						</ul>
					</div>
				</div>
				<div class="rt">
					<div class="pics">
						<div class="box">
							<ul class="">
                            <?php  $two = Allwenzhang($vo['term_id'],"专家介绍",0,50,'post_modified'); ?>
                <?php if(is_array($two)): foreach($two as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
                <li>
									<div class="fpic">
										<a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid']));?>">
											<img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="240" height="157" alt="<?php echo ($vo["post_title"]); ?>">
											<span></span>
											<em class="tips">
												<?php echo msubstr(strip_tags($vo['post_content']),0,50);?>
											</em>
										</a>	
									</div>
								</li><?php endforeach; endif; ?>
							</ul>
						</div>
						<span class="prev"></span>
						<span class="next"></span>
					</div>
				</div>	
			</div>
<?php $three = Allwenzhang($vo['term_id'],"成果荣誉",0,50,'post_modified'); ?>
			<div class="gline">
				<span class="lft gtit">成果<i class="red">荣誉</i></span>
			</div>
			<div class="gcon">
				<div class="glist">
					<ul>
                    <?php if(is_array($two)): foreach($two as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
                <li>
							<a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid']));?>">
								<div><img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="200" height="132" alt="<?php echo ($vo["post_title"]); ?>"></div>
								<p class="center"><?php echo ($vo["post_title"]); ?></p>
							</a>
						</li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
		</div><?php endforeach; endif; ?>
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
	$(".pics").slide();
})
</script>
</body>
</html>