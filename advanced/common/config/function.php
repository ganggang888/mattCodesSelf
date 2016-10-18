<?php
/*
 * 自定义函数文件，常用的自定义函数都会放在这里
 */





/*
 * 统一AjaxReturn返回方法
 * @
 *
 */
function ajaxReturn($errorCode, $errorMessage, $data, $status)
{
    header('Content-Type:text/xml; charset=utf-8');
    $array = [
        'errorCode' => $errorCode,
        'errorMessage' => $errorMessage,
        'data' => $data,
        'status' => $status,
    ];
    echo json_encode($array);exit;
}


/*
 * 添加数据成功后调用，配合根目录下statics/js/common.js
 */
function success($info, $url)
{
    $array = [
        'info' => $info,
        'status'=>1,
        'url'=>'',
        'referer'=>$url,
        'state'=>'success'
    ];
    echo json_encode($array);exit;
}
/*
 * 添加数据失败后调用，配合根目录下statics/js/common.js
 */
function error($info)
{
    $array = [
        'info' => $info,
        'status'=>1,
        'url'=>'',
        'referer'=>'',
        'state'=>'fail'
    ];
    echo json_encode($array);exit;
}