<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class PageController extends HomeBaseController{
	public function index() {
		$id=$_GET['id'];
		$content=sp_sql_page($id);
		
		if(empty($content)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		     
		    return ;
		}
		
		$this->assign($content);
		$smeta=json_decode($content['smeta'],true);
		$tplname=isset($smeta['template'])?$smeta['template']:"";
		
		$tplname=sp_get_apphome_tpl($tplname, "page");
		
		$this->display(":$tplname");
	}
	
	public function nav_index(){
		$navcatname="页面";
		$datas=sp_sql_pages("field:id,post_title;");
		$navrule=array(
				"action"=>"Page/index",
				"param"=>array(
						"id"=>"id"
				),
				"label"=>"post_title");
		exit( sp_get_nav4admin($navcatname,$datas,$navrule) );
	}

	//留言
	public function message()
	{
		if (IS_POST) {
			$message = D('message');
			$name = I('post.name');
			$age = I('post.age');
			$phone = I('post.phone');
			$address = I('post.address');
			$content = I('post.content');
			if (!$message || !$name || !$age || strlen($phone) != 11 || !$address || !$content) {
				$this->error('请填入完整信息');
			}
			$array = array(
				'name'=>$name,
				'age'=>$age,
				'phone'=>$phone,
				'address'=>$address,
				'content'=>$content,
				'add_time'=>date("Y-m-d H:i:s"),
			);
			$row = $message->add($array);
			if ($row) {
				$this->success("恭喜您留言成功，我们的客服会尽快与您回复！");
			} else {
				$this->error("留言失败");
			}
		}
		$this->display();
	}

    //微信文章页面
    public function WxArticle()
    {
        $id = I('get.id');
        if ($id) {
            $posts = D('posts');
            $info = $posts->where(array('id'=>$id))->select();
            $this->assign('info',$info[0]);
            $this->display();
            //var_dump($info);
        }
    }
}