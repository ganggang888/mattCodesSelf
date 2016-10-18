<?php

//截图source_path图片地址，target_width宽target_height高
function imagecropper($source_path, $target_width, $target_height,$name){
  $source_info = getimagesize($source_path);
  $source_width = $source_info[0];
  $source_height = $source_info[1];
  $source_mime = $source_info['mime'];
  $source_ratio = $source_height / $source_width;
  $target_ratio = $target_height / $target_width;
   
  // 源图过高
  if ($source_ratio > $target_ratio){
    $cropped_width = $source_width;
    $cropped_height = $source_width * $target_ratio;
    $source_x = 0;
    $source_y = ($source_height - $cropped_height) / 2;
  }elseif ($source_ratio < $target_ratio){ // 源图过宽
    $cropped_width = $source_height / $target_ratio;
    $cropped_height = $source_height;
    $source_x = ($source_width - $cropped_width) / 2;
    $source_y = 0;
  }else{ // 源图适中
    $cropped_width = $source_width;
    $cropped_height = $source_height;
    $source_x = 0;
    $source_y = 0;
  }
   
  switch ($source_mime){
    case 'image/gif':
      $source_image = imagecreatefromgif($source_path);
      break;
     
    case 'image/jpeg':
      $source_image = imagecreatefromjpeg($source_path);
      break;
     
    case 'image/png':
      $source_image = imagecreatefrompng($source_path);
      break;
     
    default:
      return false;
      break;
  }
   
  $target_image = imagecreatetruecolor($target_width, $target_height);
  $cropped_image = imagecreatetruecolor($cropped_width, $cropped_height);
   
  // 裁剪
  imagecopy($cropped_image, $source_image, 0, 0, $source_x, $source_y, $cropped_width, $cropped_height);
  // 缩放
  imagecopyresampled($target_image, $cropped_image, 0, 0, 0, 0, $target_width, $target_height, $cropped_width, $cropped_height);
  $dotpos = strrpos($source_path, '.');
  $imgName = substr($source_path, 0, $dotpos);
  $suffix = substr($source_path, $dotpos);
  $imgNew = $name;
  imagejpeg($target_image, $imgNew, 100);
  imagedestroy($source_image);
  imagedestroy($target_image);
  imagedestroy($cropped_image);
}
var_dump(log(2,8));

function logs($a,$b){
  $i=1;
  $x = $a;
  do {
    $a = $a * $x;
    $i++;
  }
  while ($a<$b);
  return $i;
}
var_dump(logs(3,9));