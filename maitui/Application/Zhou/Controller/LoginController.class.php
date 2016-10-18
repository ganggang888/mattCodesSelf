<?php
namespace Zhou\Controller;
use Think\Controller;

class LoginController extends Controller {
    //登录界面
    public function index()
    {
        if(is_login()){
			$this->redirect('Index/index');
		} else {
			session('loginTime',null);
			$this->display();
		}
    }
    
    //处理登录提交表单
    public function submitLogin()
    {
        $username = I('username');
        $password = I('password');
        
        //检查用户名或密码是否正确
        if($username=='' || $password==''){
            echo '用户名或密码不能为空！';
        }else{
            $pw = M('admin')->where('username="'.$username.'"')->getField('password');
           
            if($pw == md5($password.'glenn')){
                session('loginTime', mktime());//保存SESSION
                echo '1';
            }else{
                echo '用户名或密码错误！';
            }
        }
    }
    
    //退出登录
    public function logout()
    {
        session('loginTime',null);
        $this->redirect('Login/index');
    }
}