<?php
$array = array(
    'height'=>123456,
    'width'=>124578,
    'info'=>'',
);
foreach ($array as $key=>$vo) {
    !$vo ? $array[$key] = 0 : '';
}
var_dump($array);
$handBookId=1020;
$array = array(
    'handbookId'=>1020,
    'handbookId'=>1216
);
$info = time().'2410';
var_dump(substr($info,10,100));
var_dump(time());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<?php
if ($_FILES) {
	var_dump(pathinfo($_FILES['tmp_name']));
	var_dump($_FILES);exit;
}
	

?>
<body>
<form method="post" enctype="multipart/form-data" action="" >
<input type="file" name="upload" />
<input type="submit" />
</form>

</body>
</html>
