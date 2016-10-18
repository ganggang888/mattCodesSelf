<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$id = $_GET['id'];
/*
 * 加密
 * @param $str 要加密的字符串
 * @param $action 执行的动作,1:加密;0:解密
 */
function DoMcrypt($str,$action){
	$key = ">.t;GHl=oV/_6V!(aHPj#;>t=uKn)j;Z";
	$cipher = MCRYPT_RIJNDAEL_128;
	$mode = MCRYPT_MODE_ECB;
	//$iv = mcrypt_create_iv(mcrypt_get_iv_size($cipher, $mode),MCRYPT_RAND);
	if($action ==1){
		$value = mcrypt_encrypt($cipher, $key, $str, $mode);
		return base64_encode($value);
	}else if ($action == 0){
		$str = base64_decode($str);
		return trim(mcrypt_decrypt($cipher, $key, $str, $mode));
	}
}
$id = DoMcrypt($id,0);
var_dump($id);exit;
/**
 * 发起一个post请求到指定接口
 * 
 * @param string $api 请求的接口
 * @param array $params post参数
 * @param int $timeout 超时时间
 * @return string 请求结果
 */
function postRequest( $api, array $params = array(), $timeout = 30 ) {
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $api );
    // 以返回的形式接收信息
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    // 设置为POST方式
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
    // 不验证https证书
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
        'Accept: application/json',
    ) ); 
    // 发送数据
    $response = curl_exec( $ch );
    // 不要忘记释放资源
    curl_close( $ch );
    return $response;
}

$key = md5(date("Y-m-d").'dshaudioshASHUIHyuwnk');
// 发送验证码
$response = postRequest('http://app.mattservice.com/info/index.php?g=portal&m=index&a=selectInfo', array(
    'key' => $key,
    'id' => $id,
) );
$row = json_decode($response,true);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$row['list']['title'];?></title>
</head>
<embed src="<?=$row['list']['media'];?>" width="100%;"></embed>
<body>
</body>
</html>

