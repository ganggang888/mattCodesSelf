<?php
header("Content-Type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: geniuszc
 * Date: 16/9/13
 * Time: 上午11:21
 */
error_reporting(E_ALL);
class Response{
    const JSON = "json";
    public static function show($code,$message = '',$data =array(),$type){
    if(!is_numeric($code)){
        return '';
    }
    $result = array(
        'code' =>$code,
        'message'=>$message,
        'data'=>$data,
    );
        if ($type=='json'){
            self::show($code,$message,$data,$type);
            exit;
        }elseif ($type=='array'){
            var_dump($result);
        }elseif ($type=='xml'){
            self::xmlEncode($code,$message,$data);
        }else{

        }
    }
}