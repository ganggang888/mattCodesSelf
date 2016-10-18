<?php
/*
*@通过curl方式获取指定的图片到本地
*@ 完整的图片地址
*@ 要存储的文件名
*/
function getImg($url = "", $filename = "")
{
 //去除URL连接上面可能的引号
  //$url = preg_replace( '/(?:^['"]+|['"/]+$)/', '', $url );
  $hander = curl_init();
  $fp = fopen($filename,'wb');
  curl_setopt($hander,CURLOPT_URL,$url);
  curl_setopt($hander,CURLOPT_FILE,$fp);
  curl_setopt($hander,CURLOPT_HEADER,0);
  curl_setopt($hander,CURLOPT_FOLLOWLOCATION,1);
  //curl_setopt($hander,CURLOPT_RETURNTRANSFER,false);//以数据流的方式返回数据,当为false是直接显示出来
  curl_setopt($hander,CURLOPT_TIMEOUT,60);
  curl_exec($hander);
  curl_close($hander);
  fclose($fp);
  Return true;
}
function curl_get($url)
{
    $ch = curl_init($url) ;
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 100) ; // 获取数据返回
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
    curl_setopt($ch, CURLOPT_TIMEOUT,1000);
    $output = curl_exec($ch) ;
    return $output;
}
  /*
   * 注册加密
   * @param $str 要加密的字符串
   * @param $action 执行的动作,1:加密;0:解密
   * 
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
$array = array(
  array('weight'=>'50.16','height'=>'30.14'),
  array('weight'=>'20.16','height'=>'90.14'),
  array('weight'=>'70.16','height'=>'1.14'),
  array('weight'=>'60.16','height'=>'990.14'),
  
);
$data[] = '23.6';
$data[] = '14.6';
$data[] = '223.6';
var_dump(min($data));