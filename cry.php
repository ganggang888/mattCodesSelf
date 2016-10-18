
<?php
/*
function GetIP(){ 
if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
$ip = getenv("HTTP_CLIENT_IP"); 
else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
$ip = getenv("HTTP_X_FORWARDED_FOR"); 
else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
$ip = getenv("REMOTE_ADDR"); 
else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
$ip = $_SERVER['REMOTE_ADDR']; 
else 
$ip = "unknown"; 
return($ip); 
}


$a  =  '1.234' ;
 $b  =  '5' ;

echo  bcadd ( $a ,  $b );      // 6
echo  bcadd ( $a ,  $b ,  4 );   // 6.2340
echo "<hr />";
$num = "18816978523";
var_dump(strlen($num));
*/
header("Content-Type: text/html; charset=UTF-8");

function apiGet($urls, array $array)
{
    $url = $urls . "?".http_build_query($array);
    $ch = curl_init($url) ;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
    //curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
    curl_setopt($ch, CURLOPT_TIMEOUT,1000);
    $output = curl_exec($ch);
    return $output;
}
$do = apiGet("http://www.12333sh.gov.cn/wsbs/zypxjd/jnjd/jdcx/cjcx.jsp",array('action'=>'query','idcard'=>'34081119900826402X','zjhm'=>'','sj_mima1'=>'ckdz'));


function getAddress($ip)
{
	$ch = curl_init("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=".$ip) ;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
    //curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
    curl_setopt($ch, CURLOPT_TIMEOUT,1000);
    $output = curl_exec($ch);
    curl_close($ch);
    if (strlen($output) < 50) {
    	return false;
    }
    var_dump($output);
    preg_match_all('/(?<=\{)([^\}]*?)(?=\})/' , $output , $info);
    $result = '{'.$info[0][0].'}';
    $result = json_decode($result,true);
    $address = $result['country'].'-'.$result['province'].'-'.$result['city'];
    return $address;
}
$re = getAddress("117.131.91.38");
echo $re;
echo "<hr/>";
//获取客户端IP
    function GetIP(){
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif(!empty($_SERVER["REMOTE_ADDR"])){
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else{
            $cip = false;
        }
        return $cip;
    }

var_dump(GetIP());

echo "<hr/>";
$vo['type'] = ($vo['type'] == 1 ? '请求与你分享' : '请求与你关联');
var_dump($vo);

echo "<hr/>";
$term = array(
            array('id'=>1,'name'=>'9-12个月教具'),
            array('id'=>2,'name'=>'5-8个月教具'),
            array('id'=>3,'name'=>'0-4个月教具'),
        );
$haha = array_search('1',$term);
var_dump($haha);
echo "<hr/>";
var_dump(file_get_contents("http://www.lgxc.gov.cn/home.aspx"));