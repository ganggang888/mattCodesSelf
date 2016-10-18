<?php
include "phpqrcode.php";
require_once ('water.php');
 // 二维码数据
   $data = 'http://www.baidu.com/';   
   // 纠错级别：L、M、Q、H
   $errorCorrectionLevel = 'H'; 
   // 点的大小：1到10
   $matrixPointSize = 18; 
    // 生成的文件名
  $filename = "images/".time().".png";
   QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 0,false,"39,40,34");
   echo "<img src=".$filename." />";
   $logo = './logo2.jpg';    // 中间那logo图
   $newPic = $filename;
   
   $img = img_water_mark($newPic,"logo.png");
   var_dump($img);
?>