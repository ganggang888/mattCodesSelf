<?php
$a = array(
	array('key1'=>940,'key2'=>'blah'),
	array('key1'=>23,'key2'=>'this'),
	array('key1'=>894,'key2'=>'that'),
);
function asc_number_sort($x,$y) {
	if($x['key1'] > $y['key1']) {
		return true;
	} elseif($x['key1'] < $y['key2']) {
		return false;
	} else {
		return 0;
	}
}
usort($a, 'asc_number_sort');
var_dump($a);
function string_sort($x,$y) {
	//strcasecmp(str1, str2) 二进制两个数进行比较
	return strcasecmp($x['key2'],$y['key2']);
}
usort($a,'string_sort');
var_dump($a);