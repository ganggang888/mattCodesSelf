<?php
$a = array(
array('key1'=>940,'key2'=>'blash'),
array('key1'=>23,'key2'=>'this'),
array('key1'=>894,'key2'=>'that'),
);
function asc_number_sort($x,$y) {
	if ($x['key1'] > $y['key1']) {
		return true;
	} elseif ($x['key1'] < $y['key1']) {
		return false;
	} else {
		return 0;
	}
}
//usort($a,'asc_number_sort');
//var_dump($a);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form action="?" method="post" enctype="multipart/form-data">
<input type="file" name="upload" />
<input type="submit" />
</form>
<?php
var_dump($_FILES);
?>
</body>
</html>
