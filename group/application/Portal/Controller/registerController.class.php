<?php
//麦麦育儿机器人注册页面
namespace Portal\Controller;
use Common\Controller\HomebaseController;
class RegisterController extends HomebaseController
{
	protected $api = 'https://api.sms.mob.com';
	protected $appkey = '5e2bebe5f488';
	protected $user;
	function _initialize() {
		parent::_initialize();
		$this->user = D("Common/Users");
	}

	//注册
	/**
	*@param $phone 手机号
	*@param $password1 密码
	*@param $password2 重复密码
	*@param $nickname 昵称
	*@param $relevance 关系
	*@param $pregnancy 当前状态
	*@param $ip 用户当前ip
	*@param $day 预产期，如果当前状态在怀孕中则需要填写此项，否则不用传输信息
	*/
	public function index()
	{
		$phone = I('post.phone');
		$password1 = I('post.password1');
		$password2 = I('post.password2');
		$nickname = I('post.nickname');
		$relevance = I('post.relevance');
		$pregnancy = I('post.pregnancy');
		$pid = I('get.parent');
		$uid = uuid();
		$day = I('post.day');
		$ip = I('post.id');
		if ($_SESSION['phone_number'] != $phone || $_SESSION['phone_code'] != true) {
			AjaxReturn(0,'GET OUT',0,1);
		}
		if (strlen($phone) != 11) {
			AjaxReturn(0,'手机号码格式不正确',0,1);
		}
		if ($password1 != $password2) {
			AjaxReturn(0,'两次密码输入不一致',0,1);
		}
		if ($_SESSION['phone_code'] == false) {
			AjaxReturn(0,'GET OUT',0,1);
		}
		$row = $this->users->register($phone,md5($password1),$nickname,$relevance,$pregnancy,$uid,$ip,$pid,$day);
		if ($row) {
			AjaxReturn(0,'注册成功请使用新的账号进行登录',0,0);
		} else {
			AjaxReturn(0,'注册失败',0,1);
		}
	}

	//给手机发送验证码
	public function sendCode()
	{
		$phone = I('post.phone');
		//先判断是否注册过

		if (strlen($phone) != 11) {
			AjaxReturn(0,'手机格式错误',0,1);
		}
		// 发送验证码
		$response = postRequest( $this->api . '/sms/sendmsg', array(
		    'appkey' => $this->appkey,
		    'phone' => $phone,
		    'zone' => '86',
		) );
		$info = json_decode($response);
		if ($info == 200) {
			AjaxReturn(0,0,0,0);
		}
	}

	//验证手机验证码
	public function checkPhone()
	{
		$code = I('post.code');
		$phone = I('post.phone');
		if (!$code && strlen($phone) != 11) {
			AjaxReturn(0,'参数错误',0,1);
		}
		// 发送验证码
		$response = postRequest( $this->api . '/sms/checkcode', array(
		    'appkey' => $this->appkey,
		    'phone' => $phone,
		    'zone' => '86',
			'code' => $code,
		));
		$info = json_decode($response);
		if ($info->status == 200) {
			$_SESSION['phone_number'] = $phone;
			$_SESSION['phone_code'] = true;
		} else {
			AjaxReturn(0,'验证码错误',0,1);
		}
	}


}