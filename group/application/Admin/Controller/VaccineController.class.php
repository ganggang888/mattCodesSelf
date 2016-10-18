<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class VaccineController extends AdminbaseController
{
	protected $vaccine = null;
	protected $BabyDay = null;
	function _initialize() {
		parent::_initialize();
		$this->vaccine = D("Common/Vaccine");
		$this->BabyDay = D("Common/BabyDay");
	}

	//疫苗列表
	public function index()
	{
		$name = I('get.name');
		$month = I('get.month');
		if (!$month) {
			$month = 0;
		}
		$where = "id > 0 ";
		$name ? $where .= " AND INSTR(`name`,'$name') " : '';
		$month != '所有' ? $where .= " AND required_months = $month" : '';
		$count = $this->vaccine->where($where)->count();
		$page = $this->page($count,15);
		$result = $this->vaccine->where($where)->limit($page->firstRow,$page->listRows)->select();
		$this->assign('result',$result);
		$this->assign('month',$month);
		$this->assign('name',$name);
		$this->assign('page',$page->show('Admin'));
		$this->display();
	}

	//修改疫苗列表
	public function edit()
	{
		if (IS_POST) {
			if ($this->vaccine->create() !== false) {
				if ($this->vaccine->where(array('id'=>$_POST['id']))->save($_POST) !== false) {
					$this->success("修改成功",U("Vaccine/index"));
				} else {
					$this->error("修改失败",U("Vaccine/index"));
				}
			} else {
				$this->error($this->vaccine->getError());
			}
		}
		$id = I('get.id');
		if (!$id) {
			$this->error("GET OUT!");
		}
		$info = $this->vaccine->where(array('id'=>$id))->find();
		if (!$info) {
			$this->error("信息不存在");
		}
		$this->assign('info',$info);
		$this->display();
	}

	//添加疫苗列表
	public function add()
	{
		if (IS_POST) {
			if ($this->vaccine->create() !== false) {
				if ($this->vaccine->add($_POST) !== false) {
					$this->success("添加成功",U('Vaccine/index'));
				} else {
					$this->error("添加失败",U("Vaccine/index"));
				}
			} else {
				$this->error($this->vaccine->getError());
			}
		}
		$this->display();
	}

	//删除疫苗信息
	public function delete()
	{
		$id = I('get.id');
		!$id ? $this->error("GET OUT!!") : '';
		$this->vaccine->where(array('id'=>$id))->delete() ? $this->success('删除成功') : $this->error('删除失败');
	}

	//宝宝每日列表信息
	public function getBabyInfo()
	{
		$day = I('get.day');
		$name = I('get.name');
		$where = "id > 0";
		$day ? $where .= " AND day = '$day'" : '';
		$name ? $where .= " AND INSTR(`info`,'$name')" : '';
		$count = $this->BabyDay->where($where)->count();
		$page = $this->page($count,10);
		$result = $this->BabyDay->where($where)->order("day DESC")->limit($page->firstRow,$page->listRows)->select();
		$this->assign('day',$day);
		$this->assign('name',$name);
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}

	//添加宝宝每日信息
	public function addBabyDay()
	{
		if (IS_POST) {
			!is_int(intval($_POST['day'])) ? $this->error('必须为数字') : '';
			$_POST['add_time'] = date("Y-m-d H:i:s");
			if ($this->BabyDay->create() != false) {
				if ($this->BabyDay->add($_POST) !== false) {
					$this->success('添加成功',U('Vaccine/getBabyInfo'));
				} else {
					$this->error('添加失败',U('Vaccine/getBabyInfo'));
				}
			} else {
				$this->error($this->BabyDay->getError());
			}
		}
		$this->display();
	}

	//修改每日宝宝信息
	public function editBabyDay()
	{
		if (IS_POST) {
			!is_int(intval($_POST['day'])) ? $this->error('必须为数字') : '';
			if ($this->BabyDay->where(array('id'=>$_POST['id']))->save($_POST) !== false) {
				$this->success('修改成功',U('Vaccine/getBabyInfo'));
			} else {
				$this->error('修改失败',U('Vaccine/getBabyInfo'));
			}
		}
		$id = I('get.id');
		!$id ? $this->error("GET OUT") : '';
		$info = $this->BabyDay->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	//删除某一天的宝宝信息
	public function deleteBabyInfo()
	{  
		$id = I('get.id');
		!$id ? $this->error("GET OUT") : '';
		$this->BabyDay->where(array('id'=>$id))->delete() ? $this->success('删除成功',U('Vaccine/getBabyInfo')) : $this->error('删除失败',U('Vaccine/getBabyInfo'));
	}
}