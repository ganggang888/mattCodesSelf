<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class ElectiveController extends AdminbaseController
{
	protected $teacher = null;
	protected $course = null;
	function _initialize() {
		parent::_initialize();
		$this->teacher = D("Common/Teacher"); //实例化老师表
		$this->course = D("Common/Course"); //实例化课程分类表
	}

	public function defaults()
	{

	}

	//教师列表
	public function teacher()
	{
		$count = $this->teacher->count();
		$page = $this->page($count,20);
		$result = $this->teacher->limit($page->firstRow,$page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}

	//添加教师
	public function add_teacher()
	{
		$this->display();
	}

	//提交添加教师信息
	public function add_teacher_post()
	{
		if (IS_POST) {
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$_POST['demeanor']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}
			$_POST['demeanor'] = json_encode($_POST['demeanor']);
			unset($_POST['photos_alt']);unset($_POST['photos_url']);
			$_POST['add_time'] = date("Y-m-d H:i:s");
			if ($this->teacher->create()) {
				if ($this->teacher->add($_POST)!==false) {
					$this->success('添加成功',U('Elective/teacher'));
				} else {
					$this->error('添加失败',U('Elective/teacher'));
				}
			} else {
				$this->error($this->teacher->getError());
			}
		}
	}

	//修改教师信息
	public function edit_teacher()
	{
		$id = I('get.id');
		if ($id) {
			$info = $this->teacher->find($id);
			$this->assign('info',$info);
			$this->display();
		}
	}

	//提交修改教师信息
	public function edit_teacher_post()
	{
		if (IS_POST) {
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])) {
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$_POST['demeanor']['photo'][] = array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}
			$_POST['demeanor'] = json_encode($_POST['demeanor']);
			unset($_POST['photos_alt']);unset($_POST['photos_url']);
			if ($this->teacher->create()) {
				if ($this->teacher->where(array('id'=>$_POST['id']))->save($_POST) !== false) {
					$this->success('修改成功',U('Elective/teacher'));
				} else {
					$this->error('修改失败',U('Elective/teacher'));
				}
			} else {
				$this->error($this->teacher->getError());
			}
		}
	}

	//删除教师信息
	public function delete_teacher()
	{
		$id = I('get.id');
		if ($id) {
			if ($this->teacher->where(array('id'=>$id))->delete()) {
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}

	//课程分类信息
	public function course()
	{
		$count = $this->course->count();
		$page = $this->page($count,15);
		$result = $this->course->limit($page->firstRow,$page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}

	//添加课程分类信息
	public function add_course()
	{
		$this->display();
	}

	//提交添加课程分类信息
	public function add_course_post()
	{
		if (IS_POST) {
			if ($this->course->create()) {
				if ($this->course->add($_POST)!==false) {
					$this->success('添加成功',U('Elective/course'));
				} else {
					$this->success('添加失败',U('Elective/course'));
				}
			} else {
				$this->error($this->course->getError());
			}
		}
	}

	//修改课程分类信息
	public function edit_course()
	{
		$id = I('get.id');
		if ($id) {
			$info = $this->course->find($id);
			$this->assign('info',$info);
			$this->display();
		}
	}

	//提交修改课程分类信息
	public function edit_course_post()
	{
		if (IS_POST) {
			if ($this->course->create()) {
				if ($this->course->where(array('id'=>$_POST['id']))->save()!==false) {
					$this->success('修改成功',U('Elective/course'));
				} else {
					$this->success('修改失败',U('Elective/course'));
				}
			} else {
				$this->error($this->course->getError());
			}
		}
	}

	//删除课程分类信息
	public function delete_course()
	{
		$id = I('get.id');
		if ($id) {
			if ($this->course->where(array('id'=>$id))->delete()) {
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}
}