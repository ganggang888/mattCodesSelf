<?php

/**
 * 会员中心
 */
namespace User\Controller;
use Common\Controller\MemberbaseController;
class CenterController extends MemberbaseController {
	
	protected $users_model;
	protected $userid;
	function _initialize(){
		parent::_initialize();
		$this->users_model=D("Common/Users");
		$this->userid = $_SESSION['user']['id'];
	}
    //会员中心
	public function index() {
		$userid=sp_get_current_userid();
		$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
    	$this->display();
    }

    //在线选课
    public function checkClass()
    {
    	$subject = D('subject');
		$result = $subject->where("parentid = 0")->limit("id ASC")->select();
		foreach($result as $vo) {
			$son = $subject->where("parentid = '$vo[id]'")->select();
			$data[] = array(
				'id'=>$vo['id'],
				'name'=>$vo['name'],
				'son'=>$son,
			);
		}
		$this->assign('data',$data);
		$isWeixin = isWeixin();
		if ($isWeixin == true) {
			$this->assign('payment',2);
		} else {
			$this->assign('payment',1);
		}
		//var_dump($isWeixin);
    	$this->display();
    }

    //将选择的信息记录下来然后跳转到支付页面
    public function checkPay()
    {
    	$model = M();
    	if (IS_POST) {
    		$info = rtrim(I('post.checkValue'));
    		$data = str_replace("   ",",",$info);
    		$result = $model->query("SELECT id,name,price FROM sp_subject WHERE id IN($data)");
    		$allPrice = $model->query("SELECT SUM(`price`) AS num FROM sp_subject WHERE id IN($data)");
    		$this->assign('result',$result);
    		$this->assign('price',$allPrice);
    		$this->assign('data',$data);
    		$isWeixin = isWeixin();
    		$this->display();
    	}
    }


    //提交优惠码
    public function code()
    {
        $code = D('code');
        if (IS_POST) {
            $info = rtrim(I('post.checkValue'));
            if (!$info) {
                $this->error('请选择课程信息',U('user/center/checkClass'));
            }
            $data = str_replace("   ",",",$info);
            $array = array(
                'uid'=>$this->userid,
                'code'=>random(10),
                'info'=>$data,
                'add_time'=>date('Y-m-d H:i:s'),
            );
        }
        $code->add($array);
        $this->success('选课成功',U('user/center/index'));
    }

    //优惠码中心
    public function codeInfo()
    {
        $code = D('code');
        $count = $code->where(array('uid'=>$this->userid))->count();
        $page = $this->page($count,20);
        $result = $code->where(array('uid'=>$this->userid))->limit($page->firstRow.",".$page->listRows)->select();
        $this->assign('page',$page->show('Admin'));
        $this->assign('result',$result);
        $this->display();
    }

    //删除信息
    public function del()
    {
        $id = I('get.id');
        $code = D('code');
        if (!$id) {
            $this->error('错误');
        }
        $row = $code->where(array('id'=>$id,'uid'=>$this->userid))->delete();
        if ($row) {
            $this->success('删除成功',U('user/center/codeInfo'));
        } else {
            $this->error('删除失败');
        }
    }

    //由于微信浏览器的session和cookie在微信支付时存在问题，所以存数据库
    public function saveInfo()
    {
    	
    	$session = D('session');
    	$uid = $_SESSION['user']['id'];

    	//先查找用户是否存入
    	$row = $session->where("uid = '$uid'")->select();
    	if ($row) {
    		$session->where(array('uid'=>$uid))->save(array('info'=>$_POST['info']));
    	} else {
    		$session->add(array('uid'=>$uid,'info'=>$_POST['info']));
    	}
    	echo 111;exit;
    }
    //支付宝支付
    public function alipayPost()
    {
    	if (IS_POST) {
    		$model = M();
    		$data = I('post.data');
    		$allPrice = $model->query("SELECT SUM(`price`) AS num FROM sp_subject WHERE id IN($data)");
    		$allPrice = $allPrice[0]['num'];
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
	        $subject = "麦忒选课";
	        //必填
	        //付款金额
	        $total_fee = $allPrice;
	        //必填
	        //订单描述
	        $body = "麦忒在线选课";
	        //商品展示地址
	        $show_url = WEB_PATH.U('user/center/checkClass');
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
	            'type'=>1,
	            'info'=>$data,
	            'uid'=>$_SESSION['user']['id'],
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
    }

    //使用微信支付进行支付
    public function wxpay()
    {
		$session = D('session');
		$uid = $_SESSION['user']['id'];
		$info = $session->where(array("uid"=>$uid))->getField("info");
		$info = rtrim($info);
		$data = str_replace("   ",",",$info);
		$sql = "SELECT id,name,price FROM sp_subject WHERE id IN($data)";
		$model = M();
		$result = $model->query($sql);
		//var_dump($result);
		$sql = "SELECT SUM(`price`) AS num FROM sp_subject WHERE id IN($data)";
		$allPrice = $model->query($sql);
		$allPrice = $allPrice[0]['num'] * 100;
		//var_dump($allPrice);exit;
		$this->assign('result',$result);
		$this->assign('price',$allPrice);
		$this->assign('data',$data);
		//引入微信支付所需要的文件
		vendor('wchat.lib.Api');
        vendor('wchat.JsApiPay');
        vendor('wchat.log');
        $show_url = WEB_PATH.U('user/center/checkClass');
        //初始化日志
        $logHandler= new \CLogFileHandler(SITE_PATH."logs/".date('Y-m-d').'.log');
        $log = \Log::Init($logHandler, 15);

        //打印输出数组信息
        /*function printf_info($data)
        {
            foreach($data as $key=>$value){
                echo "<font color='#00ff55;'>$key</font> : $value <br/>";
            }
        }*/
        //①、获取用户openid
        $tools = new \JsApiPay();
        $openId = $tools->GetOpenid();
        $order_number = \WxPayConfig::MCHID.date("YmdHis");
        //var_dump($openId);exit;
        //②、统一下单
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("麦忒在线选课");
        $input->SetAttach("麦忒在线选课");
        $input->SetOut_trade_no($order_number);
        $input->SetTotal_fee($allPrice);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("麦忒在线选课");
        $input->SetNotify_url("http://www.010home.net/index.php/portal/index/notify.html");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);
        //echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
        //printf_info($order);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        //var_dump($jsApiParameters);
        $this->assign('jsApiParameters',$jsApiParameters);
        //获取共享收货地址js函数参数
        $editAddress = $tools->GetEditAddressParameters();
        $this->assign('editAddress',$editAddress);
        $array = array(
	            'order_number'=>$order_number,
	            'order_name'=>"麦忒在线选课",
	            'order_money'=>$allPrice / 100,
	            'order_body'=>"麦忒在线选课",
	            'order_url'=>$show_url,
	            'type'=>2,
	            'info'=>$data,
	            'uid'=>$_SESSION['user']['id'],
	            'add_time'=>date('Y-m-d H:i:s'),
	    );
	    $this->assign('order_number',$order_number);
	    D('order')->add($array);
		$this->display(':wxpay');
    		
    }
   //微信支付成功后调用修改状态
    public function wxpayChange()
    {
    	$order_number = $_POST['order'];
    	$order = D('order');
    	$row = $order->where(array('order_number'=>$order_number))->save(array('status'=>1));
    	if ($row) {
    		echo 1;exit;
    	} else {
    		echo 2;exit;
    	}
    }

    //微信支付成功页面
    public function pay_success()
    {
    	$this->display();
    }

    //微信支付失败页面
    public function pay_error()
    {
    	$this->display();
    }

    //用户订单中心
    public function orderInfo()
    {
    	$order = D('order');
    	$count = $order->where(array('uid'=>$this->userid))->count();
    	$page = $this->page($count,10);
    	$result = $order->where(array('uid'=>$this->userid))->limit($page->firstRow.",".$page->listRows)->select();
    	$this->assign('page',$page->show('Admin'));
    	$this->assign('result',$result);
    	$this->display();
    }

    //用户退出登录
    public function logout()
    {
    	session_destroy();
    	echo "<script>window.location.href='/'</script>";
    }
}
