<?php
//课程信息
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class SubjectController extends HomeBaseController
{
	protected $_info = null;
	public function _initialize()
	{
		parent::_initialize();
		$this->_info = D("Common/SubjectInfo");
	}

	//课程列表页面
	public function index()
	{
		$term_id = I('get.term_id');
		$count = $this->_info->where(array('term_id'=>$term_id))->count();
		$page = $this->page($count,10);
		$result = $this->_info->where(array('term_id'=>$term_id))->limit($page->firstRow.','.$page->listRows);
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}

	//课程单页面
	public function page()
	{
		$id = intval(I('get.id'));
		M("SubjectInfo")->where("id = '$id'")->setInc('hits'); //记录加一
		$_SESSION['hits'] = true;
		$info = $this->_info->find($id);
		$this->assign('info',$info);
		$this->display();
	}


	
}