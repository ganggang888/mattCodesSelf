<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class AidController extends AdminbaseController
{
	protected $_aid = null;
	protected $term = null;
	function _initialize() {
		parent::_initialize();
		$this->term = array(
			array('id'=>1,'name'=>'9-12个月教具'),
			array('id'=>2,'name'=>'5-8个月教具'),
			array('id'=>3,'name'=>'0-4个月教具'),
		);
		$this->_aid = D("Common/Aid"); //实例化model
		$this->assign('term',$this->term);
	}

	public function index()
	{
		$result = $this->_aid->select();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("Aid/add", array("parent" => $r['id'])) . '">添加子类</a> | <a href="' . U("Aid/edit", array("id" => $r['id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("Aid/delete", array("id" => $r['id'])) . '">删除</a> ';
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
					<td><img src='\$img' style='width:100px'></td>
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
	 	$terms = $this->_aid->select();
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
			if($_FILES["uploadmedia"]["error"] == 0){
                $path = "uploads".'/'.$_FILES["uploadmedia"]["name"];
                move_uploaded_file($_FILES["uploadmedia"]["tmp_name"],$path);
            }
            $_POST['gif'] = $path;
			$_POST['addtime'] = date("Y-m-d H:i:s");
			if ($this->_aid->create()) {
				if ($this->_aid->add($_POST)) {
					$this->success('添加成功',U('Admin/Aid/index'));
				} else {
					$this->error('添加失败',U('Admin/Aid/index'));
				}
			} else {
				$this->error($this->subject->getError());
			}
		}
	}

	public function edit()
	{
		$id = I('get.id');
		$data=$this->_aid->where(array("id" => $id))->find();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$terms = $this->_aid->where(array("id" => array("NEQ",$id)))->select();
		
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
		$info = $this->_aid->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	public function edit_post()
	{
		if (IS_POST) {
			$id = $_POST['id'];
			if($_FILES["uploadmedia"]["error"] == 0){
                $path = "uploads".'/'.$_FILES["uploadmedia"]["name"];
                move_uploaded_file($_FILES["uploadmedia"]["tmp_name"],$path);
            }
            $_POST['gif'] = $path;
			unset($_POST['id']);
			if ($this->_aid->create()) {
				if ($this->_aid->where(array('id'=>$id))->save($_POST)) {
					$this->success('修改成功',U('Admin/aid/index'));
				} else {
					$this->error('修改失败',U('Admin/aid/index'));
				}
			} else {
				$this->error($this->subject->getError());
			}
		}
	}

	public function delete()
	{
		$id = intval(I('get.id'));
		$parent = $this->_aid->where("id = '$id'")->delete();
		$son = $this->_aid->where("parentid = '$id'")->delete();
		if ($parent || $son) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
	}
}