<?php
define("COOKIE_INFO","Manage=67E4E6B5A8D08FC6B8784915172F90DE7F8FFDCF243D1111015CC9B66EA2FE199D9A7AA2B85960C52F303F30EAB5BE5739B392C5B4CE79383CCB31BF2B02EB7F4D1B96F4245F84C366EB3F666217957490E94175415F3B44C3958995ACE118E9DA62CA3D16C20AB75F6E050B7F7FCE85623CB534D880C9F09FB0A0DD02CEE1C07885ECB68C69C23D5B952103FD503F4D69BA8A8AC0342475C93B265045A0FC9DDF07C17DA608B6869965ED6A0C312D26C3CA10B2A5DBA59AEA30F63217168FD5CF73B86262125B40D9378C433E17E3AB906BE3B89DEE76D8349AFA566B48B45F5B882AA1");

function curl_get($url)
{
        $cookie_jar = tempnam('./tmp','cookie');
        $ch = curl_init($url) ;
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, COOKIE_INFO);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ; // 获取数据返回
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($ch, CURLOPT_TIMEOUT,1000);
        curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie_jar);
        $output = curl_exec($ch) ;
        return $output;
}

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
    curl_setopt($ch, CURLOPT_COOKIE, COOKIE_INFO);
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

/*$response = postRequest( $api . '/sms/sendmsg', array(
    'appkey' => $appkey,
    'phone' => $phone,
    'zone' => '86',
) );*/

for ($i=1;$i<=100;$i++) {
    $row = curl_get("http://oa.mattservice.com/admin/Assessment/WorkTime.aspx");
    //print_r($row);exit;
    preg_match_all('|value="(.*)"|isU',$row,$arr); //匹配到数组$arr中;
    $__VIEWSTATE = $arr[1][0];
    $__EVENTVALIDATION = $arr[1][1];
    //var_dump($arr);var_dump($__EVENTVALIDATION);
    $Button1 = "上班签到";
    //var_dump($__VIEWSTATE);var_dump($__EVENTVALIDATION);var_dump($Button1);exit;
    $response = postRequest("http://oa.mattservice.com/admin/Assessment/WorkTime.aspx",array(
        '__VIEWSTATE'=>$__VIEWSTATE,
        '__VIEWSTATEGENERATOR'=>$arr[1][0],
        '__EVENTVALIDATION'=>$arr[1][2],
        '__EVENTTARGET'=>'',
        '__EVENTARGUMENT'=>'',
        'Button1'=>$Button1,
    ));
    print_r($response);
    print_r($arr[1]); //$arr[1]就是匹配的结果
    print_r($row);
    sleep(3);
}
