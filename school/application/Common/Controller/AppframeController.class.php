<?php
namespace Common\Controller;
use Think\Controller;
/**
 * Appframe项目公共Controller
 */
class AppframeController extends Controller {


    function _initialize() {
        //消除所有的magic_quotes_gpc转义
        //Input::noGPC();
        //跳转时间
        $this->assign("waitSecond", 3);
        //$this->assign("__token__", $this->getToken());
       	$time=time();
        $this->assign("js_debug",APP_DEBUG?"?v=$time":"");
        if(APP_DEBUG){
        	//sp_clear_cache();
        }
        

    }

    //获取表单令牌
    protected function getToken() {
        $tokenName = C('TOKEN_NAME');
        // 标识当前页面唯一性
        $tokenKey = md5($_SERVER['REQUEST_URI']);
        $tokenAray = session($tokenName);
        //获取令牌
        $tokenValue = $tokenAray[$tokenKey];
        return $tokenKey . '_' . $tokenValue;
        
        $this->ajaxReturn(array("data"=>$data,"status"=>1));
    }

    //判断是否手机访问
    public function isMobile()
    { 
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        } 
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA']))
        { 
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        } 
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT']))
        {
            $clientkeywords = array ('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
                ); 
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            {
                return true;
            } 
        } 
        // 协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT']))
        { 
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
            {
                return true;
            } 
        } 
        return false;
    } 

    //以post方式请求数据
    public function apiGet($urls, array $array)
    {
        $url = $urls . "?".http_build_query($array);
        $ch = curl_init($url) ;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($ch, CURLOPT_TIMEOUT,1000);
        $output = curl_exec($ch) ;
        return $output;
    }
    /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @return void
     */
    protected function ajaxReturn($data, $type = '',$json_option=0) {
        
        $data['referer']=$data['url'] ? $data['url'] : "";
        $data['state']=$data['status'] ? "success" : "fail";
        
        if(empty($type)) $type  =   C('DEFAULT_AJAX_RETURN');
        switch (strtoupper($type)){
        	case 'JSON' :
        		// 返回JSON数据格式到客户端 包含状态信息
        		header('Content-Type:application/json; charset=utf-8');
        		exit(json_encode($data,$json_option));
        	case 'XML'  :
        		// 返回xml格式数据
        		header('Content-Type:text/xml; charset=utf-8');
        		exit(xml_encode($data));
        	case 'JSONP':
        		// 返回JSON数据格式到客户端 包含状态信息
        		header('Content-Type:application/json; charset=utf-8');
        		$handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
        		exit($handler.'('.json_encode($data,$json_option).');');
        	case 'EVAL' :
        		// 返回可执行的js脚本
        		header('Content-Type:text/html; charset=utf-8');
        		exit($data);
        	case 'AJAX_UPLOAD':
        		// 返回JSON数据格式到客户端 包含状态信息
        		header('Content-Type:text/html; charset=utf-8');
        		exit(json_encode($data,$json_option));
        	default :
        		// 用于扩展其他返回格式数据
        		Hook::listen('ajax_return',$data);
        }
        
    }



    
    //分页
    protected function page($Total_Size = 1, $Page_Size = 0, $Current_Page = 1, $listRows = 6, $PageParam = '', $PageLink = '', $Static = FALSE) {
    	import('Page');
    	if ($Page_Size == 0) {
    		$Page_Size = C("PAGE_LISTROWS");
    	}
    	if (empty($PageParam)) {
    		$PageParam = C("VAR_PAGE");
    	}
    	$Page = new \Page($Total_Size, $Page_Size, $Current_Page, $listRows, $PageParam, $PageLink, $Static);
    	$Page->SetPager('default', '{first}{prev}{liststart}{list}{listend}{next}{last}', array("listlong" => "9", "first" => "首页", "last" => "尾页", "prev" => "上一页", "next" => "下一页", "list" => "*", "disabledclass" => ""));
    	return $Page;
    }


    /**
     * 验证码验证
     * @param type $verify 验证码
     * @param type $type 验证码类型
     * @return boolean
     */
    static public function verify($verify, $type = "verify") {
        $verifyArr = session("_verify_");
        if (!is_array($verifyArr)) {
            $verifyArr = array();
        }
        if ($verifyArr[$type] == strtolower($verify)) {
            unset($verifyArr[$type]);
            if (!$verifyArr) {
                $verifyArr = array();
            }
            session('_verify_', $verifyArr);
            return true;
        } else {
            return false;
        }
    }

    //空操作
    public function _empty() {
        $this->error('该页面不存在！');
    }
    
    /**
     * 检查操作频率
     * @param int $duration 距离最后一次操作的时长
     */
    protected function check_last_action($duration){
    	
    	$action=MODULE_NAME."-".CONTROLLER_NAME."-".ACTION_NAME;
    	$time=time();
    	
    	if(!empty($_SESSION['last_action']['action']) && $action==$_SESSION['last_action']['action']){
    		$mduration=$time-$_SESSION['last_action']['time'];
    		if($duration>$mduration){
    			$this->error("您的操作太过频繁，请稍后再试~~~");
    		}else{
    			$_SESSION['last_action']['time']=$time;
    		}
    	}else{
    		$_SESSION['last_action']['action']=$action;
    		$_SESSION['last_action']['time']=$time;
    	}
    }

}