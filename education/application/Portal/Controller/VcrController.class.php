<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class VcrController extends HomeBaseController
{
	protected $vcr = null;
	function _initialize() {
		parent::_initialize();
		$this->vcr = D('vcr');
	}

	public function index()
	{
		$count = $this->vcr->count();
		$page = $this->page($count,20);
		$rows = $this->vcr->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('rows',$rows);
		$this->display();
	}

	public function detail()
	{
		$id = $_GET['id'];
		if (!$id) {
			$this->error('GET OUT!');
		}
		$info = $this->vcr->find($id);
		$this->assign('info',$info);
		$this->display();
	}
}