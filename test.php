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

function decrypt ($value) 
		{                       
			$key = "GUbjZBfniQzrtrCm055hxER6N37YeRyG";
		    $value = base64_decode ($value) ;                
		    $output = mcrypt_decrypt (MCRYPT_RIJNDAEL_128, $key, $value, MCRYPT_MODE_CBC, "055hxER6N37YeRyG") ;                
		    
		    $valueLen = strlen ($output) ;
		    if ( $valueLen % 16 > 0 )
		        $output = "";
		
		    $padSize = ord ($output{$valueLen - 1}) ;
		    if ( ($padSize < 1) or ($padSize > 16) )
		        $output = "";                // Check padding.                
		
		    for ($i = 0; $i < $padSize; $i++)
		    {
		        if ( ord ($output{$valueLen - $i - 1}) != $padSize )
		            $output = "";
		    }
		    $output = substr ($output, 0, $valueLen - $padSize) ;
		
		    return $output;        
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
$do = 'AJ';
$first = substr($do,0,1);
$next = substr($do,1,1);
for($i='A'; $i!='AP'; $i++) echo $i;

	var_dump(decrypt("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"));