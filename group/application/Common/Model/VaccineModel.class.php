<?php
namespace Common\Model;
use Common\Model\CommonModel;
class VaccineModel extends CommonModel
{
	
	//自动验证
	protected $_validate = array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
			array('name', 'require', '疫苗名称不能为空', 1, 'regex', 3),
			array('detail_field_1', 'require', '免疫程序不能为空', 1, 'regex', 3),
			array('detail_field_2', 'require', '接种方法不能为空', 1, 'regex', 3),
			array('detail_field_3', 'require', '作用不能为空', 1, 'regex', 3),
			array('detail_field_4', 'require', '禁忌症不能为空', 1, 'regex', 3),
			array('detail_field_5', 'require', '不良反应不能为空', 1, 'regex', 3),
			array('detail_field_6', 'require', '注意事项不能为空', 1, 'regex', 3),
	);
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
	
}




