<?php
/**
 * 课程管理
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class SubjectController extends AdminbaseController
{
	private $subject = null; //定义课程管理分类
	private $_info = null; //定义课程列表
	protected $code;
	public function _initialize()
	{
		parent::_initialize();
		$this->subject = D("Common/Subject");
		$this->_info = D("Common/SubjectInfo");
		$this->code = D('code');
	}

	//分类列表
	public function term()
	{
		$result = $this->subject->order("id desc")->select();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("Subject/add_term", array("parent" => $r['id'])) . '">添加子类</a> | <a href="' . U("Subject/edit_term", array("id" => $r['id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("Subject/term_delete", array("id" => $r['id'])) . '">删除</a> ';
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

	//添加分类
	public function add_term()
	{
		$parentid = intval(I("get.parent"));
	 	$tree = new \Tree();
	 	$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
	 	$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
	 	$terms = $this->subject->select();
	 	
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

	//添加分类post
	public function add_term_post()
	{
		if (IS_POST) {
			if ($this->subject->create()) {
				if ($this->subject->add($_POST)) {
					$this->success('添加成功',U('Admin/subject/term'));
				} else {
					$this->error('添加失败',U('Admin/subject/term'));
				}
			} else {
				$this->error($this->subject->getError());
			}
		}
	}

	//修改分类
	public function edit_term()
	{
		$id = I('get.id');
		$data=$this->subject->where(array("id" => $id))->find();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$terms = $this->subject->where(array("id" => array("NEQ",$id)))->select();
		
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
		$info = $this->subject->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	//修改分类post提交
	public function edit_term_post()
	{
		if (IS_POST) {
			$id = $_POST['id'];
			unset($_POST['id']);
			if ($this->subject->create()) {
				if ($this->subject->where(array('id'=>$id))->save($_POST)) {
					$this->success('修改成功',U('Admin/subject/term'));
				} else {
					$this->error('修改失败',U('Admin/subject/term'));
				}
			} else {
				$this->error($this->subject->getError());
			}
		}
	}

	//删除分类
	public function term_delete()
	{
		$id = intval(I('get.id'));
		$parent = $this->subject->where("id = '$id'")->delete();
		$son = $this->subject->where("parentid = '$id'")->delete();
		if ($parent || $son) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
	}

	//课程列表
	public function index()
	{
		$model = M();
		$count = $this->_info->count();
		$page = $this->page($count,10);
		$sql = "SELECT a.id AS id,a.term_id AS term_id,a.title AS title,a. img as img,a.about AS about,a.content AS content,a.hits AS hits,a.add_time AS add_time,b.name AS name FROM ".C("DB_PREFIX")."subject_info a LEFT JOIN ".C("DB_PREFIX")."subject b ON a.term_id = b.id ".$where." ORDER BY a.id DESC LIMIT ".$page->firstRow.",".$page->listRows;
		$result = $model->query($sql);
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();

	}

	//添加课程
	public function add()
	{
		$tree = $this->tree_term();
		$uid = get_current_admin_id();
		$this->assign('uid',$uid);
		$this->assign("terms_tree",$tree);
		$this->display();
	}

	//添加课程post
	public function add_post()
	{
		if (IS_POST) {
			$_POST['content'] = htmlspecialchars_decode($_POST['content']);
			if (!$_POST['term_id'] || !$_POST['title'] || !$_POST['about'] || !$_POST['img']) {
				$this->error('缺少必要信息，请重新填写');
			}
			$result = $row = $this->_info->add($_POST);
			if ($result) {
				$this->success('添加成功',U('Subject/index'));
			} else {
				$this->success('添加失败',U('Subject/index'));
			}
		}
	}

	//修改课程
	public function edit()
	{
		$id = I('get.id');
		$info = $this->_info->find($id);
		$tree = $this->tree_term($info['term_id']);
		$uid = get_current_admin_id();
		$this->assign('uid',$uid);
		$this->assign('info',$info);
		$this->assign("terms_tree",$tree);
		$this->display();
	}

	//修改post
	public function edit_post()
	{
		if (IS_POST) {
			$_POST['content'] = htmlspecialchars_decode($_POST['content']);
			if (!$_POST['term_id'] || !$_POST['title'] || !$_POST['about'] || !$_POST['img']) {
				$this->error('缺少必要信息，请重新填写');
			}
			$result = $this->_info->where(array('id'=>$_POST['id']))->save($_POST);
			if ($result) {
				$this->success('修改成功',U('Subject/index'));
			} else {
				$this->success('修改失败');
			}
		}
	}

	//删除单个课程
	public function delete()
	{
		$id = intval(I('get.id'));
		$result = $this->_info->where(array('id'=>$id))->delete();
		if ($result) {
			$this->success('删除成功',U('Subject/index'));
		} else {
			$this->error('删除失败',U('Subject/index'));
		}
	}

	//课程分类
	private function tree_term($id)
	{
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$terms = $this->subject->select();
		
		$new_terms=array();
		foreach ($terms as $r) {
			$r['id']=$r['id'];
			$r['parentid']=$r['parentid'];
			$r['selected']=$id==$r['id']?"selected":"";
			$new_terms[] = $r;
		}
		
		$tree->init($new_terms);
		$tree_tpl="<option value='\$id' \$selected>\$spacer\$name</option>";
		$tree=$tree->get_tree(0,$tree_tpl);
	 	
	 	return $tree;
	}

	//订单管理
	public function order()
	{
		$phone = I('get.phone');
		$number = I('get.number');
		$model = M();
		$where = "WHERE id > 1 ";
		if ($phone) {
			$where .= " AND uid IN(SELECT id FROM sp_users WHERE user_login LIKE '%$phone%')";
			$this->assign('phone',$phone);
		}
		if ($number) {
			$where .= " AND order_number LIKE '%$number%'";
			$this->assign('number',$number);
		}
		$where .= " AND status = 1 ";
		$order = D('order');
		$num = $model->query("SELECT COUNT(*) AS num FROM sp_order ".$where);
		$count = $num[0]['num'];
		$page = $this->page($count,20);
		$result = $model->query("SELECT * FROM sp_order ".$where." limit ".$page->firstRow .",".$page->listRows);
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}

	public function del()
	{
		$id = I('get.id');
		
	}

	//优惠码管理
	public function code()
	{
		$code = I('get.code');
		$where = " id > 1 ";
		if ($code) {
			$where .= " AND code = '$code'";
			$this->assign('code',$code);
		}
		$count = $this->code->where($where)->count();
		$page = $this->page($count,20);
		$result = $this->code->where($where)->limit($page->firstRow. ',' .$page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}

	//删除优惠码
	public function delCode()
	{
		$id = I('get.id');
		if (!$id) {
			$this->error("GET OUT");
		}
		$row = $this->code->where(array('id'=>$id))->delete();
		if ($row) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
	}

	//将已兑换的优惠码更改为已经兑换
	public function changeCode()
	{
		$id = I('get.id');
		$row = $this->code->where(array('id'=>$id))->save(array('status'=>1));
		if ($row) {
			$this->success('修改成功');
		} else {
			$this->error('修改失败');
		}
	}
}