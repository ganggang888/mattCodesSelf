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
$info = array(
			array('id'=>2,'term_id'=>1,'score'=>'2','term_name'=>'分类一','score_term'=>'1','name'=>'第二题'),
			array('id'=>3,'term_id'=>2,'score'=>'0','term_name'=>'分类二','score_term'=>'1','name'=>'第三题'),
			array('id'=>4,'term_id'=>2,'score'=>'-1','term_name'=>'分类二','score_term'=>'2','name'=>'第四题'),
			array('id'=>5,'term_id'=>1,'score'=>'2','term_name'=>'分类一','score_term'=>'2','name'=>'第五题'),
			array('id'=>6,'term_id'=>3,'score'=>'0','term_name'=>'分类三','score_term'=>'2','name'=>'第六题'),
			array('id'=>7,'term_id'=>3,'score'=>'2','term_name'=>'分类三','score_term'=>'2','name'=>'第七题'),
		);
		echo(json_encode($info));