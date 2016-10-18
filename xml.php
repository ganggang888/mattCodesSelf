<?php
$array = array(
	array (
	  'title' => '我们是哇哈哈哈',
	  'term_id' => '568b39e2cbf70226258b4567',
	  'month' => '14',
	  'content' => 'Opera一直都被认为是浏览速度飞快，同时在移动平台上更是占有不少的份额。不久前，Opera正式向苹果提交了针对iPhone设计的Opera Mini。日前，台湾IT网站放出了Opera Mini和Safari的评测文章，下面让我们看看Opera和Safari到底谁更好用更快吧。
　　Opera Mini VS Safari，显示方式很不相同
和Safari不同的是，Opera Mini会针对手机对网页进行一些调整
　　Opera Mini与Safari的运作原理不大相同。网页会通过Opera的服务器完整压缩后再发送到手机上，不像Safari可通过Multi-Touch和点击的方式自由缩放，Opera Mini会预先将文字照iPhone的宽度做好调整，点击区域后自动放大。如果习惯了Safari的浏览方式，会感觉不大顺手，不过对许多宽度太宽，缩放后文字仍然显示很小的网页来说，Opera Mini的显示方式比较有优势。
　　打开测试网站首页所花费的流量，Safari和Opera Mini的差距明显可见。这个在国内移动资费超高的局面来说，Opera Mini估计会比较受欢迎和省钱。
Opera Mini的流量少得惊人，仅是Safari的十分之一
　　兼容性相比，Safari完胜
打开Google首页，Safari上是iPhone专用界面，Opera则是一般移动版本
　　Opera Mini的速度和省流量还是无法取代Safari成为iPhone上的主要浏览器。毕竟iPhone的高占有率让许多网站，线上服务都为Safari设计了专用页面。光Google的首页为例子就看出了明显的差别。另外，像Google Buzz这样线上应用，就会出现显示错误。
Google Buzz上，Opera无法输入内容
　　Opera Mini其他专属功能
页面内搜索和关键字直接搜索相当人性化
　　除了Opera独创的Speed Dial九宫格快速启动页面外，和Opera Link和电脑上的Opera直接同步书签、Speed Dial设定外。Opera Mini还能够直接搜索页面中的文字，查找资料时相当方便。另外也能选取文字另开新分页搜索，比起Safari还要复制、开新页、粘贴简单许多。同时还能将整个页面打包存储，方便离线浏览。
　　现在Opera Mini想要打败Safari还剩下一个很严重的问题-苹果何时会或者会不会通过Opera Mini的审核。',
	  'id' => 5,
	  //'hits' => new MongoInt64(0),
	  'add_time' => '2016-01-07 13:52:21',
	),
	array (
	  'title' => '邵博阳太菜了',
	  'term_id' => '568b39e2cbf70226258b4567',
	  'month' => '14',
	  'content' => '2010年2月28日，央视经济频道《对话》节目昨晚推出虎年首期节目，百度董事长兼CEO李彦宏作为嘉宾做客节目。李彦宏首度谈及2005年百度上市前夕，谷歌CEO施密特曾秘密造访百度时秘密谈话的内容，主要是劝阻百度上市，李彦宏断然拒绝了施密特的“好意”。今天看来，施密特当日也许已有不祥的预感，这个几百人的小公司终有一日会成为他们的大麻烦。
　　本期《对话》一经播出，便引发了业界讨论。
　　外资品牌通过收购打压中国品牌的案例不胜枚举。从以往跨国企业并购的中国品牌来看，真正让其活下来的品牌并不多，要么被雪藏，要么被低端化。
　　因此，2005年百度没有接受Google的收购邀请，坚持自主发展，这对于保护中国品牌，维护中国网民信息安全有着至关重要的作用。当前百度市场份额高达76%，并持续增长，这也充分验证了李彦宏拒绝收购决策的正确性。',
	  'id' => 7,
	  //'hits' => new MongoInt64(0),
	  'add_time' => '2016-01-07 13:52:21',
	),
);
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<sphinx:docset>";
$xml .= '<sphinx:schema>
	<sphinx:field name="title"/> 
	<sphinx:field name="content"/>
	<sphinx:attr name="id" type="int" default="1"/>
	</sphinx:schema>';
foreach ($array as $key=>$vo) {
	$xml .= "\n".'<sphinx:document id="'.$key.'">';
	$xml .= "\n".'<title>'.$vo['title'].'</title>';
	$xml .= "\n".'<content>'.$vo['content'].'</content>';
	$xml .= "\n".'<id>'.$vo['id'].'</id>';
	$xml .= "\n".'</sphinx:document>';
}
$xml .= "\n".'</sphinx:docset>';


$array = array(
	array('id'=>'1','mobile'=>18816978523,'fx_mobile'=>15927814701),
	array('id'=>'1','mobile'=>18816978525,'fx_mobile'=>''),
	array('id'=>'1','mobile'=>18816978515,'fx_mobile'=>15927814701),
	array('id'=>'1','mobile'=>14475152145,'fx_mobile'=>18816978523),
	array('id'=>'1','mobile'=>12254125478,'fx_mobile'=>18816978523),
	array('id'=>'1','mobile'=>15975315975,'fx_mobile'=>15874521452),
	array('id'=>'1','mobile'=>14521456987,'fx_mobile'=>15874521452),
);
$num = count($array);
for ($i=0;$i<$num;$i++) {
    for ($j=$num-1;$j>=$i;$j--) {
        if ($array[$i]['fx_mobile'] == $array[$j]['fx_mobile']) {
            if ($array[$j]['fx_mobile']) {
                $data[$i][] = $array[$j];
            }
            unset($array[$j]);
        }
    }
}
var_dump($data);
?>