<?php


function zhoufun($n){
	if($n=='0'){
		echo "一";
	}
	if($n=='1'){
		echo "二";
	}
	if($n=='2'){
		echo "三";
	}
	if($n=='3'){
		echo "四";
	}
	if($n=='4'){
		echo "五";
	}
	if($n=='5'){
		echo "六";
	}
	if($n=='6'){
		echo "七";
	}
}



/**
 * 检查是否登录，或是否超时
 * @author Glenn.Z <458712@qq.com>
 */
function is_login(){
    if(session('loginTime')){
        if (mktime() - session('loginTime') > 3600){
            session('loginTime',null);
            return false;
        }else{
            session('loginTime', mktime());
            return true;
        }

    }else{
        return false;
    }
}


/**
 * 长度转化为空格,例如1转化为2个全角空格，2转化为4个全角空格
 * @param int $nums
 * @author Glenn.Z <458712@qq.com>
 */
function nums2blank($nums){
    for($i=0;$i<$nums;$i++){
        echo '　　';
    }
}


/**
 * 格式化时间戳
 * @author Glenn.Z <458712@qq.com>
 */
function to_date($str,$format){
    if($str){
        echo date($format,$str);
    }else{
        echo '';
    }
}

/**
 * 代码反转义为HTML代码
 * @param unknown $str
 * @return string
 */
function to_html($str)
{
    return htmlspecialchars_decode($str);
}

/**
 * 过滤HTML代码，并裁剪取前N位
 */
function cut_html($str,$nums)
{
    $str = strip_tags(htmlspecialchars_decode($str));
    echo mb_substr($str , 0 , $nums);
}

/**
 * 截取字符串前面N位字符
 */
function cut_str($str,$nums){
    echo substr($str , 0 , $nums);
}






?>