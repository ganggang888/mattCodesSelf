<?php
/**
 * Created by PhpStorm.
 * User: karoro
 * Date: 2015/10/8
 * Time: 14:02
 */
namespace Common\Model;
use Common\Model\CommonModel;
use Think\Model;


class StudentResultModel extends CommonModel
{
    //自动验证
    protected $_validate = array(
        /*array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        验证条件 （可选）
        包含下面几种情况：
        self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
        self::MUST_VALIDATE 或者1 必须验证
        self::VALUE_VALIDATE或者2 值不为空的时候验证
        验证时间（可选）
        self::MODEL_INSERT或者1新增数据时候验证
        self::MODEL_UPDATE或者2编辑数据时候验证
        self::MODEL_BOTH或者3全部情况下验证（默认）

        */
//        array('score', 'require', '开始时间不能为空',1,'regex',3),
//        array('to_time', 'require', '结束时间不能为空',1,'regex',3),
          array('score', 'number', '输入正确的分数',0,'regex',3),

//        array('about', 'require', '介绍不能为空', 1, 'regex', 3),
//        array('content', 'require', '内容不能为空', 1, 'regex', 3),
    );

} 