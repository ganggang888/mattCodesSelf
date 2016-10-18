<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>Qampp 管理平台</title>
<style type="text/css">
    *{padding: 0px; margin: 0px;}
    html,body,table{width: 100%; height: 100%; font-size: 14px; overflow: hidden;}
    table{border-collapse: collapse;}
    td#iframecont{text-align: left;}
    td#meun_list{vertical-align: top; width: 100px; border-right:2px solid #8896AA; padding: 10px; line-height: 22px;}
    td#meun_list a{color: #4A4D64; text-decoration: none;}
    td#meun_list a:hover{color: red;}
</style>
 
<script type="text/javascript" src="http://127.0.0.1/qampp_api/javascript/jquery.min.js"></script>
 
<script type="text/javascript">
    $(function(){
        iframe_onresize();
        window.onresize=iframe_onresize;
        
        $('#meun_list a').click(function (d){
            $('.links').html('127.0.0.1'+$(this).attr('href'));
        })
    })
     
    function iframe_onresize(){
        var h = $('#if').height();
        $('iframe').css('height',h+'px');
        $('.th_note').text('height: '+h+'px');
    }
     
</script>
 
</head>
<body>
<table>
    <tr><td colspan="2" style="height:30px; border-bottom: 2px solid #8896AA;"><img src="./qampp.jpg" /></td>
    </tr>
     
    <tr><td id="meun_list">
    <a href="./phpinfo.php" target="main">phpinfo</a><br />
    <a href="/server-status" target="main">server-status</a><br />
    <a href="/server-info" target="main">server-info</a> <br />
    <a target="_blank" href="/phpmyadmin">phpmyadmin</a><br />
    <hr  style="margin: 10px 0px;"/>
    <a target="main" href="/qampp_api/source.phps">演示phpsource</a><br />
    <a target="main" href="/qampp_api/cgi.phpc">演示phpcgi</a><br />
    <a target="main" href="/qampp_api/perl.pl">演示perl</a><br />
    <hr  style="margin: 10px 0px;"/>
    <a target="main" href="/qampp_api/qadmin.php">Qadmin</a><br />
    <a target="main" href="http://www.os688.com/qampp.html">技术区</a>
    </td>
     
    <td id="iframecont">
        <iframe name="main" style="border: none; display: block; height: 100%; width: 100%; overflow-y: scroll;" src="./phpinfo.php"></iframe>
    </td>
     
    </tr>
    <tr><td colspan="2" style="height:30px; border-top: 2px solid #8896AA;">欢迎使用Qampp 当前链接:<span class="links">127.0.0.1/qampp/phpinfo.php</span></td></tr>
</table>
 
</body>
</html>