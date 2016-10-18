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
use Portal\Controller\FormController;
/**
 * 首页
 */
class IndexController extends HomeBaseController {
	
	private $_aid = null;
    private $model = null;
	public function _initialize()
	{
		parent::_initialize();
		$this->_aid = D("Common/Aid");
        $this->model = M();
	}
    //首页
	public function index() {
        $info = new \Portal\Controller\FormController(123456);
    	$this->display(":index");
    }

    //matt教具
    public function toy()
    {
    	//找出教具所有系列
    	$result = $this->_aid->where(array('parentid'=>0))->select();

    	foreach ($result as $vo) {
    		$row[] = $this->_aid->where(array("parentid"=>$vo['id']))->limit(0,3)->select();
    	}
    	$this->display();
    }

    //我们
    public function aboutUs()
    {
        $result = $this->model->query("SELECT * FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id = 3");
        $this->assign('result',$result);
        $this->display();
    }

    //点击获取信息
    public function info()
    {
    	$id = I('get.id');
    	if ($id) {
	    	$result = $this->model->query("SELECT post_title,post_content FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.tid = $id");
	    	$html = "<ul class=\"list-unstyle text-default height-big\" style=\"margin-top:26px;\" >
	        <li class=\"text-main text-big\">".$result[0]['post_title']."</li>
	        ".$result[0]['post_content']."
	      </ul>";
	      echo $html;
      }
    }

    //聊天记录
    public function message()
    {
        $model = M();
        $count = $model->query("SELECT COUNT(*) AS num FROM ofmessagearchive ORDER BY sentDate DESC");
        $num = $count[0]['num'];
        $page = $this->page($num,10000);
        $result = $model->query("SELECT fromJID,toJID,body,sentDate FROM ofmessagearchive ORDER BY sentDate DESC LIMIT ".$page->firstRow.",".$page->listRows);
        $this->assign('page',$page->show('Admin'));
        $this->assign('result',$result);
        $this->display();
    }

}


