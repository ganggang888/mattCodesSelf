<?php
$students = array(
	256=>array('name'=>'Join','grade'=>98.5),
	2=>array('name'=>'Vance','grade'=>85.1),
	9=>array('name'=>'stephen','grade'=>94.0),
	346=>array('name'=>'steve','grade'=>85.1),
	68=>array('name'=>'Rob','grade'=>74.6),
);
function name_sort($x,$y) {
	return strcasecmp($x['grade'],$y['grade']);
}

function grade_sort($x,$y) {
	return ($x['grade'] < $y['grade']);
}

uasort($students, 'name_sort');
var_dump($students);
uasort($students, 'grade_sort');
var_dump($students);

function list_dir($start) {
	$contents = scandir($start);
	foreach ($contents as $item) {
		if (is_dir("$start/$item") && (substr($item,0,1) != '.')) {
			list_dir("$start/$item");
		} else {
			
		}
	}
}