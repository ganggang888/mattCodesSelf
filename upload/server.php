<?php
$name = isset($_POST['name'])? $_POST['name'] : '';
$gender = isset($_POST['gender'])? $_POST['gender'] : '';

$filename = time().substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'],'.'));

$response = array();

if(move_uploaded_file($_FILES['photo']['tmp_name'], $filename)){
    $response['isSuccess'] = true;
    $response['name'] = $name;
    $response['gender'] = $gender;
    $response['photo'] = $filename;
}else{
    $response['isSuccess'] = false;
}
$ch = curl_init();
$post_data = array(
    'key' => md5("shanghaimaite".date("Y-m-d")),
    'type' => '1',
    'uploadmedia' => '@'.dirname(__FILE__)."/".$filename,
);
curl_setopt($ch, CURLOPT_HEADER, false);
//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
curl_setopt($ch, CURLOPT_URL, 'http://app.mattservice.com/info/index.php?g=portal&m=page&a=saveImg');
$info= curl_exec($ch);
curl_close($ch);
print_r($info);
echo json_encode($response);
?>