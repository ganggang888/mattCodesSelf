<?php

/**
 * 标签
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class TagController extends AdminbaseController {
	protected $tag = null;
	
	function _initialize() {
		$this->tag = D("Common/Tag");
		parent::_initialize();
	}
	
	//标签首页
	public function index()
	{
		$count = $this->tag->count();
		$page = $this->page($count,10);
		$result = $this->tag->limit($page->firstRow,$page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}
	//添加标签
	public function add()
	{
		$this->display(); 
	}
	//添加标签post
	public function add_post()
	{
		if (IS_POST) {
			if ($this->tag->create()) {
				if ($this->tag->add()!==false) {
					$this->success('添加成功',U('Tag/index'));
				} else {
					$this->error('添加失败',U('Tag/index'));
				}
			} else {
				$this->error($this->tag->getError());
			}
		}
	}

	//修改
	public function edit()
	{
		$id = I('get.id');
		if ($id) {
			$info = $this->tag->find($id);
			$this->assign('info',$info);
			$this->display();
		}
	}

	//修改post
	public function edit_post()
	{
		if (IS_POST) {
			if ($this->tag->create()) {
				if ($this->tag->where(array('id'=>$_POST['id']))->save()!==false) {
					$this->success('修改成功',U('Tag/index'));
				} else {
					$this->error('修改失败',U('Tag/index'));
				}
			} else {
				$this->error($this->tag->getError());
			}
		}
	}

	//删除标签
	public function delete()
	{
		$id = I('get.id');
		if ($id) {
			if ($this->tag->where(array('id'=>$id))->delete()) {
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}
}