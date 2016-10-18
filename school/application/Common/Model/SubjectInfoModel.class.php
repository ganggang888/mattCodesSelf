<?php
//课程信息
namespace Common\Model;
use Common\Model\CommonModel;
class SubjectInfoModel extends CommonModel
{
	//自动验证
	protected $_validate = array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
			array('term_id', 'require', '请选择一个分类', 1, 'regex', 3),
			array('title', 'require', '名称不能为空！', 1, 'regex', 3),
			array('about', 'require', '介绍不能为空', 1, 'regex', 3),
			array('content', 'require', '内容不能为空', 1, 'regex', 3),
	);
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
}