<?php
function list_dir($start)
{
	$contents = scandir($start);
	var_dump($contents);exit;
	foreach ($contents as $vo) {
		if (is_dir("$start/$vo") && substr($vo,0,1) != '.') {
			list_dir("$start/$vo");
		} else {
			
		}
	}
}
/**
* 文件名(CoreseekData.php)
*
* 功能描述（处理Coreseek搜索的信息）
* 
* @author 曾刚刚 <a526584713@gmail.com>
* @version 1.0
* @package sample2
*/
class CoreseekData
{

	private $data = null; //需要处理的数据

	private $key = null; //数据查询结果的键值
	/**
	* 构造方法
	*
	* 获取数据、需要转换的类型、key赋值给私有变量
	*
	* @param array $data
	* @param int $type
	* @param string $key
	* @example $data = 'Array ( [0] => Coreseek Fulltext 3.2 [ Sphinx 0.9.9-release (r2117)] [1] => Copyright (c) 2007-2011, [2] => Beijing Choice Software Technologies Inc (http://www.coreseek.com) [3] => [4] => using config file 'etc/csft.conf'... [5] => index 'xml': query '你好吗 ': returned 1 matches of 1 total in 0.005 sec [6] => [7] => displaying matches: [8] => 1. document=7, weight=6, id=7 [9] => [10] => words: [11] => 1. '你好': 1 documents, 1 hits [12] => 2. '吗': 1 documents, 1 hits [13] => )';
	* @example $key = 'id'
	* @return array 
	*/
	public function __construct($data, $key)
	{
		$this->data = $data;
		$this->key = $key;
	}



	/**
	* 获取所有搜索的id 
	*
	* @return array
	**/
	public function getAllSearchId()
	{
		!$this->data ? false : '';
		foreach ($this->data as $vo) {
			$result = $this->getId($vo);
			$result ? $info['id'][] = $result : '';

			$word = $this->words($vo);
			$word ? $info['words'][] = $word : '';
		}
		return $info ? $info : false;
	}

	/**
	* 从字符串中找出含有所需要的key并返回
	* @param string $row;
	* @return array
	**/
	private function getId($row = '')
	{
		if (strstr($row,$this->key."=")) {
			$info = explode(',', $row);
			if ($info[2]) {
				return explode('=', $info[2])[1];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	* 获取所有划词内容
	* @param string $row;
	* @return array
	**/
	private function words($row = '')
	{
		if (strstr($row,"hits")) {
			$info = explode("'",$row);
			if ($info[1]) {
				return $info[1];
			} else {
				return flase;
			}
		} else {
			return false;
		}
	}
}
/*$result = unserialize(file_get_contents("http://app.mattservice.com/info/try.php?search=您好，宝宝身体不舒服，我该怎么办呢？"));

$a = new \CoreseekData($result,"id");

var_dump($a->getAllSearchId());*/
/*$info = array(
			array('id'=>2,'term_id'=>1,'score'=>'2','term_name'=>'分类一','score_term'=>'1','name'=>'第二题'),
			array('id'=>3,'term_id'=>2,'score'=>'0','term_name'=>'分类二','score_term'=>'1','name'=>'第三题'),
			array('id'=>4,'term_id'=>2,'score'=>'-1','term_name'=>'分类二','score_term'=>'2','name'=>'第四题'),
			array('id'=>5,'term_id'=>1,'score'=>'2','term_name'=>'分类一','score_term'=>'2','name'=>'第五题'),
			array('id'=>6,'term_id'=>3,'score'=>'0','term_name'=>'分类三','score_term'=>'2','name'=>'第六题'),
			array('id'=>7,'term_id'=>3,'score'=>'2','term_name'=>'分类三','score_term'=>'2','name'=>'第七题'),
		);
		echo(json_encode($info));*/


/*var_dump(strtotime('2016-01-01'));
var_dump(strtotime('2016-11-01'));*/

/*SELECT * FROM `ofMessageArchive` WHERE  INSTR(`fromJID`,'zhuanjia2') AND `sentDate` >= '1451577600000' and `sentDate` < '1477929600000'
8233+832

SELECT * FROM `ofMessageArchive` WHERE  INSTR(`toJID`,'zhuanjia2') AND `sentDate` >= '1451577600000' and `sentDate` < '1477929600000'
8524+1020*/
/*$file = '2016.3.02-nihao.mp4';
var_dump(end(explode('.',$file)));*/
/*for($i=1;$i<=36;$i++) {
	for($j=1;$j<=3;$j++) {
		$array[] = array('month'=>$i,'level'=>$j);
	}
}
var_dump($array);*/
$info = 'a:50:{i:0;a:5:{s:2:"id";i:277;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:1;a:5:{s:2:"id";i:278;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:2;a:5:{s:2:"id";i:279;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:3;a:5:{s:2:"id";i:280;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:4;a:5:{s:2:"id";i:281;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:5;a:5:{s:2:"id";i:282;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:6;a:5:{s:2:"id";i:283;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:7;a:5:{s:2:"id";i:284;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:8;a:5:{s:2:"id";i:285;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:9;a:5:{s:2:"id";i:286;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:7;s:9:"term_name";s:12:"认知发展";}i:10;a:5:{s:2:"id";i:115;s:5:"score";s:1:"2";s:10:"score_term";s:1:"1";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:11;a:5:{s:2:"id";i:116;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:12;a:5:{s:2:"id";i:117;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:13;a:5:{s:2:"id";i:118;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:14;a:5:{s:2:"id";i:119;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:15;a:5:{s:2:"id";i:120;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:16;a:5:{s:2:"id";i:121;s:5:"score";s:1:"2";s:10:"score_term";s:1:"1";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:17;a:5:{s:2:"id";i:123;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:18;a:5:{s:2:"id";i:124;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:19;a:5:{s:2:"id";i:125;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:6;s:9:"term_name";s:12:"精细动作";}i:20;a:5:{s:2:"id";i:201;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:21;a:5:{s:2:"id";i:202;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:22;a:5:{s:2:"id";i:203;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:23;a:5:{s:2:"id";i:204;s:5:"score";s:1:"2";s:10:"score_term";s:1:"1";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:24;a:5:{s:2:"id";i:205;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:25;a:5:{s:2:"id";i:206;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:26;a:5:{s:2:"id";i:207;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:27;a:5:{s:2:"id";i:208;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:28;a:5:{s:2:"id";i:476;s:5:"score";s:1:"0";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:29;a:5:{s:2:"id";i:209;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:5;s:9:"term_name";s:15:"大肢体动作";}i:30;a:5:{s:2:"id";i:376;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:31;a:5:{s:2:"id";i:377;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:32;a:5:{s:2:"id";i:378;s:5:"score";s:1:"2";s:10:"score_term";s:1:"1";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:33;a:5:{s:2:"id";i:379;s:5:"score";s:1:"2";s:10:"score_term";s:1:"1";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:34;a:5:{s:2:"id";i:380;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:35;a:5:{s:2:"id";i:381;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:36;a:5:{s:2:"id";i:382;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:37;a:5:{s:2:"id";i:383;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:38;a:5:{s:2:"id";i:384;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:39;a:5:{s:2:"id";i:385;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:8;s:9:"term_name";s:12:"语言发展";}i:40;a:5:{s:2:"id";i:12;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:41;a:5:{s:2:"id";i:13;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:42;a:5:{s:2:"id";i:14;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:43;a:5:{s:2:"id";i:15;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:44;a:5:{s:2:"id";i:16;s:5:"score";s:1:"2";s:10:"score_term";s:1:"1";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:45;a:5:{s:2:"id";i:17;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:46;a:5:{s:2:"id";i:18;s:5:"score";s:1:"2";s:10:"score_term";s:1:"2";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:47;a:5:{s:2:"id";i:19;s:5:"score";s:1:"0";s:10:"score_term";s:1:"1";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:48;a:5:{s:2:"id";i:20;s:5:"score";s:2:"-1";s:10:"score_term";s:1:"2";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}i:49;a:5:{s:2:"id";i:21;s:5:"score";s:1:"2";s:10:"score_term";s:1:"1";s:7:"term_id";i:9;s:9:"term_name";s:24:"情感与社会性发展";}}';
var_dump(unserialize($info));
var_dump(((10-5.81) / 1.91) * 15 + 100);
//var_dump(array_rand($array,8));
//aes256加密
function encrypt_256 ($value)
{   
    $key = "GUbjZBfniQzrtrCm055hxER6N37YeRyG";
    $padSize = 16 - (strlen ($value) % 16) ;
    $value = $value . str_repeat (chr ($padSize), $padSize) ;
    $output = mcrypt_encrypt (MCRYPT_RIJNDAEL_128, $key, $value, MCRYPT_MODE_CBC, "055hxER6N37YeRyG") ;                
    return base64_encode ($output) ;        
}
echo "<hr/>";
$need = date("Y-m-d")."QWIJNG1ds54FDfd4s";
var_dump(encrypt_256($need));
/*function  inverse ( $x ) {
    if (! $x ) {
        throw new  Exception ( 'Division by zero.' );
    }
    else return  1 / $x ;
}

try {
    echo  inverse ( 5 ) .  "\n";
    echo  inverse ( 0 ) .  "\n" ;
} catch ( Exception $e ) {
    echo  'Caught exception: ' ,   $e -> getMessage (),  "\n" ;
}

 // Continue execution
 echo  'Hello World' ;*/
 echo "<hr/>";
function getScore($number,$term_id)
{
	switch ($term_id) {
		case 7://认知发展
			$score = (($number-6.88) / 1.54) * 15 + 100;
			# code...
			break;
		case 5://大肢体动作
			$score = (($number-5.06) / 1.69) * 15 + 100;
			break;
		case 6://精细动作
			$score = (($number-5.13) / 1.59) * 15 + 100;
			break;
		case 8://语言发展
			$score = (($number-5.81) / 1.91) * 15 + 100;
			break;
		case 9://情感与社会关系
			$score = (($number-7.38) / 1.15) * 15 + 100;
			break;
		default:
			$score = (($number-30.25) / 6.26) * 15 + 100;
			break;
	}
	return $score;
}
var_dump(getScore(3,5));