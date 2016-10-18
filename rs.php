<?php
$url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=Ra-gy1TYYs1ZySWbXnXXXVxMDhLl9ZcWbIinFXkIq5WCheXNKShLKKUdyFP9a6u83tfL0ApnY_R8SXs8f2m_xY5xtAbtdqyCXh3CiLzL4fIBUVcAEAXQR";
/**
 * 发起一个post请求到指定接口
 * 
 * @param string $api 请求的接口
 * @param array $params post参数
 * @param int $timeout 超时时间
 * @return string 请求结果
 */
function postRequest( $api,$params, $timeout = 30 ) {
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $api );
    // 以返回的形式接收信息
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    // 设置为POST方式
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS,$params );
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
$array = array(
	'type'=>'news',
	'offset'=>0,
	'count'=>20
);
/**
 * Returns the url query as associative array
 *
 * @param    string    query
 * @return    array    params
 */
function convertUrlQuery($query)
{
    $queryParts = explode('&', $query);
    $params = array();
    foreach ($queryParts as $param)
    {
        $item = explode('=', $param);

        $params[$item[0]] = $item[1];
    }
    return $params;
}
$url = "http://www.baidu.com/index.php?sn=6965-65EA-6965-5FBF";
$row = parse_url($url);
var_dump($row['query']);
var_dump(convertUrlQuery($row['query']));
var_dump(time());
echo "<hr/>";
var_dump(unserialize(''));