<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/base.css">
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/main.css">
<script src="/zhongyi/tpl/simplebootx/Public/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/base.js" type="text/javascript"></script>
<script>
	$(function(){
		$("#ablum").slide();
	})
</script>
</head>
<body class="index">
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
<div class="adv"></div>

<!--主体开始-->
<div class="main">
  <div class="article">
    <div class="left">
      <div class="title">
        <h5>相关视频</h5>
        <?php $videos = videoInfos('视频',0,3); ?>
        <a href="<?php echo leuu('portal/list/index',array('id'=>11));?>" class="more">更多>></a> </div>
      <div class="fpic vdpic"> <a href="<?php echo leuu('article/index',array('id'=>$videos[0]['tid']));?>">
        <?php $first_photos = json_decode($videos[0]['smeta'],true); ?>
        <img src="<?php echo sp_get_asset_upload_path($first_photos['thumb']);?>" alt="<?php echo ($videos[0]['post_title']); ?>" width="322" height="255"> <span></span> <em class="tips"> 视频名称：<?php echo ($videos[0][post_title]); ?> </em> </a> </div>
      <dl class="dbpic">
        <?php if(is_array($videos)): foreach($videos as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
          <?php if($key != 0): ?><dt><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="157" height="106" alt="<?php echo ($vo["post_title"]); ?>"></a></dt><?php endif; endforeach; endif; ?>
      </dl>
    </div>
    <div class="right">
      <div class="title">
        <h5>资讯中心</h5>
        <?php $news=sp_sql_posts("cid:5;field:post_title,post_excerpt,tid,smeta,post_modified;order:post_modified asc;limit:2;"); ?>
        <a href="<?php echo leuu('portal/list/index',array('id'=>5));?>" class="more">更多>></a> </div>
      <div class="notice clearfix">
        <div class="block"> <span>通知</span><span>公告</span> </div>
        <ol>
          <?php if(is_array($news)): foreach($news as $key=>$vo): ?><li><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a><span><?php echo ($vo["post_modified"]); ?></span></li><?php endforeach; endif; ?>
        </ol>
      </div>
      <div class="note-list clearfix">
        <?php $yugao=sp_sql_posts("cid:3;field:post_title,post_excerpt,post_content,tid,smeta,post_modified;order:listorder asc;limit:2;"); ?>
        <?php if(is_array($yugao)): foreach($yugao as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
          <dl 
          <?php if($key != 0): ?>class="nobd"<?php endif; ?>
          >
          <dt> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" alt="" width="156" height="106"> </dt>
          <dd>
            <h4> <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><em class="bold"> <?php echo ($vo["post_title"]); ?> </em></a> <span class="fr"><?php echo ($vo["post_modified"]); ?></span> </h4>
            <div class="con"> <?php echo msubstr(strip_tags($vo['post_content']),0,70);?> <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>" class="fr detail">【详情】</a> </div>
          </dd>
          </dl><?php endforeach; endif; ?>
      </div>
    </div>
  </div>
  <div class="article">
    <div class="left">
      <div class="title">
        <h5>媒体报道</h5>
        <a href="<?php echo leuu('portal/list/index',array('id'=>9));?>" class="more">更多>></a> </div>
      <?php $meiti=sp_sql_posts("cid:9;field:post_title,post_excerpt,post_content,tid,smeta,post_modified;order:listorder DESC;limit:1;"); ?>
      <?php if(is_array($meiti)): foreach($meiti as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
        <dl class="dbpic">
          <dt><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" alt="{vo.post_title}" width="157" height="106"></a></dt>
          <dd>
            <p class="bold"> <?php echo ($vo["post_title"]); ?> </p>
            <p> [<?php echo ($vo["post_modified"]); ?>] </p>
          </dd>
        </dl><?php endforeach; endif; ?>
    </div>
    <div class="right">
      <div class="title">
        <h5>新闻动态</h5>
        <a href="<?php echo leuu('portal/list/index',array('id'=>4));?>" class="more">更多>></a> </div>
      <?php $new=sp_sql_posts("cid:4;field:post_title,post_excerpt,post_content,tid,smeta,post_modified;order:post_modified DESC;limit:5;"); ?>
      <ul class="cb-list">
        <?php if(is_array($new)): foreach($new as $key=>$vo): ?><li><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo mb_substr($vo['post_title'],0,25,'utf-8');?><span><?php echo ($vo["post_modified"]); ?></span></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
  <div class="article">
    <div class="left">
      <div class="title">
        <h5>媒体报道推荐</h5>
        <a href="<?php echo leuu('portal/list/index',array('id'=>9));?>" class="more">更多>></a> </div>
      <?php $meititui=sp_sql_posts("cid:3;field:post_title,post_excerpt,post_content,tid,smeta,post_modified;order:post_modified DESC;limit:3;"); ?>
      <?php if(is_array($meititui)): foreach($meititui as $key=>$vo): if($key != 0): $smeta = json_decode($vo['smeta'],true); ?>
          <dl class="dbpic <?php if($key == 1): ?>mb15<?php endif; ?>">
            <dt><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="157" height="106" alt="<?php echo ($vo["post_title"]); ?>"></a></dt>
            <dd>
              <p class="bold"> <?php echo ($vo["post_title"]); ?> </p>
              <p> <?php echo msubstr(strip_tags($vo['post_content']),0,29);?> <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>" class="fr detail">【详情】</a> </p>
            </dd>
          </dl><?php endif; endforeach; endif; ?>
    </div>
    <div class="right">
      <div class="title">
        <h5>专家风采</h5>
        <!--<a href="<?php echo leuu('portal/list/index',array('id'=>7));?>" class="more">更多>></a>--> </div>
      <div class="ablum" id="ablum"> <a href="javascript:void(0);" class="btn prev"></a>
        <div class="box">
        <?php $zhuanjia=videoInfos('专家',0,100); ?>
          <ul style="width:1000px;">
          <?php if(is_array($zhuanjia)): foreach($zhuanjia as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
          <li> <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="156" height="105" alt="<?php echo ($vo["post_title"]); ?>"> </a>
              <div class="human">
                <p><span class="bold"><?php echo ($vo["post_title"]); ?>/</span><?php echo ($vo["post_keywords"]); ?></p>
                <?php echo msubstr(strip_tags($vo['post_content']),0,29);?> </div>
            </li><?php endforeach; endif; ?>
          </ul>
        </div>
        <a href="javascript:void(0);" class="btn next"></a> </div>
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