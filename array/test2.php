<?php
header("Content-Type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: geniuszc
 * Date: 16/9/13
 * Time: 上午11:29
 */
require_once('./json+xml.php');
$data = array(
    'id' =>1,
    'name' =>'geniuszc',
    'type' =>array(4,5,6),
    'test' =>array(1,45,67=>array(123,'geniuszc')),
);
Response::show(200,'sucess',$data,'json');