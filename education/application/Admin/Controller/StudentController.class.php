<?php
//学员管理
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class StudentController extends AdminbaseController
{
	protected $student = null;

	function _initialize() {
		parent::_initialize();
		$this->student = D('student');
	}

	public function index()
	{
		$count = $this->student->count();
		$page = $this->page($count,20);
		$rows = $this->student->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('rows',$rows);
		$this->display();
	}

	public function add()
	{
		$this->display();
	}

	public function add_post()
	{
		if (IS_POST) {
			$num = $_POST['num'];
			$place = $_POST['place'];
			$age = $_POST['age'];
			$education = $_POST['education'];
			$book = $_POST['book'];
			$experience = $_POST['experience'];
			$img = $_POST['img'];
			if (!$num || !$place || !$age || !$education || !$img) {
				$this->error('参缺少必要参数数错误');
			}
			$array = array(
				'num'	=>	$num,
				'place'	=>	$place,
				'age'	=>	$age,
				'education'	=>	$education,
				'book'	=>	$book,
				'experience'=>$experience,
				'img'	=>	$img,
				'add_time'	=>	date('Y-m-d H:i:s'),
			);
			$row = $this->student->add($array);
			if ($row) {
				$this->success('添加成功',U('Student/index'));
			} else {
				$this->error('添加失败');
			}
		}
	}

	public function edit()
	{
		$id = $_GET['id'];
		if (!$id) {
			$this->error('GET OUT');
		}
		$info = $this->student->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	public function edit_post()
	{
		$id = $_POST['id'];
		if (!$id) {
			$this->error('GET OUT');
		}
		if (IS_POST) {
			$num = $_POST['num'];
			$place = $_POST['place'];
			$age = $_POST['age'];
			$education = $_POST['education'];
			$book = $_POST['book'];
			$experience = $_POST['experience'];
			$img = $_POST['img'];
			if (!$num || !$place || !$age || !$education || !$img) {
				$this->error('参缺少必要参数');
			}
			$array = array(
				'num'	=>	$num,
				'place'	=>	$place,
				'age'	=>	$age,
				'education'	=>	$education,
				'book'	=>	$book,
				'experience'=>$experience,
				'img'	=>	$img,
			);
			$row = $this->student->where("id = '$id'")->save($array);
			if ($row) {
				$this->success('修改成功',U('Student/index'));
			} else {
				$this->error('修改失败');
			}
		}
	}

	public function delete()
	{
		$id = $_GET['id'];
		if (!$id) {
			$this->error('GET OUT');
		}
		$row = $this->student->where("id = '$id'")->delete();
		if ($row) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
	}
}