<?php

/**
 * 会员
 */
namespace User\Controller;
use Common\Controller\AdminbaseController;
class IndexadminController extends AdminbaseController {
    protected $order = null; //订单
    protected $users = null; //用户
    public function _initialize()
    {
        parent::_initialize();
        $this->order = D('order'); //实例化订单
        $this->users = D('users'); //实例化用户
    }
    function index(){
    	$users_model=M("Users");
    	$count=$users_model->where(array("user_type"=>2))->count();
    	$page = $this->page($count, 20);
    	$lists = $users_model
    	->where(array("user_type"=>2))
    	->order("create_time DESC")
    	->limit($page->firstRow . ',' . $page->listRows)
    	->select();
    	$this->assign('lists', $lists);
    	$this->assign("page", $page->show('Admin'));
    	
    	$this->display(":index");
    }
    
    function ban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$rst = M("Users")->where(array("id"=>$id,"user_type"=>2))->setField('user_status','0');
    		if ($rst) {
    			$this->success("会员拉黑成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员拉黑失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    
    function cancelban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$rst = M("Users")->where(array("id"=>$id,"user_type"=>2))->setField('user_status','1');
    		if ($rst) {
    			$this->success("会员启用成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员启用失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }

    //显示订单列表
    public function order()
    {
        $count = $this->order->count();
        $page = $this->page($count,10);
        $result = $this->order->limit($page->firstRow . "," .$page->listRows)->select();
        $this->assign('page',$page->show('Admin'));
        $this->assign('result',$result);
    }

    //用户同步
    public function auto()
    {
        $this->display();
    }


    //用户同步
    public function autoUser()
    {
        //$sql = "SELECT Telephone,password,uuid FROM users WHERE Telephone NOT IN (SELECT user_login FROM sp_users)";
        //echo $sql;exit;
        if (!$_FILES["uploadmedia"]["name"]){
            $this->error('请选择文件');
        }
        if($_FILES["uploadmedia"]["error"] == 0){
            $path = SITE_PATH."uploads".'/user.sql';
            move_uploaded_file($_FILES["uploadmedia"]["tmp_name"],$path);
            }
        echo "数据库文件上传成功<br/>";
        $model = M();
        $check = $model->query("SHOW TABLES LIKE 'users'");
        if ($check) {
            $model->execute("DROP TABLE users");
        }
        echo "正在导入数据库<br/>";
        $info = file_get_contents(SITE_PATH."uploads".'/user.sql');
        $model->execute($info);
        echo "数据库表导入成功<br/>";
        echo "正在计算...<br/>";

        //排除当前已有的手机号
        if ($info == $todo) {
            
        }
        $row = $model->execute("SELECT Telephone,password,uuid FROM users WHERE Telephone NOT IN (SELECT user_login FROM sp_users)");
        foreach ($row as $key => $vo) {
            $array = array(
                'user_login'=>$vo['telephone'],
                'user_pass'=>$vo['password'],
                'user_nicename'=>$vo['telephone'],
                'create_time'=>date("Y-m-d H:i:s"),
                'user_status'=>1,
                'user_type'=>2,
                'uuid'=>$vo['uuid'],
            );
            $data[] = $this->users->add($array);
        }
        echo "成功导入".sizeof($data)."个用户";
    }
}
