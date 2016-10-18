<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class EmptyController extends Controller {
	
	protected function _initialize()
    {
        $siteinfo = M('siteinfo')->select();
        $this->assign('siteinfo',$siteinfo);
    }
	
    public function index(){
    	header("location: http://www.mattservice.com");
    }
}

