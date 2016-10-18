<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class TeacherController extends AdminbaseController{
	protected $teacher = null;

	function _initialize() {
		parent::_initialize();
		$this->teacher = D('teacher');
	}
	public function index()
	{
		$count = $this->teacher->count();
		$page = $this->page($count,20);
		$rows = $this->teacher->limit($page->firstRow . ',' . $page->listRows)->select();
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
			$name = $_POST['name'];
			$background = $_POST['background'];
			$honour = $_POST['honour'];
			$had_do = $_POST['had_do'];
			$book = $_POST['book'];
			$territory = $_POST['territory'];
			$talk = $_POST['talk'];
			$img = $_POST['img'];
			if (!$name || !$background || !$honour || !$img) {
				$this->error('缺少必要参数');
			}

			$array = array(
				'name'	=>	$name,
				'background'=>$background,
				'honour'=>	$honour,
				'had_do'=>	$had_do,
				'book'	=>	$book,
				'territory'=>$territory,
				'talk'	=>	$talk,
				'img'	=>	$img,
				'add_time'	=>	date('Y-m-d H:i:s'),
			);
			$row = $this->teacher->add($array);
			if ($row) {
				$this->success('添加成功',U('Teacher/index'));
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
		$info = $this->teacher->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	public function edit_post()
	{
		if (IS_POST) {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$background = $_POST['background'];
			$honour = $_POST['honour'];
			$had_do = $_POST['had_do'];
			$book = $_POST['book'];
			$territory = $_POST['territory'];
			$talk = $_POST['talk'];
			$img = $_POST['img'];
			if (!$name || !$background || !$honour || !$img) {
				$this->error('缺少必要参数');
			}

			$array = array(
				'name'	=>	$name,
				'background'=>$background,
				'honour'=>	$honour,
				'had_do'=>	$had_do,
				'book'	=>	$book,
				'territory'=>$territory,
				'talk'	=>	$talk,
				'img'	=>	$img,
			);
			$row = $this->teacher->where("id = '$id'")->save($array);
			if ($row) {
				$this->success('修改成功',U('Teacher/index'));
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
		$row = $this->teacher->where("id = '$id'")->delete();
		if ($row) {
			$this->success('删除成功',U('Teacher/index'));
		} else {
			$this->error('删除失败');
		}
	}
}