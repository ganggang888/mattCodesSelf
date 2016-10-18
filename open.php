<?php
$aaa = 111;
$func = function() use($aaa){ print $aaa; };
$aaa = 222;
$func(); // Outputs "111"
$info = create_function('', 'echo "Function created dynamic";');  
echo $info; // lambda_1 
debug_zval_dump(array(123456,456,78,9,789));
echo "<hr/>";
class A{
    public static $num=0;
    public function __construct(){
        self::$num++; }
}
new A();
new A();
new A();
echo A::$num;
echo "<hr/>";
echo intval(1.65847);
echo "<hr/>";
echo md5("10c5-580ee0535fa2".date("Y-m-d"));
echo "<hr/>";
$a=1;
switch ($a) {
	case '1':
		$b=123456;
		var_dump($b);
		break;
	
	default:
		# code...
		break;
}
var_dump(intval(68/30));
$infos = array(
	array('id'=>1578,'info'=>'dsadas'),
	array('id'=>233,'info'=>'sssss'),
	array('id'=>1245,'info'=>'fffff'),
	array('id'=>1246,'info'=>'dsadasdasdasdadsadadsa'),
);
$arr = array(
array(3,1,2,5,4),
array(7,8,10,9,6),
array(15,12,14,13,11),
);
$b = array();
foreach($arr as $key=>$value){
$a=$arr[$key];
$b = array_merge($a,$b);
sort($b);
}
echo $b[0]."<p>".$b[count($b)-1];
echo "<hr/>";
$data = array(
    'info'=>1,
    'haha'=>123,
    'ganggang'=>1547,
    'data'=>14587
);
extract($data);
var_dump($info);
var_dump($data);
foreach ($variable as $key => $value) {
	# code...
}
$array = array(
	0=>array('add_time'=>'2015-08-14'),
	1=>array('add_time'=>'2015-08-14'),
);