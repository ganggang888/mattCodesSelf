<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class PregnancyController extends AdminbaseController
{
	protected $pregnancy = null;
	function _initialize() {
		parent::_initialize();
		$this->pregnancy = D("Common/Pregnancy");
	}

	//每周孕期信息
	public function index()
	{
		$week = I('get.week');
		$where = " id > 0 ";
		$week ? $where .= " AND week = $week" : '';
		$count = $this->pregnancy->where($where)->count();
		$page = $this->page($count,10);
		$result = $this->pregnancy->where($where)->limit($page->firstRow,$page->listRows)->order("week ASC")->select();
		$this->assign('week',$week);
		$this->assign('result',$result);
		$this->assign('page',$page->show('Admin'));
		$this->display();
	}

	//修改孕期相关信息
	public function edit()
	{
		if (IS_POST) {
			if ($this->pregnancy->create() !== false) {
				if ($this->pregnancy->where(array('id'=>$_POST['id']))->save($_POST) !== false) {
					$this->success("修改成功",U("Pregnancy/index"));
				} else {
					$this->error("修改失败",U("Pregnancy/index"));
				}
			} else {
				$this->error($this->pregnancy->getError());
			}
		}
		$id = I('get.id');
		!$id ? $this->error('GET OUT') : '';
		$info = $this->pregnancy->where(array('id'=>$id))->find();
		$this->assign('info',$info);
		$this->display();
	}
}