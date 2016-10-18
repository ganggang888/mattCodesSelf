<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo ($post_title); ?> <?php echo ($site_name); ?></title>
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/base.css">
<link rel="stylesheet" href="/zhongyi/tpl/simplebootx/Public/css/main.css">
<script src="/zhongyi/tpl/simplebootx/Public/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/base.js" type="text/javascript"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/jquery-1.8.3.js"></script>
<script src="/zhongyi/tpl/simplebootx/Public/js/base.js" type="text/javascript"></script>
<script>
	$(function(){
		$(".vdo-list,.piclist").slide();
	})
</script>
</head>
<body class="guasha">
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
    <h3><?php echo ($term_name); ?></h3>
    <p><?php echo ($post_keywords); ?></p>
  </div>
  <div class="fr"> <a href="<?php echo (WEB_PATH); ?>">首页</a>><a href="<?php echo leuu('portal/index/page',array('id'=>22));?>">技术验方</a>><a><?php echo ($term_name); ?></a> </div>
</div>
<!--面包结束--> 

<!--主体开始-->
<div class="main">
  <div class="article clearfix">
    <div class="left">
      <div class="pics piclist">
        <ul>
          <?php  $jifa = Allwenzhang($id,"传承人",0,100,'post_modified'); ?>
          <?php if(is_array($jifa)): foreach($jifa as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
            <?php if(!empty($smeta['thumb'])): ?><li><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="390" height="200" alt="<?php echo ($vo["post_title"]); ?>"></a></li><?php endif; endforeach; endif; ?>
        </ul>
        <span class="prev gray"></span> <span class="next"></span> </div>
    </div>
    <div class="right">
      <div class="tit">
        <h5>传承人</h5>
        <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'传承人')));?>" class="more">更多>></a> </div>
      <dl class="dl zhuanjia">
        <dt>
          <div class="fpic fpic-red"> <a href="<?php echo leuu('portal/article/index',array('id'=>$jifa[0]['tid']));?>">
            <?php $smeta = json_decode($jifa[0]['smeta'],true); ?>
            <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="190" height="154" alt="<?php echo ($jifa[0]['post_title']); ?>"> <span></span> <em class="tips"> <?php echo ($jifa[0]['post_title']); ?> </em> </a> </div>
        </dt>
        <dd>
          <p><strong>简介</strong></p>
          <p><?php echo msubstr(strip_tags($jifa[0]['post_content']),0,250);?></p>
        </dd>
      </dl>
    </div>
  </div>
  <div class="article clearfix">
    <div class="left">
      <div class="tit">
        <?php  $bao = Allwenzhang($id,"媒体报道",0,4,'post_modified'); ?>
        <h5>媒体报道</h5>
        <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'媒体报道')));?>" class="more">更多>></a> </div>
        <?php if($bao): ?><dl class="dl smdl">
      
        <a href="<?php echo leuu('portal/article/index',array('id'=>$bao[0]['tid']));?>">
        <?php $smeta = json_decode($bao[0]['smeta'],true); ?>
        <dt> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" alt="<?php echo ($bao[0]['post_title']); ?>"> </dt>
        <dd>
          <h6 class="high">1.<?php echo ($bao[0]['post_title']); ?></h6>
          <p><?php echo msubstr(strip_tags($bao[0]['post_content']),0,25);?></p>
          <p class="high"><?php echo ($bao[0]['post_modified']); ?></p>
        </dd>
        </a>
      </dl><?php endif; ?>
      <ul class="gua-list">
        <?php if(is_array($bao)): foreach($bao as $key=>$vo): if($key != 0): ?><li><a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid']));?>">
              <?php echo $key+1; ?>
              .<?php echo ($vo["post_title"]); ?></a><span class="fr"><?php echo ($vo["post_modified"]); ?></span></li><?php endif; endforeach; endif; ?>
      </ul>
    </div>
    <div class="right">
      <div class="tit">
        <h5>传承人</h5>
        <?php  $jifa = Allwenzhang($id,"传承人",0,3,'post_modified'); ?>
        <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'传承人')));?>" class="more">更多>></a> </div>
        <?php if(is_array($jifa)): foreach($jifa as $key=>$vo): if($key != 0): $smeta = json_decode($vo['smeta'],true); ?>
        <dl class="dl smdl <?php if($key == 1): ?>chdl<?php endif; ?>">
        <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>">
        <dt> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" alt="<?php echo ($vo["post_title"]); ?>" width="156" height="106"> </dt>
        <dd>
          <h6 class="high"><?php echo ($key); ?>.<?php echo ($vo["post_title"]); ?><span class="fr"><?php echo ($vo["post_modified"]); ?></span></h6>
          <p><?php echo msubstr(strip_tags($vo['post_content']),0,30);?></p>
        </dd>
        </a>
      </dl><?php endif; endforeach; endif; ?>
    </div>
  </div>
  <div class="article">
    <div class="tit">
    <?php  $lishi = Allwenzhang($id,"历史沿岸",0,50,'post_modified'); ?>
      <h5>历史沿岸</h5>
      <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'历史沿岸')));?>" class="more">更多>></a> </div>
      
    <ul class="his-list">
    <?php if(is_array($lishi)): foreach($lishi as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
    <li> <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="182" height="123" alt="<?php echo ($vo["post_title"]); ?>">
        <div class="txt"> <em><?php echo date("Y-m-d",strtotime($vo['post_modified']));?></em>
          <p><?php echo ($vo["post_title"]); ?></p>
        </div>
        </a> </li><?php endforeach; endif; ?>
    </ul>
  </div>
  <div class="article">
    <div class="tit">
      <h5>视频库</h5>
      <?php  $video = Allwenzhang($id,"视频库",0,100,'post_modified'); ?>
      <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'视频库')));?>" class="more">更多>></a> </div>
    <div class="pics vdo-list">
      <div class="box">
        <ul class="">
        <?php if(is_array($video)): foreach($video as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
        <li>
            <div class="fpic"> <a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid']));?>"> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="263" height="184" alt="<?php echo ($vo["post_title"]); ?>"> <span></span> <em class="tips"> <?php echo ($vo["post_title"]); ?> </em> </a> </div>
          </li><?php endforeach; endif; ?>
        </ul>
      </div>
      <span class="prev gray"></span> <span class="next"></span> </div>
  </div>
  <div class="article clearfix">
    <div class="left">
      <div class="tit">
        <h5>风采展示</h5>
        <?php  $feng = Allwenzhang($id,"风采展示",0,100,'post_modified'); ?>
                
        <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'风采展示')));?>" class="more">更多>></a> </div>
      <div class="pics piclist">
        <ul>
        <?php if(is_array($feng)): foreach($feng as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
        <li><a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid']));?>"> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="390" height="200" alt="<?php echo ($vo["post_title"]); ?>"> </a></li><?php endforeach; endif; ?>
        </ul>
        <span class="prev gray"></span> <span class="next"></span> </div>
    </div>
    <div class="right">
      <div class="tit">
        <h5>项目特色</h5>
        <?php  $tese = Allwenzhang($id,"项目特色",0,4,'post_modified'); ?>
        <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'项目特色')));?>" class="more">更多>></a> </div>
        <?php if($tese): ?><table class="proj-list">
        <tr>
          <td width="50%"><a href="<?php echo leuu('portal/article/index',array('id'=>$tese[0]['tid']));?>">
            <p class="red">1.<?php echo ($tese[0]['post_title']); ?></p>
            <p><?php echo msubstr(strip_tags($tese[0]['post_content']),0,48);?></p>
            </a></td>
          <td width="50%"><a href="<?php echo leuu('portal/article/index',array('id'=>$tese[1]['tid']));?>">
            <p class="red">2.<?php echo ($tese[1]['post_title']); ?></p>
            <p><?php echo msubstr(strip_tags($tese[1]['post_content']),0,48);?></p>
            </a></td>
        </tr>
        <tr>
          <td width="50%"><a href="<?php echo leuu('portal/article/index',array('id'=>$tese[2]['tid']));?>">
            <p class="red">3.<?php echo ($tese[2]['post_title']); ?></p>
            <p><?php echo msubstr(strip_tags($tese[2]['post_content']),0,48);?></p>
            </a></td>
          <td width="50%"><a href="<?php echo leuu('portal/article/index',array('id'=>$tese[3]['tid']));?>">
            <p class="red">4.<?php echo ($tese[3]['post_title']); ?></p>
            <p><?php echo msubstr(strip_tags($tese[3]['post_content']),0,48);?></p>
            </a></td>
        </tr>
      </table><?php endif; ?>
    </div>
  </div>
  <div class="article clearfix">
    <div class="half-left">
      <div class="tit">
        <h5>史料</h5>
        <?php  $shi = Allwenzhang($id,"史料",0,1,'post_modified'); ?>
        <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'史料')));?>" class="more">更多>></a> </div>
      <?php if(is_array($shi)): foreach($shi as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
      <div class="img-wrap"> <a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid']));?>"> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="458" height="247" alt="<?php echo ($vo["post_title"]); ?>">
        <div class="Jhook">
          <div class="cover"></div>
          <div class="txt">
            <div class="cell">
              <p><?php echo msubstr(strip_tags($vo['post_content']),0,120);?></p>
            </div>
          </div>
        </div>
        </a> </div><?php endforeach; endif; ?>
    </div>
    <div class="half-right">
      <div class="tit">
        <h5>器具</h5>
        <?php  $qi = Allwenzhang($id,"器具",0,1,'post_modified'); ?>
        <a href="<?php echo leuu('portal/list/index',array('id'=>term_ids($id,'器具')));?>" class="more">更多>></a> </div>
      <?php if(is_array($qi)): foreach($qi as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
      <div class="img-wrap"> <a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid']));?>"> <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width="458" height="247" alt="<?php echo ($vo["post_title"]); ?>">
        <div class="Jhook">
          <div class="cover"></div>
          <div class="txt">
            <div class="cell">
              <p><?php echo msubstr(strip_tags($vo['post_content']),0,120);?></p>
            </div>
          </div>
        </div>
        </a> </div><?php endforeach; endif; ?>
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