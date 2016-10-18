<?php
set_time_limit(0);
function addOpenfireUsers($userid, $plainpwd, $uname, $email)
{
    error_reporting(0);
    $url = "http://120.131.81.178:9090/plugins/userService/userservice?type=add&secret=pI5w95oM&username=" . $userid . "&password=3d3bae6a-729c-3649-7728-57439a6773cc&name=" . $uname . "&email=" . $email . "&groups='user'";

    //fastcgi_finish_request();
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $output = curl_exec($ch);

    /*
    $curl = new curl_multi();
    $curl->setUrlList($url);
    $output=$curl->execute();
    */
    if (strstr($output, 'OK')) {
        return true;
    } else {
        return true;
    }
    fclose($f);

}
/*mysql_connect("localhost","root","karoro111");
mysql_select_db("mattopenfire");
$info = mysql_query("SELECT username FROM ofUser ");
$result = mysql_fetch_array($info);

array_map(function($v){addOpenfireUsers($v['username'],$password1,'','');},$result);
var_dump($result);*/
addOpenfireUsers("18816978529",$password1,'','');




//post
/*function postRequest( $api, $params, $timeout = 30 ) {
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $api );
    // 以返回的形式接收信息
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    // 设置为POST方式
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
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
$a = postRequest("http://120.131.81.178:9090/plugins/userService/users",'<?xml version="1.0" encoding="UTF-8" standalone="yes"?> <user> <username>18816978523</username> <password>123456a</password> </user>',5);




var_dump($a);*/