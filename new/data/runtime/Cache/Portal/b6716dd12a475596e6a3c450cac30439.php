<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title><?php echo ($name); ?> <?php echo ($seo_title); ?> <?php echo ($site_name); ?></title>
	<meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
	<meta name="description" content="<?php echo ($seo_description); ?>">
    	<?php  function _sp_helloworld(){ echo "hello ThinkCMF!"; } function _sp_helloworld2(){ echo "hello ThinkCMF2!"; } function _sp_helloworld3(){ echo "hello ThinkCMF3!"; } ?>
	<?php $portal_index_lastnews=2; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX1.6.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
	<meta name="author" content="ThinkCMF">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

   	<!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
	<link rel="icon" href="/new/tpl/simplebootx/Public/images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/new/tpl/simplebootx/Public/images/favicon.ico" type="image/x-icon">
    <link href="/new/tpl/simplebootx/Public/simpleboot/themes/cmf/theme.min.css" rel="stylesheet">
    <link href="/new/tpl/simplebootx/Public/simpleboot/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/new/tpl/simplebootx/Public/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
	<!--[if IE 7]>
	<link rel="stylesheet" href="/new/tpl/simplebootx/Public/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<link href="/new/tpl/simplebootx/Public/css/style.css" rel="stylesheet">
	<style>
		/*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
		#backtotop{position: fixed;bottom: 50px;right:20px;display: none;cursor: pointer;font-size: 50px;z-index: 9999;}
		#backtotop:hover{color:#333}
		#main-menu-user li.user{display: none}
	</style>
	
</head>
<body>
<div class="contatop"> 
  <!--中间导航结束-->
  <div class=" text-large text-left line"> <a class="bg-one  button-big " href="Mymattseven.html"> 我们</a> <a > |</a> <a class=" bg-one  button-big " href="Mattxinwen.html">新闻 </a> <a > |</a> <a class="bg-one  button-big " href="Mymatttwo.html" > 大事件</a> <a  > |</a> <a class=" bg-one button-big " href="Mymattmeng.html" > 人物</a> <a > |</a> <a class="bg-one  button-big " href="Mymattfive.html"> 媒体专区</a> <a  > |</a> <a class=" bg-one  button-big " href="Mymattsix.html" > 分享</a> </div>
  <!--中间导航开始--> 
</div>
<div class="banner contatop"> 
  <script type="text/javascript">
    $(function(){
        $(".clearfix").hover(
            function(){
                var that=this;
                item1Timer=setTimeout(function(){
                    $(that).find("span").animate({"top":-15,"height":116},300,function(){
                    });
                },100);
            },
            function(){
                var that=this;
                clearTimeout(item1Timer);

                $(that).find("span").animate({"top":140,"height":116},300);
            }
        )
});
</script> 
  
  <!--测试结束-->
  
  <div class="line-middle">
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix  ">
        <div> <a href="MyMattZj.html"><img src="/new/tpl/simplebootx/Public/images/index1.png" width="100%"> <span class="conss">
          <h4>我们的专家</h4>
          </span> </a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom ">
      <div class="media clearfix ">
        <div> <a href="Datingrobot.html"><img src="/new/tpl/simplebootx/Public/images/index2.png" width="100%"> <span class="conss">
          <h4>Mapp</h4>
          </span> </a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix ">
        <div> <a href="HyZmy.html"><img src="/new/tpl/simplebootx/Public/images/index3.png" width="100%"> <span class="conss">
          <h4>麦麦育儿机器人上市</h4>
          </span> </a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix ">
        <div> <a href="MymattXz.html"><img src="/new/tpl/simplebootx/Public/images/index4.png" width="100%"> <span class="conss">
          <h4>朱家雄教授</h4>
          </span> </a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix ">
        <div> <a href="Mbindex.html"><img src="/new/tpl/simplebootx/Public/images/index5.png" width="100%"><span class="conss">
          <h4>Mtoy</h4>
          </span></a> </div>
      </div>
    </div>
    <div class="xl6 xs4 xm2  margin-bottom">
      <div class="media clearfix">
        <div> <a href="Mymattsix.html"><img src="/new/tpl/simplebootx/Public/images/index6.png" width="100%"></a> <span class="conss">
          <h4>妈妈的分享</h4>
          </span> </div>
      </div>
    </div>
  </div>
</div>

<div class="container tc-main">
	
	
    <div class="pg-opt pin">
        <div class="container">
            <h2><?php echo ($name); ?></h2>
        </div>
    </div>
    <div class="row">
		<div class="span9">
			<div class="">
				<?php $lists = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",10); ?>
				<?php if(is_array($lists['posts'])): $i = 0; $__LIST__ = $lists['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta=json_decode($vo['smeta'], true); ?>
				
				<div class="list-boxes">
					<h2><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></h2>
					<p><?php echo (msubstr($vo["post_excerpt"],0,256)); ?></p>
					<div>
						<div class="pull-left">
							<div class="list-actions">
							<a href="javascript:;"><i class="fa fa-eye"></i><span><?php echo ($vo["post_hits"]); ?></span></a>
							<a href="<?php echo U('article/do_like',array('id'=>$vo['object_id']));?>" class="J_count_btn"><i class="fa fa-thumbs-up"></i><span class="count"><?php echo ($vo["post_like"]); ?></span></a>
							<a href="<?php echo U('user/favorite/do_favorite',array('id'=>$vo['object_id']));?>" class="J_favorite_btn" data-title="<?php echo ($vo["post_title"]); ?>" data-url="<?php echo U('portal/article/index',array('id'=>$vo['tid']));?>" data-key="<?php echo sp_get_favorite_key('posts',$vo['object_id']);?>">
								<i class="fa fa-star-o"></i>
							</a>
							</div>
						</div>
						<a class="btn btn-warning pull-right" href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>">查看更多</a>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</div>
			<div class="pagination">
				<ul>
					<?php echo ($lists['page']); ?>
				</ul>
			</div>
		</div>
		<div class="span3">
			<div class="tc-box first-box">
			<div class="headtitle">
          		<h2>分享</h2>
          	</div>
			<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqf" data-cmd="tqf" title="分享到腾讯朋友"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a></div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];</script>          
        	</div>
        	
        	<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>热门文章</h2>
	        	</div>
	        	<div class="ranking">
	        		<?php $hot_articles=sp_sql_posts("cid:$portal_index_lastnews;field:post_title,post_excerpt,tid,smeta;order:post_hits desc;limit:5;"); ?>
		        	<ul class="unstyled">
		        		<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): $top=$key<3?"top3":""; ?>
							<li class="<?php echo ($top); ?>"><i><?php echo ($key+1); ?></i><a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>最新评论</h2>
	        	</div>
	        	<div class="comment-ranking">
	        		<?php $last_comments=sp_get_comments("field:*;limit:0,5;order:createtime desc;"); ?>
	        		<?php if(is_array($last_comments)): foreach($last_comments as $key=>$vo): ?><div class="comment-ranking-inner">
	                        <i class="fa fa-comment"></i>
	                        <a href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["full_name"]); ?>:</a>
	                        <span><?php echo ($vo["content"]); ?></span>
	                        <a href="/new/<?php echo ($vo["url"]); ?>#comment<?php echo ($vo["id"]); ?>">查看原文</a>
	                        <span class="comment-time"><?php echo date('m月d日  H:i',strtotime($vo['createtime']));?></span>
	                    </div><?php endforeach; endif; ?>
                </div>
			</div>
			
			<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>最新加入</h2>
	        	</div>
	        	<?php $last_users=sp_get_users("field:*;limit:0,8;order:create_time desc;"); ?>
	        	<ul class="list-unstyled tc-photos margin-bottom-30">
	        		<?php if(is_array($last_users)): foreach($last_users as $key=>$vo): ?><li>
	                    <a href="<?php echo U('user/index/index',array('id'=>$vo['id']));?>">
	                    <img alt="" src="<?php echo U('user/public/avatar',array('id'=>$vo['id']));?>">
	                    </a>
                    </li><?php endforeach; endif; ?>
                </ul>
			</div>
			
			<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>最新发布</h2>
	        	</div>
	        	<?php $last_post=sp_sql_posts("cid:$portal_last_post;field:post_title,post_excerpt,tid,smeta;order:listorder asc;limit:4;"); ?>
	        	<div class="posts">
	        		<?php if(is_array($last_post)): foreach($last_post as $key=>$vo): $smeta=json_decode($vo['smeta'],true); ?>
			        	<dl class="dl-horizontal">
				            <dt>
					            <a class="img-wraper" href="<?php echo U('article/index',array('id'=>$vo['tid']));?>">
					            	<?php if(empty($smeta['thumb'])): ?><img src="/new/tpl/simplebootx/Public/images/default_tupian4.png" class="img-responsive" alt="<?php echo ($vo["post_title"]); ?>"/>
									<?php else: ?> 
										<img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" class="img-responsive img-thumbnail" alt="<?php echo ($vo["post_title"]); ?>" /><?php endif; ?>
					            </a>
				            </dt>
				            <dd><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo msubstr($vo['post_excerpt'],0,32);?></a></dd>
				        </dl><?php endforeach; endif; ?>
		        </div>
			</div>
			
			<?php $ad=sp_getad("portal_list_right_aside"); ?>
			<?php if(!empty($ad)): ?><div class="tc-box">
	        	<div class="headtitle">
	        		<h2>赞助商</h2>
	        	</div>
	        	<div>
		        	<?php echo ($ad); ?>
		        </div>
			</div><?php endif; ?>
		</div>
    </div>
    
    
    <br><br><br>
<!-- Footer
      ================================================== -->
      <hr>
<?php echo hook('footer');?>
      <div id="footer">
        <div class="links">
        <?php $links=sp_getlinks(); ?>
        <?php if(is_array($links)): foreach($links as $key=>$vo): ?><a href="<?php echo ($vo["link_url"]); ?>" target="<?php echo ($vo["link_target"]); ?>"><?php echo ($vo["link_name"]); ?></a><?php endforeach; endif; ?>
        </div>
        <p>
        Made by <a href="http://www.thinkcmf.com">ThinkCMF</a>
        Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" rel="nofollow" target="_blank">Apache License v2.0</a>.<br/>
        Based on <a href="http://getbootstrap.com/2.3.2/" target="_blank">Bootstrap</a>.  Icons from <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">Font Awesome</a>
        </p>
      </div>
      <div id="backtotop"><i class="fa fa-arrow-circle-up"></i></div>
      <?php echo ($site_tongji); ?>

</div>

    
<!-- JavaScript -->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/new/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/new/statics/js/jquery.js"></script>
    <script src="/new/statics/js/wind.js"></script>
    <script src="/new/tpl/simplebootx/Public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script src="/new/statics/js/frontend.js"></script>
	<script>
	$(function(){
		$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		
		$("#main-menu li.dropdown").hover(function(){
			$(this).addClass("open");
		},function(){
			$(this).removeClass("open");
		});
		
		$.post("<?php echo U('user/index/is_login');?>",{},function(data){
			if(data.status==1){
				if(data.user.avatar){
					$("#main-menu-user .headicon").attr("src",data.user.avatar.indexOf("http")==0?data.user.avatar:"/new/data/upload/avatar/"+data.user.avatar);
				}
				
				$("#main-menu-user .user-nicename").text(data.user.user_nicename!=""?data.user.user_nicename:data.user.user_login);
				$("#main-menu-user li.user.login").show();
				
			}
			if(data.status==0){
				$("#main-menu-user li.user.offline").show();
			}
			
		});	
		;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd=$(window).scrollTop();
							if(sd>100){
								$this.fadeIn();
							}else{
								$this.fadeOut();
							}
						}
					});
					
					$this.click(function(){
						scrolling=true;
						$('html, body').animate({
							scrollTop : 0
						}, 500,function(){
							scrolling=false;
							$this.fadeOut();
						});
					});
				});
			};
		})(jQuery); 
		
		$("#backtotop").totop();
		
		
	});
	</script>


</body>
</html>