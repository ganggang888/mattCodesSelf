<?php
/**
 * Created by PhpStorm.
 * User: karoro
 * Date: 2015/9/28
 * Time: 11:32
 */

namespace Common\Model;
use Common\Model\CommonModel;
use Think\Model;


class StudentMainModel  extends CommonModel
{
    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('name', 'require', '姓名不能为空',0,'regex',1),
        array('phone','((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)' , '联系方式错误', 1, 'regex', 3),
        array('id_card', 'check_card', '身份证输入错误或已存在！', 0, 'callback', 1),
//        array('about', 'require', '介绍不能为空', 1, 'regex', 3),
//        array('content', 'require', '内容不能为空', 1, 'regex', 3),
    );
    //身份证验证
    protected function check_card($idcard){
        // 只能是18位
        if(strlen($idcard)!=18){
            return false;
        }
        // 取出本体码
        $idcard_base = substr($idcard, 0, 17);

        // 取出校验码
        $verify_code = substr($idcard, 17, 1);

        // 加权因子
        $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);

        // 校验码对应值
        $verify_code_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');

        // 根据前17位计算校验码
        $total = 0;
        for($i=0; $i<17; $i++){
            $total += substr($idcard_base, $i, 1)*$factor[$i];
        }

        // 取模
        $mod = $total % 11;


        // 比较校验码
        if($verify_code == $verify_code_list[$mod]){
            //身份证唯一验证
            $sdtModel = D('StudentMain');
            $where['id_card'] = $idcard;
            $where['is_delete'] = 0;
            $result = $sdtModel->where($where)->select();

            if(!$result){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
} 