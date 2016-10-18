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
/**
 * 文章列表
*/
class ListController extends HomeBaseController {

	protected $_post = null;
	protected $model = null;
	public function _initialize()
	{
		parent::_initialize();
		$this->model = M();
	}
	//文章内页
	public function index() {
		$term=sp_get_term($_GET['id']);
		if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    	
		    return ;
		}
		$new = $this->years(2);
		$tplname=$term["list_tpl"];
    	$tplname=sp_get_apphome_tpl($tplname, "list");
    	$this->assign($term);
    	$this->assign('cat_id', intval($_GET['id']));
    	$this->display(":$tplname");
	}
	
	
	public function nav_index(){
		$navcatname="文章分类";
		$datas=sp_get_terms("field:term_id,name");
		$navrule=array(
				"action"=>"List/index",
				"param"=>array(
						"id"=>"term_id"
				),
				"label"=>"name");
		exit(sp_get_nav4admin($navcatname,$datas,$navrule));
	}

	//新闻
	public function news()
    {
    	$year = $this->years(1);
    	$this->assign('year',$year);
    	$years = (I('get.year') ? I('get.year') :$year[0]['year']);
    	//$years = $year[0]['year'];
    	$this->assign('years',$years);
    	$num = $this->model->query("SELECT COUNT(*) AS num FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id = 1 AND YEAR(post_modified) = $years");
    	$count = $num[0]['num'];
    	$page = $this->page($count,10);
    	$result = $this->model->query("SELECT * FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id = 1 AND YEAR(post_modified) = $years ORDER BY post_modified DESC LIMIT ".$page->firstRow.",".$page->listRows);
    	$this->assign('page',$page->show('Admin'));
    	$this->assign('result',$result);
    	$this->display();
    }


	//麦忒大事件
    public function bigThings()
    {
    	$year = $this->years(2);
    	$this->assign('year',$year);
    	$years = (I('get.year') ? I('get.year') :$year[0]['year']);
    	//$years = $year[0]['year'];
    	$this->assign('years',$years);
    	$num = $this->model->query("SELECT COUNT(*) AS num FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id = 2 AND YEAR(post_modified) = $years");
    	$count = $num[0]['num'];
    	$page = $this->page($count,10);
    	$result = $this->model->query("SELECT * FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id = 2 AND YEAR(post_modified) = $years ORDER BY post_modified DESC LIMIT ".$page->firstRow.",".$page->listRows);
    	$this->assign('page',$page->show('Admin'));
    	$this->assign('result',$result);
    	$this->display();
    }

	//新闻所在年份
	private function years($term_id)
	{
    	$row = $this->model->query("SELECT YEAR(`post_modified`) AS year FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id = $term_id GROUP BY YEAR(`post_modified`) ORDER BY post_modified DESC");
    	return $row;
	}


	
}
