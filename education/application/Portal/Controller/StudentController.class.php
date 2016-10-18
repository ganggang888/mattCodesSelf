<?php
//学员
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class StudentController extends HomeBaseController
{
	protected $student = null;

	function _initialize() {
		parent::_initialize();
		$this->student = D('student');
	}

	//列表
	public function index()
	{
		$count = $this->student->count();
		$page = $this->page($count,10);
		$rows = $this->student->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('rows',$rows);
		$this->display();
	}

	//详细页面
	public function detail()
	{
		$id = $_GET['id'];
		$info = $this->student->find($id);
		$this->assign('info',$info);
		$this->display();
	}
}