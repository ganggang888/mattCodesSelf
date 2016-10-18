<?php

//教师信息
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class TeacherController extends HomeBaseController {
	protected $teacher = null;

	function _initialize() {
		parent::_initialize();
		$this->teacher = D('teacher');
	}

	//列表
	public function index()
	{
		$count = $this->teacher->count();
		$page = $this->page($count,10);
		$rows = $this->teacher->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('rows',$rows);
		$this->display();
	}

	//详细页面
	public function detail()
	{
		$id = $_GET['id'];
		$info = $this->teacher->find($id);
		$this->assign('info',$info);
		$this->display();
	}
}