<?php
error_reporting(E_ALL);
/**
 * CURL下载文件 成功返回文件名，失败返回false
 * @param $url
 * @param string $savePath
 * @return bool|string
 * @author Zou Yiliang
 */
function httpcopy($url, $file="", $timeout=60) {
  $file = empty($file) ? pathinfo($url,PATHINFO_BASENAME) : $file;
  $dir = pathinfo($file,PATHINFO_DIRNAME);
  !is_dir($dir) && @mkdir($dir,0755,true);
  $url = str_replace(" ","%20",$url);
  
  if(function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $temp = curl_exec($ch);
    if(@file_put_contents($file, $temp) && !curl_error($ch)) {
      return $file;
    } else {
      return false;
    }
  } else {
    $opts = array(
      "http"=>array(
      "method"=>"GET",
      "header"=>"",
      "timeout"=>$timeout)
    );
    $context = stream_context_create($opts);
    if(@copy($url, $file, $context)) {
      //$http_response_header
      return $file;
    } else {
      return false;
    }
  }
}


	$a = httpcopy("http://app.mattservice.com/mediaUpLoad/gamepool/11edb875-3b1a-879a-996f-44409fa9468f.mp4",'1.mp4');
	var_dump($a);