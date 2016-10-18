<?php
namespace Think;
class Tree {
	//存放无限分类结果如果一页面有多个无限分类可以使用 Tree::$treeList = array(); 清空
	static public $treeList = array(); 
	/**
	 * 无限级分类
	 * @access public
	 * @param Array $data     //数据库里获取的结果集
	 * @param Int $pid
	 * @param Int $count       //第几级分类
	 * @return Array $treeList
	 */
	static public function list2tree(&$data,$pid = 0,$count = 0) {
		foreach ($data as $key => $value){
			if($value['pid']==$pid){
				$value['count'] = $count;
				self::$treeList []=$value;
				unset($data[$key]);
				self::list2tree($data,$value['id'],$count+1);
			}
		}
		return self::$treeList ;
	}
	static public function list3tree(&$data,$pid = 0,$count = 0) {
		foreach ($data as $key => $value){
			if($value['pid']==$pid){
				$value['count'] = $count;
				self::$treeList []=$value;
				unset($data[$key]);
				self::list3tree($data,$value['jid'],$count+1);
			}
		}
		return self::$treeList ;
	}
}
