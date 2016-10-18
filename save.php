<?php
set_time_limit(0);

//post请求
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

//开始进行注册一个帐号
function register($phone)
{
	$array = array('phone'=>$phone,'password1'=>'123456','password2'=>'123456','uuid'=>'062183bb-1466-1e91-9156-62dd9cbc248f');
	$response = postRequest("http://app.mattservice.com/?keys=JYTgTUN5o8t4",$array);
	return $response;
}
var_dump($a);
for ($i=100;$i<=105;$i++) {
	$phone = '16699999'.$i;
	register($phone);
}


