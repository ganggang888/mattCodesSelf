<?php
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


/*$day = I('get.day');
$tid = I('get.tid');
$days = date("Y-m-d",strtotime($day));
$times = date("H-i-s",strtotime($day));

//该时间已预约的人数
$number = M('yuyue')->where("dates = $days AND tid = $tid AND status != 8")->count();

//获取该天总人数
$week = date("w", strtotime($day));
$week == 0 ? $week = 7 : '';
$where = sprintf("parent = %d AND status = 1 AND week = %d ", $id, $week);

$number = $model->query("SELECT SUM(`number`) AS num FROM g_reservation_info WHERE $where"); //总数

$info = M('reservation_info')->where($where)->order("fromeTime ASC")->select();
foreach ($info as $vo) {
  $vo['now'] = M('yuyue')->where("dates = $days AND tid = $tid AND status != 8 AND times < $vo[totime] AND times >= $vo[frometime]")->count();
  $data[] = $vo;
}





*/

$time = date("YmdHi");
$pass = "10657109084120Mattkaroro72".date("YmdHi");
var_dump(file_get_contents("http://211.136.163.68:8000/httpreport.sms?eid=10657109084120&timestamp=$time&urlencoding=on&comment=off&keepdeliver=false&auth=".md5($pass)));

var_dump(date("Y-m-d","2016-09-08 +1 day"));

var_dump(base64_encode("you are stupid"));
var_dump(base64_encode('. .-- ----. .---- .. --. ..-. -.-- --.. ... -... --.. -.. .... ...- .-- .- .-- --.- '));

var_dump(base64_decode('LiAuLS0gLS0tLS4gLi0tLS0gLi4gLS0uIC4uLS4gLS4tLSAtLS4uIC4uLiAtLi4uIC0tLi4gLS4uIC4uLi4gLi4uLSAuLS0gLi0gLi0tIC0tLi0g'));
echo "<hr/>";
var_dump(md5("22738910dcac0322df2c090d3e".date("YmdH")));
echo "<hr/>";
var_dump(md5(123456));