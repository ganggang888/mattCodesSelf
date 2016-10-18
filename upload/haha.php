<?php
/*function upload_file($url,$r_file)
 {
    $file = array("fax_file"=>'@'.$r_file,'type'=>'image/jpeg');//文件路径，前面要加@，表明是文件上传.
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_POST,1);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$file);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    $result = curl_exec($curl);  //$result 获取页面信息 
    curl_close($curl);
    echo $result ; //输出 页面结果
}
$info = upload_file("http://app.mattservice.com/info/index.php?g=portal&m=page&a=tessss","D:\upupw\htdocs\upload\1449211770.jpg");
var_dump($info);*/

$ch = curl_init();
$post_data = array(
    'loginfield' => 'username',
    'username' => 'ybb',
    'password' => '123456',
    'file' => '@D:\upupw\htdocs\upload\1449211770.jpg'
);
curl_setopt($ch, CURLOPT_HEADER, false);
//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
curl_setopt($ch, CURLOPT_URL, 'http://app.mattservice.com/info/index.php?g=portal&m=page&a=tessss');
$info= curl_exec($ch);
curl_close($ch);
   
print_r($info);

//2.http://www.b.com/handleUpload.php
/*
function handleUpload(){
print_r($_POST);
echo '===file upload info:';
print_r($_FILES);
}*/