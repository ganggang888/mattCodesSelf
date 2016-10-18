<?php
namespace Home\Model;
use Think\Model;
class LinksModel extends Model
{
	
	//自动验证
	protected $_validate = array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
			array('link_url', 'require', 'url不能为空', 1, 'regex', 3),
			array('link_name', 'require', '名称不能为空', 1, 'regex', 3)
	);
	
}
