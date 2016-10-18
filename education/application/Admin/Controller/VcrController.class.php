<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
//vcr视频管理
class VcrController extends AdminbaseController
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

	public function add()
	{
		$this->display();
	}

	public function add_post()
	{
		if (IS_POST) {
			$name = $_POST['name'];
			$type = $_POST['type'];
			$about = $_POST['about'];
			$img = $_POST['img'];
			if (!$name || !$type || !$about) {
				$this->error('参数错误');
			}
			if (!$_FILES["uploadmedia"]["name"]){
                $this->error('请选择文件');
            }

            if($_FILES["uploadmedia"]["error"] == 0){
                $path = "uploads".'/'.$_FILES["uploadmedia"]["name"];
                move_uploaded_file($_FILES["uploadmedia"]["tmp_name"],$path);
            }
            $array = ['name'=>$name,'type'=>$type,'about'=>$about,'img'=>$img,'media'=>$path,'addtime'=>date('Y-m-d H:i:s')];
            $row = $this->vcr->add($array);
            if ($row) {
            	$this->success('成功',U('Vcr/index'));
            } else {
            	$this->error('失败');
            }
		}
	}

	public function edit()
	{
		$id = $_GET['id'];
		if (!$id) {
			$this->error('GET OUT');
		}
		$info = $this->vcr->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	public function edit_post()
	{
		if (IS_POST) {
			$id = $_POST['id'];
			if (!$id) {
				$this->error('GET OUT!');
			}

			$name = $_POST['name'];
			$type = $_POST['type'];
			$about = $_POST['about'];
			$img = $_POST['img'];
			if (!$name || !$type || !$about) {
				$this->error('参数错误');
			}
			$array = ['name'=>$name,'type'=>$type,'about'=>$about,'img'=>$img,'media'=>$path];
			if(!$_FILES["uploadmedia"]["name"]){
                $path = "uploads".'/'.$_FILES["uploadmedia"]["name"];
                move_uploaded_file($_FILES["uploadmedia"]["tmp_name"],$path);
                $array['file'] = $path;
            }
            $row = $this->vcr->where("vid = '$id'")->save($array);
            if ($row) {
            	$this->success('修改成功',U('Vcr/index'));
            } else {
            	$this->error('修改失败');
            }
		}
	}

	public function delete()
	{
		$id = $_GET['id'];
		if (!$id) {
			$this->error('GET OUT!');
		}
		$row = $this->vcr->where("vid = '$id'")->delete();
		if ($row) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
	}
}