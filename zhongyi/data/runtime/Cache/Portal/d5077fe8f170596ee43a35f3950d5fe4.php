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
<body class="camp-det">
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
			<h3><?php echo getTermName($term_id);?>详情</h3>
			<p><?php echo ($post_keywords); ?></p>
		</div>
		<div class="fr">
			<a href="<?php echo (WEB_PATH); ?>">首页</a>><?php if(!empty($grand)): echo ($grand["name"]); ?> > <?php echo ($p_term["name"]); ?> > <a href="index.php?g=portal&m=list&a=index&id=<?php echo ($now_term["term_id"]); ?>"><?php echo ($now_term["name"]); ?></a>
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
			<div>
            <?php $imgs = json_decode($smeta,true); ?>
            <?php if(!empty($imgs['thumb'])): ?><img src="<?php echo sp_get_asset_upload_path($imgs['thumb']);?>" alt="<?php echo ($post_title); ?>"><?php endif; ?>
				
			</div>
			<div class="mark center">
				<strong class="high"><?php echo ($post_title); ?></strong>
				<span class="fr">
					<i class="eye hover"></i>阅读量 <?php echo ($post_hits); ?>
				</span>
			</div>
			<div class="center mt10">
				发布日期：<?php echo ($post_modified); ?>
			</div>
			<div class="user-info">
				<?php echo ($post_content); ?>
			</div>	

<div class="page-guid">
            <?php if(!empty($prev)): ?><a href="<?php echo U('article/index',array('id'=>$prev['tid']));?>" class="mr15">上一篇：<?php echo ($prev['post_title']); ?></a><?php endif; ?>
					<?php if(!empty($next)): ?><a href="<?php echo U('article/index',array('id'=>$next['tid']));?>" class="mr15">下一篇：<?php echo ($next['post_title']); ?></a><?php endif; ?>
				
				
			</div>
						
		</div>
		<div class="right">
        <link rel="stylesheet" media="screen" href="/zhongyi/tpl/simplebootx/Public/css/bootstrap.css" /><link rel="stylesheet" media="screen" href="/zhongyi/tpl/simplebootx/Public/css/common.css" />
<link rel="stylesheet" media="screen" href="/zhongyi/tpl/simplebootx/Public/css/bootstrap-extends.css" />

    <link rel="stylesheet" media="screen" href="/zhongyi/tpl/simplebootx/Public/css/web.css" />
<link rel="stylesheet" media="screen" href="/zhongyi/tpl/simplebootx/Public/css/graceful.css" />
<link rel="stylesheet" media="screen" href="/zhongyi/tpl/simplebootx/Public/css/member.css" />
    <link rel="stylesheet" media="screen" href="/zhongyi/tpl/simplebootx/Public/css/hack.css" />
    <link rel="stylesheet" media="screen" href="/zhongyi/tpl/simplebootx/Public/css/phone.css" />

			<div class="col-md-4">
<div class="row rili">
    <div class="cat">
        <div class="data-wrapper quickbuy-overlay" style="border: none;">
<div class="month-tl clear">
    <div class="month-l">
        <p class="m-t1">活动月历</p>
        <p class="m-t2"><?php echo date("F",time());?></p>
    </div>
    <div class="month-r">
         <?php echo date("m",time());?>月
    </div>
</div>

<div class="calendar-box J_calendar_box">
<div class="ticket-calendar-bounding-box" id="calendar-760" style="position: relative; width: 312px;">
<div class="calendar-container">
<div class="content-box">
<div class="date-box">
<div class="inner" style="width: 312px;">
<table>
<thead>
<tr>
    <th class="weekend">
        星期日
    </th>
    <th class="">
        星期一
    </th>
    <th class="">
        星期二
    </th>
    <th class="">
        星期三
    </th>
    <th class="">
        星期四
    </th>
    <th class="">
        星期五
    </th>
    <th>
        星期六
    </th>
</tr>
</thead>
<?php $todo = getData($term_id); ?>
<tbody>
<?php echo ($todo["html"]); ?>
</tbody>
</table>
<div class="date-tip clear">
    <div class="date-sport">
        <i></i>
        有活动
    </div>
    <div class="date-now">
        <i></i>
        今天
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div></div>
			
				
			
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