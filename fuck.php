<?php
$array = array(1,8,6,9,1,3);
for ($i=1;$i<=count($array);$i++) {
	for ($j=count($array);$j>=$i;$j--) {
		if ($array[$j] >= $array[$j-1]) {
			$k = $array[$j];
			$array[$j]=$array[$j-1];
			$array[$j-1]=$k;
		}
	}
}
var_dump($array);
print_r(unserialize(""));
function list_dir($item)
{
	$content = scandir($item);
	foreach ($content as $vo) {
		if (is_dir("$item/$vo") && (substr($vo,0,1) != '.')) {
			list_dir("$item/$vo");
		} else {

		}
	}
}

$array = (1,3,5,8,4,2,1,48);
for ($i=1;$i<=count($array);$i++) {
	for ($j=count($array);$j>=$i;$j--) {
		if ($array[$j] > $array[$j-1]) {
			$k = $array[$j-1];
			$array[$j-1] = $array[$j];
			$array[$j] = $k;
		}
	}
}

function list_dir($start) {
	$content = scandir($start);
	foreach ($content as $vo) {
		if (is_dir("$start/$vo") && (substr($vo,0,1) != '.')) {
			list_dir("$start/$vo");
		} else {

		}
	}
}

function houzi($m,$n) {
	$r = 1;
	for ($i=2;$<=$n;$i++) {
		$r = ($r+$m) *$i;
	}
	return $r+1;
}