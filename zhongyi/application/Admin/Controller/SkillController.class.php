<?php

/**
 * 后台首页
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class SkillController extends AdminbaseController {
	protected $skill;
	
	function _initialize() {
		$this->skill = D("Common/Skill");
		parent::_initialize();
	}

    public function index() {
        $count = $this->skill->count();
        $page = $this->page($count,20);
        $result = $this->skill->limit($page->firstRow,$page->listRows)->select();
        $this->assign('page',$page->show('Admin'));
        $this->assign('result',$result);
        $this->display();
    }

    public function add()
    {
    	$this->display();
    }
    
    public function add_post()
    {
    	if(IS_POST){
			if ($this->skill->create()) {
				if ($this->skill->add()!==false) {
					$this->success("添加成功！", U("Skill/index"));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->link_model->getError());
			}
		
		}
    }
    public function edit()
    {
    	$id = I('get.id');
    	if ($id) {
    		$info = $this->skill->find($id);
    		$this->assign('info',$info);
    		$this->display();
    	}
    }
    public function edit_post()
    {
    	if (IS_POST) {
			if ($this->skill->create()) {
				if ($this->skill->where(array('id'=>$_POST['id']))->save()!==false) {
					$this->success("保存成功！",U('Admin/Skill/index'));
				} else {
					$this->error("保存失败！",U('Admin/Skill/index'));
				}
			} else {
				$this->error($this->link_model->getError());
			}
		}
    }
    public function delete()
    {
    	$id = I('get.id');
    	if ($id) {
    		$this->skill->where(array('id'=>$id))->delete();
    		$this->success('删除成功');
    	}
    }
	
	//我有一技
	public function xianji()
	{
		$xianji = D('xianji');
		$count = $xianji->count();
		$page = $this->page($count,10);
		$result = $xianji->limit($page->firstRow,$page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}
	//删除献计
	public function delete_xianji()
	{
		$id = I('get.id');
		$xianji = D('xianji');
		if ($id) {
			if ($xianji->where(array('id'=>$id))->delete()) {
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}
	//推荐列表
	public function tuijian()
	{
		$tuijian = D('tuijian');
		$count = $tuijian->count();
		$page = $this->page($count,10);
		$result = $tuijian->limit($page->firstRow,$page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}
	//删除推荐人列表信息
	public function delete_tuijian()
	{
		$tuijian = D('tuijian');
		$id = I('get.id');
		if ($id) {
			if ($tuijian->where(array('id'=>$id))->delete()) {
				$this->success('删除成功');
			} else {
				$this->error('删除失败');
			}
		}
	}

}

