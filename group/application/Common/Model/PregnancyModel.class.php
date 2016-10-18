<?php
namespace Common\Model;
use Common\Model\CommonModel;
class PregnancyModel extends CommonModel
{
	//自动验证
	protected $_validate = array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)weight
			array('height', 'require', '身高不能为空', 1, 'regex', 3),
			array('weight', 'require', '体重不能为空', 1, 'regex', 3),
			array('baby_message', 'require', '宝宝信息不能为空', 1, 'regex', 3),
			array('mother_info', 'require', '妈妈变化不能为空', 1, 'regex', 3),
			array('taskall', 'require', '每日任务不能为空', 1, 'regex', 3),
	);
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
}