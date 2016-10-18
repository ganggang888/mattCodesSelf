<?php
/**
 * 学员的课程介绍
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;

class InfoController extends AdminbaseController 
{
	private $info = null; //学员所有课程分类录入
	protected $code = null;
	public function _initialize()
	{
		parent::_initialize();
		$this->info = D("Common/Info");
		$this->code = D('code');
	}

	public function index()
	{
		$result = $this->info->select();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("Info/add", array("parent" => $r['id'])) . '">添加子类</a> | <a href="' . U("Info/edit", array("id" => $r['id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("Info/delete", array("id" => $r['id'])) . '">删除</a> ';
			$url=U('portal/list/index',array('id'=>$r['id']));
			$r['url'] = $url;
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['id'];
			$r['parentid']=$r['parentid'];
			$array[] = $r;
		}
		
		$tree->init($array);
		$str = "<tr>
					<td>\$id</td>
					<td>\$spacer \$name</td>
					<td>\$str_manage</td>
				</tr>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign('taxonomys',$taxonomys);
		$this->display();
	}

	public function add()
	{
		$parentid = intval(I("get.parent"));
	 	$tree = new \Tree();
	 	$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
	 	$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
	 	$terms = $this->info->select();
	 	
	 	$new_terms=array();
	 	foreach ($terms as $r) {
	 		$r['id']=$r['id'];
	 		$r['parentid']=$r['parentid'];
	 		$r['selected']= (!empty($parentid) && $r['id']==$parentid)? "selected":"";
	 		$new_terms[] = $r;
	 	}
	 	$tree->init($new_terms);
	 	$tree_tpl="<option value='\$id' \$selected>\$spacer\$name</option>";
	 	$tree=$tree->get_tree(0,$tree_tpl);
	 	
	 	$this->assign("terms_tree",$tree);
	 	$this->assign("parent",$parentid);
		$this->display();
	}

	public function add_post()
	{
		if (IS_POST) {
			if ($this->info->create()) {
				if ($this->info->add($_POST)) {
					$this->success('添加成功',U('Admin/Info/index'));
				} else {
					$this->error('添加失败',U('Admin/Info/index'));
				}
			} else {
				$this->error($this->subject->getError());
			}
		}
	}

	public function edit()
	{
		$id = I('get.id');
		$data=$this->info->where(array("id" => $id))->find();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$terms = $this->info->where(array("id" => array("NEQ",$id)))->select();
		
		$new_terms=array();
		foreach ($terms as $r) {
			$r['id']=$r['id'];
			$r['parentid']=$r['parentid'];
			$r['selected']=$data['parentid']==$r['id']?"selected":"";
			$new_terms[] = $r;
		}
		
		$tree->init($new_terms);
		$tree_tpl="<option value='\$id' \$selected>\$spacer\$name</option>";
		$tree=$tree->get_tree(0,$tree_tpl);
		
		$this->assign("terms_tree",$tree);
		$info = $this->info->find($id);
		$this->assign('info',$info);
		$this->display();
	}


	public function edit_post()
	{
		if (IS_POST) {
			$id = $_POST['id'];
			unset($_POST['id']);
			if ($this->info->create()) {
				if ($this->info->where(array('id'=>$id))->save($_POST)) {
					$this->success('修改成功',U('Admin/Info/index'));
				} else {
					$this->error('修改失败',U('Admin/Info/index'));
				}
			} else {
				$this->error($this->subject->getError());
			}
		}
	}

	public function delete()
	{
		$id = intval(I('get.id'));
		$parent = $this->info->where("id = '$id'")->delete();
		$son = $this->info->where("parentid = '$id'")->delete();
		if ($parent || $son) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
	}
}