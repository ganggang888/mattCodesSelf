<?php
function fetchDir($dir) { 
    foreach(glob($dir.'\*') as $file) { 
        echo $file,"\n"; 
        if(is_dir($file)) { 
            fetchDir($file); 
        } 
    } 
}
function make_list($parent,$all = null) {
	static $tasks;
	if (isset($all)) {
		$tasks = $all;
	}
}
$array = array(
	array(
		'From_Time'=>'9:00',
		'To_Time'=>'10:00',
		'title'=>'1',
	),
	array(
		'From_Time'=>'9:00',
		'To_Time'=>'10:00',
		'title'=>'3',
	),
	array(
		'From_Time'=>'9:00',
		'To_Time'=>'10:00',
		'title'=>'娃哈哈',
	),
	array(
		'From_Time'=>'9:00',
		'To_Time'=>'10:00',
		'title'=>'7',
	),

	array(
		'From_Time'=>'10:00',
		'To_Time'=>'11:00',
		'title'=>'9',
	),

	array(
		'From_Time'=>'10:00',
		'To_Time'=>'11:00',
		'title'=>'11',
	),
	array(
		'From_Time'=>'8:00',
		'To_Time'=>'15:00',
		'title'=>'19',
	),
	array(
		'From_Time'=>'15:00',
		'To_Time'=>'16:00',
		'title'=>'28',
	),
	array(
		'From_Time'=>'15:00',
		'To_Time'=>'16:00',
		'title'=>'29',
	),
	array(
		'From_Time'=>'15:00',
		'To_Time'=>'16:10',
		'title'=>'你好吗',
	),
	array(
		'From_Time'=>'8:00',
		'To_Time'=>'18:00',
		'title'=>'小小白啊',
	),
	array(
		'From_Time'=>'9:00',
		'To_Time'=>'10:00',
		'title'=>'的撒旦撒',
	),
);
function funcs($x,$y) {
	return strcasecmp($x['From_Time'],$y['From_Time']);
}
usort($array,'funcs');
foreach ($array as $key=>$vo) {
	for ($i = 0;$i<count($array);$i++) {
		if ($array[$key]['From_Time'] == $array[$i]['From_Time'] && $array[$key]['To_Time'] == $array[$i]['To_Time'] ) {
			$data[$key][] = $i;
		}
	}
}
function unique_arr($array2D,$stkeep=false,$ndformat=true)
{
	// 判断是否保留一级数组键 (一级数组键可以为非数字)
	if($stkeep) $stArr = array_keys($array2D);

	// 判断是否保留二级数组键 (所有二级数组键必须相同)
	if($ndformat) $ndArr = array_keys(end($array2D));

	//降维,也可以用implode,将一维数组转换为用逗号连接的字符串
	foreach ($array2D as $v){
		$v = join(",",$v); 
		$temp[] = $v;
	}

	//去掉重复的字符串,也就是重复的一维数组
	$temp = array_unique($temp); 

	//再将拆开的数组重新组装
	foreach ($temp as $k => $v)
	{
		if($stkeep) $k = $stArr[$k];
		if($ndformat)
		{
			$tempArr = explode(",",$v); 
			foreach($tempArr as $ndkey => $ndval) $output[$k][$ndArr[$ndkey]] = $ndval;
		}
		else $output[$k] = explode(",",$v); 
	}

	return $output;
}
$data = unique_arr($data);
foreach ($data as $k=>$v) {
	foreach ($v as $f) {
		$row[$k][] = $array[$f];
	}
}
var_dump($row);
echo "<hr/>";
var_dump($info);
?>