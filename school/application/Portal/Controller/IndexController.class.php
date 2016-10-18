<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Api\Controller\WchatController;
/**
 * 首页
 */
class IndexController extends WchatController {
	
    public function _initialize()
    {
        unset($_GET["g"]);
        parent::_initialize();
        
        if ($this->isMobile() == false) {
            //echo "<script>window.location.href='http://www.matteducation.com';</script>";exit;
        }
    }
    //首页
	public function index() {
        //验证是否微信浏览器
        $checkWx = isWeixin();
        if ($checkWx == true) {
            vendor('wchat.JsApiPay');
            $wchat = D('wchat');
            $access_token = $this->access_token();
            $tools = new \JsApiPay();
            $openId = $tools->GetOpenid();
            //var_dump($openId);exit;
            $data = array(
                'access_token'=>$access_token,
                'openid'=>$openId,
                'lang'=>'zh_CN'
            );
            $row = resquestGet("https://api.weixin.qq.com/cgi-bin/user/info",$data);
            //解析微信用户数据
            //$info = json_decode($row,true);
            $select = $wchat->where(array('openid'=>$openId))->select();
            if (!$select) {
                $wchat->add(array('openid'=>$openId,'content'=>$row,'add_time'=>date('Y-m-d H:i:s')));
            }
        }
    	$this->display(":index");
    }

    //考试查询
    public function inquiry()
    {
    	if (IS_POST) {
    		$url = "http://www.12333sh.gov.cn/wsbs/zypxjd/jnjd/jdcx/cjcx.jsp?action=query&idcard=".$_POST['idcard']."&zjhm=".$_POST['zjhm']."&sj_mima1=".$_POST['sj_mima1'];
    		$this->assign('url',$url);
    		$this->display();
    	} else {
    		$this->display();
    	}
    	
    }

    //支付宝
    public function pay()
    {
        header('Content-type: text/html;charset=UTF-8');
        unset($_GET['g']);
        $alipay_config = C('alipay_config');
        var_dump($alipay_config);
        $this->display();
    }

    public function pay_post()
    {
        header('Content-type: text/html;charset=UTF-8');
        vendor('alipay.alipay_submit');
        $alipay_config = C('alipay_config');
        //支付类型
        $payment_type = "1";
        //必填，不能修改
        //服务器异步通知页面路径
        $notify_url = "http://www.010home.net/notify_url.html";
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url = "http://www.010home.net/return_url.html";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        //商户订单号
        $out_trade_no = uuid();
        //商户网站订单系统中唯一订单号，必填

        //订单名称
        $subject = $_POST['WIDsubject'];
        //必填
        //付款金额
        $total_fee = $_POST['WIDtotal_fee'];
        //必填
        //订单描述
        $body = $_POST['WIDbody'];
        //商品展示地址
        $show_url = $_POST['WIDshow_url'];
        //需以http://开头的完整路径，例如：http://www.商户网址.com/myorder.html

        //防钓鱼时间戳
        $anti_phishing_key = "";
        //若要使用请调用类文件submit中的query_timestamp函数

        //客户端的IP地址
        $exter_invoke_ip = "";
        //非局域网的外网IP地址，如：221.0.0.1
        $order = D('order');
        $array = array(
            'order_number'=>$out_trade_no,
            'order_name'=>$subject,
            'order_money'=>$total_fee,
            'order_body'=>$body,
            'order_url'=>$show_url,
            'add_time'=>date('Y-m-d H:i:s'),
        );
        $order->add($array);
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => trim($alipay_config['partner']),
            "seller_email" => trim($alipay_config['seller_email']),
            "payment_type"  => $payment_type,
            "notify_url"    => $notify_url,
            "return_url"    => $return_url,
            "out_trade_no"  => $out_trade_no,
            "subject"   => $subject,
            "total_fee" => $total_fee,
            "body"  => $body,
            "show_url"  => $show_url,
            "anti_phishing_key" => $anti_phishing_key,
            "exter_invoke_ip"   => $exter_invoke_ip,
            "_input_charset"    => trim(strtolower($alipay_config['input_charset']))
        );
        
        $alipaySubmit = new \AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;
    }

    //支付宝return_url
    public function return_url()
    {
        header('Content-type: text/html;charset=UTF-8');
        vendor('alipay.alipay_notify');
        $alipay_config = C('alipay_config');
        $alipayNotify = new \AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyReturn();

        $order = D('order');
        //商户订单号

        $out_trade_no = $_GET['out_trade_no'];

        //支付宝交易号

        $trade_no = $_GET['trade_no'];
        //交易状态
        $trade_status = $_GET['trade_status'];
        if ($verify_result) {
            if ($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                $order->where("order_number = '$out_trade_no'")->save(array('status'=>1));
                echo 'success';
                $this->display();
            }
        } else {
            $order->where("order_number = '$out_trade_no'")->save(array('status'=>2));
        }
    }

    //支付宝notify_url
    public function notify_url()
    {
        vendor('alipay.alipay_notify');
        $alipay_config = C('alipay_config');
        $order = D('order');
        $alipayNotify = new \AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        //商户订单号
        $out_trade_no = $_POST['out_trade_no'];
        //支付宝交易号
        $trade_no = $_POST['trade_no'];

        //交易状态
        $trade_status = $_POST['trade_status'];
        if ($verify_result) {
            if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                echo 'success';exit;
            }
        } else {
            $order->where("order_number = '$out_trade_no'")->save(array('status'=>2));
            echo "fail";exit;
        }
	}

    //测试
    public function test()
    {
        $model = M();
        $row = $model->query("CALL test('18816978523')");
        $info = $model->query("SELECT * FROM users WHERE Telephone = 18816978523");
        var_dump($row);var_dump($info);
    }


    //测试是否浏览器
    public function liulan()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($user_agent, 'MicroMessenger') === false) {
            // 非微信浏览器禁止浏览
            echo "HTTP/1.1 401 Unauthorized";
        } else {
            // 微信浏览器，允许访问
            echo "MicroMessenger";
            // 获取版本号
            preg_match('/.*?(MicroMessenger\/([0-9.]+))\s*/', $user_agent, $matches);
            echo '<br>Version:'.$matches[2];
        }
    }


    public function indexs()
    {
        vendor('wchat.lib.Api');
        vendor('wchat.JsApiPay');
        vendor('wchat.log');

        //初始化日志
        $logHandler= new \CLogFileHandler(SITE_PATH."logs/".date('Y-m-d').'.log');
        $log = \Log::Init($logHandler, 15);

        //打印输出数组信息
        function printf_info($data)
        {
            foreach($data as $key=>$value){
                echo "<font color='#00ff55;'>$key</font> : $value <br/>";
            }
        }
        //①、获取用户openid
        $tools = new \JsApiPay();
        $openId = $tools->GetOpenid();
        //var_dump($openId);exit;
        //②、统一下单
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no(\WxPayConfig::MCHID.date("YmdHis"));
        $input->SetTotal_fee("100");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://www.010home.net/index.php/portal/index/notify.html");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);
        echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
        printf_info($order);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        var_dump($jsApiParameters);
        $this->assign('jsApiParameters',$jsApiParameters);
        //获取共享收货地址js函数参数
        $editAddress = $tools->GetEditAddressParameters();
        $this->assign('editAddress',$editAddress);
        $this->display();
    }

    //微信支付回调
    public function notify()
    {
        vendor('wchat.lib.Notify');
        vendor('wchat.notify');
        vendor('wchat.log');
        //初始化日志
        $logHandler= new \CLogFileHandler(SITE_PATH."logs/".date('Y-m-d').'.log');
        $log = \Log::Init($logHandler, 15);
        \Log::DEBUG("begin notify");
        $notify = new \PayNotifyCallBack();
        $info = $notify->Handle(false);
    }
    //获取用户手机号
    public function getphone()
    {
        vendor('wchat.JsApiPay');
        $tools = new \JsApiPay();
        $openId = $tools->GetOpenid();
        $access_token = $this->access_token();
        $data = array(
            'access_token'=>$access_token,
            'openid'=>$openId,
            'lang'=>'zh_CN'
        );
        $row = resquestGet("https://api.weixin.qq.com/cgi-bin/user/info",$data);
        var_dump($row);
        var_dump($_GET['uuid']);exit;
    }

    //礼物页面
    public function gift()
    {
        $this->display();
    }

}