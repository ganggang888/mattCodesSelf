<?php
function getTime($file){
     $vtime = exec("ffmpeg -i ".$file." 2>&1 | grep 'Duration' | cut -d ' ' -f 4 | sed s/,//");//总长度
     $ctime = date("Y-m-d H:i:s",filectime($file));//创建时间
     //$duration = explode(":",$time);
     // $duration_in_seconds = $duration[0]*3600 + $duration[1]*60+ round($duration[2]);//转化为秒
     return array('vtime'=>$vtime,
     'ctime'=>$ctime
     );
}
$info = 123;
$a = function($t)use($info){return $info;};

var_dump($a('haha'));
class test
{
    public static function getinfo()
    {
        var_dump(func_get_args());
    }
}
 
call_user_func(array('test', 'getinfo'), 'hello world','嘻嘻');
echo "<hr/>";
$message = 123456;
$example = function ($arg) use ($message) {
    var_dump($arg . ' ' . $message);
};
$example("hello");
echo "<hr/>";
$nums = array(10, 20, 30, 40);
$res = array_filter($nums,function($v){return $v > 15;});
var_dump($res);
echo "<hr/>";
function getMoney() {
  $rmb = 1;
  $dollar = 6;
  $func = function() use ( $rmb ) {
    echo $rmb;
    echo $dollar;
  };
  $func();
}
getMoney();
echo "<hr/>";
$gang = array(
	array('id'=>1,'term_id'=>2,'name'=>'哈哈'),
	array('id'=>2,'term_id'=>1,'name'=>'嘻嘻'),
	array('id'=>1,'term_id'=>2,'name'=>'哈哈'),
);
foreach ($gang as $vo) {
	$haha[$vo['term_id']][] = $vo;
}
//var_dump($haha);
$data = array();
$a = array_map(function($v)use(&$data){ $data[$v['term_id']][] = $v;return $v;},$gang);
var_dump($data);
echo "<hr/>";
$do = '{"errorCode":0,"errorMessage":0,"list":{"0":{"id":"2","name":"\u5b9d\u5b9d\u4ef0\u5367\u5e73\u8eba\u65f6\uff0c\u5934\u90e8\u80fd\u5411\u4e24\u8fb9\u5de6\u53f3\u8f6c\u52a8\u5417\uff1f\n","term_name":"\u5927\u80a2\u4f53\u52a8\u4f5c","careful":"","score_term":"2","score":{"id":2,"score":{"name":"\u80fd","score":2},"0":{"name":"\u4e0d\u80fd","score":0},"1":{"name":"\u4e0d\u786e\u5b9a","score":-1}}},"1":{"id":"3","name":"\u5c06\u5b9d\u5b9d\u7ad6\u76f4\u62b1\u8d77\u65f6\uff0c\u5b9d\u5b9d\u7684\u5934\u90e8\u80fd\u591f\u81ea\u884c\u7ad6\u7acb2-3\u79d2\u949f\u5417\uff1f","term_name":"\u5927\u80a2\u4f53\u52a8\u4f5c","careful":"\u6ce8\u610f\u7528\u624b\u62a4\u4f4f\u5b9d\u5b9d\u540e\u8111\u3002\n","score_term":"2","score":{"id":2,"score":{"name":"\u80fd","score":2},"0":{"name":"\u4e0d\u80fd","score":0},"1":{"name":"\u4e0d\u786e\u5b9a","score":-1}}},"2":{"id":"5","name":"\u5c06\u7b14\uff08\u6216\u5176\u5b83\u68d2\u72b6\u6216\u5e26\u67c4\u73a9\u5177\uff09\u653e\u5728\u5b9d\u5b9d\u624b\u5fc3\u5b9d\u5b9d\u80fd\u5426\u6293\u63e1\uff1f","term_name":"\u7cbe\u7ec6\u52a8\u4f5c","careful":"\u6ce8\u610f\uff1a\u5b9d\u5b9d\u6293\u63e1\u65f6\u95f4\u53ef\u80fd\u8f83\u77ed\uff0c\u53ea\u8981\u80fd\u63e1\u4f4f\u5373\u7b97\u901a\u8fc7","score_term":"2","score":{"id":2,"score":{"name":"\u80fd","score":2},"0":{"name":"\u4e0d\u80fd","score":0},"1":{"name":"\u4e0d\u786e\u5b9a","score":-1}}},"3":{"id":"8","name":"\u5b9d\u5b9d\u9ad8\u5174\u65f6\uff0c\u6210\u4eba\u9017\u5f04\u4ed6\uff0c\u5b9d\u5b9d\u80fd\u5426\u53d1\u51fa\/a\/\u3001\/o\/\u3001\/e\/\u7b49\u7c7b\u4f3c\u5143\u97f3\u7684\u58f0\u97f3\uff1f","term_name":"\u8bed\u8a00\u53d1\u5c55","careful":"","score_term":"2","score":{"id":2,"score":{"name":"\u80fd","score":2},"0":{"name":"\u4e0d\u80fd","score":0},"1":{"name":"\u4e0d\u786e\u5b9a","score":-1}}},"4":{"id":"9","name":"\u5b9d\u5b9d\u80fd\u5426\u6a21\u4eff\u6210\u4eba\u7684\u53e3\u578b\u7b80\u5355\u53d1\u97f3\uff0c\u6bd4\u5982\uff0c\u6210\u4eba\u8bf4\u201cba\u201d\u65f6\uff0c\u56de\u5e94\u201cba\u201d\uff1f","term_name":"\u8bed\u8a00\u53d1\u5c55","careful":"","score_term":"2","score":{"id":2,"score":{"name":"\u80fd","score":2},"0":{"name":"\u4e0d\u80fd","score":0},"1":{"name":"\u4e0d\u786e\u5b9a","score":-1}}},"5":{"id":"6","name":"\u7528\u5c0f\u94c3\u7b49\u6709\u58f0\u54cd\u7684\u73a9\u5177\uff0c\u5728\u5b9d\u5b9d\u8033\u8fb9\u6447\u52a8\u53d1\u51fa\u58f0\u97f3\uff0c\u5b9d\u5b9d\u80fd\u5426\u5c06\u5934\u90e8\u8f6c\u5411\u58f0\u6e90\u5904\uff1f\n","term_name":"\u8ba4\u77e5\u53d1\u5c55","careful":"","score_term":"2","score":{"id":2,"score":{"name":"\u80fd","score":2},"0":{"name":"\u4e0d\u80fd","score":0},"1":{"name":"\u4e0d\u786e\u5b9a","score":-1}}},"6":{"id":"7","name":"\u5b9d\u5b9d\u4ef0\u5367\u6e05\u9192\u65f6\uff0c\u6210\u4eba\u5728\u5b9d\u5b9d\u89c6\u7ebf\u5185\u6765\u56de\u8d70\u52a8\uff0c\u5b9d\u5b9d\u773c\u775b\u662f\u5426\u968f\u8d70\u52a8\u7684\u4eba\u8f6c\u52a8\uff1f\n","term_name":"\u8ba4\u77e5\u53d1\u5c55","careful":"","score_term":"1","score":{"id":1,"score":[{"name":"\u662f","score":2},{"name":"\u5426","score":0},{"name":"\u4e0d\u786e\u5b9a","score":-1}]}},"about":"1"},"result":0}';
$had = json_decode($do,true);
//var_dump($had);
$arrs = array('2','0','-1');
$info = $had['list'];
array_map(function($v) use ($arrs){
    $v['infos'] = $arrs[array_rand($arrs)];
    return $v;
},$info);
var_dump($info);exit;
foreach ($had['list'] as $key=>$vo) {
    $vo['get'] = rand($arrs);
    $info[$key] = $vo;
    var_dump($vo);exit;
}
var_dump($info);exit;
echo microtime();
$score = array_filter($info, function ($t) {
    return $t['score'] >= 0;
});
$row = array_sum(array_map(function ($v) {
    return $v['score'];
}
, $score));
//开始计算总分，设所做题目为x,每道题总分数为y,所得为z，最终得分为((x*z)/(y*x)) * 100
$sum = intval($row / (count($score) * 2) * 100);
var_dump($sum);
//为综合所有数据，将分类进行筛选
$value = array(); //根据分类二维数组转三维
$after = array(); //计算结果分数
array_map(function ($v) use(&$value) {
    $value[$v['term_id']][] = $v;
    return $v;
}
, $score);
array_map(function ($v) use(&$after) {
    $need = current($v);
    $nowScore = array_reduce($v, function ($results, $v) {
        $results['score']+= $v['score'];
        return $results;
    });
    $score = intval($nowScore['score'] / (count($v) * 2) * 100);
    $after[$need['term_id']] = array('term'=>$need['term_id'],'score'=>$score,'term_name'=>$need['term_name']);
}
, $value);
var_dump($after);
echo microtime();