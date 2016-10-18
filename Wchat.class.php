<?php
/**
 *获取与素材信息
*/
error_reporting(0);
//curl获取GET请求
function resquestGet($url = '', array $info) {
	if (!is_array($info)) {
		exit('Missing parameters');
	}
	$after = http_build_query($info);
	$lastUrl = $url.'?'.$after;
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $lastUrl);
	//curl_setopt($curl, CURLOPT_HEADER, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//https形式
	$data = curl_exec($curl);
	curl_close($curl);
	return $data;
}

/**
 * 发起一个post请求到指定接口
 * 
 * @param string $api 请求的接口
 * @param array $params post参数
 * @param int $timeout 超时时间
 * @return string 请求结果
 */
function postRequest( $api, $params, $timeout = 30 ) {
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $api );
    // 以返回的形式接收信息
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    // 设置为POST方式
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
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
class Wchat
{
	private $appId = null; //AppID
	private $secret = null; //AppSecret
	public function __construct($appId,$secret)
	{
		$this->appId = $appId;
		$this->secret = $secret;
	}

	//获取accessToken
	public function accessToken()
	{
		if (!$_COOKIE['accessToken']) {

			$data = array(
                    'grant_type'=>'client_credential',
                    'appid'	=>	$this->appId,
                    'secret'=>	$this->secret,
                );
            $tokenInfo = resquestGet('https://api.weixin.qq.com/cgi-bin/token', $data);
			$array = json_decode($tokenInfo,true);
			$token = $array['access_token'];
			setcookie("accessToken",$token, time()+3600*1);
			return $_COOKIE['accessToken'];
		} else {
			return $_COOKIE['accessToken'];
		}
	}

	//获取素材总条数、
	public function materialcount()
	{
		$data = array(
			'access_token'=>$this->accessToken(),
		);
		$allCount = resquestGet('https://api.weixin.qq.com/cgi-bin/material/get_materialcount', $data);
		$array = json_decode($allCount,true);
		if ($array['news_count']) {
			return $array['news_count'];
		} else {
			return false;
		}
	}

	//获取素材列表信息
	public function getMaterials($offset,$count)
	{
		$all = $this->materialcount();
		if (!$all || ($offset > $all)) {
			return false;
		}
		$listInfo = postRequest("https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".$this->accessToken(),json_encode(array('type'=>'news','offset'=>$offset,'count'=>$count)));
		$array = json_decode($listInfo,true);
		if (!$array['item']) {
			return false;
		} else {
			$allPage = intval($all / $count) + 1;
			return array('page'=>array('fistRow'=>$offset,'listRows'=>$count,'allPage'=>$allPage),'lists'=>$array['item']);
		}
	}


	//获取分页信息并存入mongoDb
	public function getAll()
	{
		$number = $this->materialcount();
		$all = intval($number / 20) + 1;
		for ($i = 0;$i<$all;$i++) {
			$fistRow = $i * 20;
			$listRows = 20 -1;
			$infos = $this->getMaterials($fistRow,$listRows);
			foreach ($infos['lists'] as $vo) {
				foreach ($vo['content']['news_item'] as $v) {
					$v['update_time'] = $vo['update_time'];
					$data[] = $v;
				}
			}
		}
		return $data;
	}

}





$result = new Wchat("wx2f971a9e879b1b05","b2aad035cbabe27b7b379177890177fa");
$number = $result->getAll();
/*var_dump($number);
$all = intval($number / 20) + 1;

for ($i=0;$i<$all;$i++) {
	$fist = $i * 20;
	if ($fist != 0) {
		$fist += 1;
	}
	var_dump($fist);
	$listRows = 20;
}*/
/*var_dump($all);exit;
var_dump($number);*/
var_dump($number);
$lists = $result->getMaterials(0,25);
var_dump($lists['lists'][0]['content']['news_item']['0']);
var_dump($_COOKIE['accessToken']);