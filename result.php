<?php

$info = array('id'=>'2113','first_name'=>'','last_name'=>'','Telephone'=>'18816978523','cross_country'=>'0','country'=>'CHN','login_adapter'=>'default');
$info = json_encode($info);
$info = json_decode($info);
$array = array(
	'adminlogin'=>1,
	'ADMIN_ID'=>1,
	'name'=>'admin',
	'front_end'=>array(
		'user'=>$info
	),
);
$a= "你好吗啊啊儑倒萨";
$b = strstr($a,'吗');
if ($b) {
	echo 1;
} else {
	echo 2;
}
echo "<hr/>";
//求119和554的最大公因子
function getnumbers($m,$n)
{
	if ($m > $n) {
		$info = $m % $n;
		$row = intval($m / $n);
		$do = $n;
	} else {
		$info = $n % $m;
		$row = intval($n / $m);
		$do = $m;
	}
	if ($info > 0) {
		return getnumbers($do,$info);
	} else {
		return $m > $n ? $n : $m;
	}
}
$self = getnumbers(544,119);
var_dump($self);
?>