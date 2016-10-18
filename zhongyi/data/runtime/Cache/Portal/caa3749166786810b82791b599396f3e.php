<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo ($name); ?> <?php echo ($seo_title); ?> <?php echo ($site_name); ?></title>
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/base.css">
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/main.css">
<script src="/zhongyi/tpl/simplebootx/Public/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/base.js" type="text/javascript"></script>
</head>
<body class="jifa vd-list pic-list">
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
			<h3><?php echo ($name); ?></h3>
			<p><?php echo ($description); ?></p>
		</div>
		<div class="fr">
			<a href="<?php echo ($Tink["const"]["WEB_PATH"]); ?>">首页</a>><?php if(!empty($grand)): echo ($grand["name"]); ?> > <?php echo ($p_term["name"]); ?> > <a href="index.php?g=portal&m=list&a=index&id=<?php echo ($now_term["term_id"]); ?>"><?php echo ($now_term["name"]); ?></a>
                <?php elseif(!empty($p_term)): ?>
                <?php echo ($p_term["name"]); ?> ><a href="index.php?g=portal&m=list&a=index&id=<?php echo ($now_term["term_id"]); ?>" > <?php echo ($now_term["name"]); ?></a>
                <?php else: ?>
                <a href="index.php?g=portal&m=list&a=index&id=<?php echo ($now_term["term_id"]); ?>"> <?php echo ($now_term["name"]); ?></a><?php endif; ?>
		</div>
	</div>
	<!--面包结束-->

	<!--主体开始-->
	<div class="main clearfix">
		<div class="left">
			<div class="photos clearfix">
				<ul>
                <?php $lists = sp_sql_posts_paged($_GET['time'],"cid:$cat_id;order:post_date DESC;",9); ?>
                <?php if(is_array($lists['posts'])): foreach($lists['posts'] as $key=>$vo): $smeta=json_decode($vo['smeta'], true); $last = ($key+1) % 3; ?>
                <li <?php if($last == 0): ?>class="no-pd"<?php endif; ?>>
						<div class="pic">
                        <?php if(!empty($smeta['thumb'])): ?><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="205" height="138" alt="<?php echo ($vo["post_title"]); ?>"></a><?php endif; ?>
						</div>
						<div class="red16">
							<?php echo ($vo["post_title"]); ?>
						</div>
						<p>
							<?php if (strlen(strip_tags($vo['post_content'])) <= 30) { echo strip_tags($vo['post_content']); } else { echo mb_substr(strip_tags($vo['post_content']),0,30,'utf-8')."..."; } ?>
						</p>
						<div class="num">
							<i class="eye"></i>阅读量 <?php echo ($vo["post_hits"]); ?>
						</div>
					</li><?php endforeach; endif; ?>
				</ul>

			</div>
			<div class="center">
				<span class="page">
					<?php echo ($lists['page']); ?>
				</span>
			</div>	
		</div>
		<div class="right">
  <div class="box">
    <?php  $shiping = getALLid("视频库",0,1,'post_modified'); ?>
    <div class="tit">
      <h5>推荐视频</h5>
      <a href="<?php echo leuu('portal/list/jifa_list',array('name'=>'视频库'));?>" class="more">更多>></a> </div>
    <?php if(is_array($shiping)): foreach($shiping as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
      <div class="fpic"> <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="264" height="209" alt="<?php echo ($vo["post_title"]); ?>"> <span></span> <em class="tips"> 视频名称：<?php echo ($vo["post_title"]); ?> </em> </a> </div><?php endforeach; endif; ?>
  </div>
  <div class="box">
    <div class="tit">
      <h5>活动预告</h5>
      <?php $yugao = getALLid("活动预告",0,1,'post_modified'); ?>
      <a href="<?php echo leuu('portal/list/jifa_list',array('name'=>'活动预告'));?>" class="more">更多>></a> </div>
    <ul class="list">
      <?php if(is_array($yugao)): foreach($yugao as $key=>$vo): ?><li><span class="fr"><?php echo date("Y-m-d",strtotime($vo['post_modified']));?></span><a href="<?php echo leuu('portal/list/index',array('id'=>11));?>"><?php echo msubstr(strip_tags($vo['post_title']),0,29);?></a></li><?php endforeach; endif; ?>
    </ul>
  </div>
  <div class="box">
    <?php $yugao = getALLid("媒体报道",0,1,'post_modified') ?>
    <div class="tit">
      <h5>媒体报道</h5>
      <?php if(is_array($yugao)): foreach($yugao as $key=>$vo): ?><a href="<?php echo leuu('portal/list/jifa_list',array('name'=>'媒体报道'));?>" class="more">更多>></a> </div>
    <div class="high"> <?php echo ($vo['post_title']); ?> <span class="fr"><?php echo date("Y-m-d",strtotime($vo['post_modified']));?></span> </div>
    <p class="list"> <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo msubstr(strip_tags($vo['post_content']),0,33);?></a> </p><?php endforeach; endif; ?>
      
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
</body>
</html>