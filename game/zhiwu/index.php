
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>麦麦育儿机器人-僵尸大战植物</title>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="full-screen" content="yes"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <style>
        body, canvas, div {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
    </style>
</head>
<body style="padding:0; margin: 0; background: #000;" >
<canvas id="gameCanvas" width="800" height="450"></canvas>
<script>
function toShare(a)
{
	$(document).attr("title",'我在麦麦育儿机器人-麦麦游戏，僵尸大战植物里消灭了'+a+'个植物，快来和我一起玩吧 http://qr.mattservice.com');//修改title值
	$(".bdsharebuttonbox").show(500);
	
	//window.location.href='http://qr.mattservice.com?number='+a;
}
</script>

<script src="game.min.js"></script>


<div class="bdsharebuttonbox" style="position:fixed; bottom:0px; margin:0 auto; left:0; right:0; display:none;text-align:center; width:230px"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>

</body>
</html>