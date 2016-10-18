<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 文章列表
*/
class ListController extends HomeBaseController {

	//文章内页
	public function index() {
		$term=sp_get_term($_GET['id']);
		
		if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    	
		    return ;
		}
		
		$tplname=$term["list_tpl"];
    	$tplname=sp_get_apphome_tpl($tplname, "list");
    	$this->assign($term);
    	$this->assign('cat_id', intval($_GET['id']));
    	$this->display(":$tplname");
	}
	
	public function nav_index(){
		$navcatname="文章分类";
		$datas=sp_get_terms("field:term_id,name");
		$navrule=array(
				"action"=>"List/index",
				"param"=>array(
						"id"=>"term_id"
				),
				"label"=>"name");
		exit(sp_get_nav4admin($navcatname,$datas,$navrule));
		
	}

	//课程介绍
	public function classInfo()
	{
		$subject = D('subject');
		$result = $subject->where("parentid = 0")->limit("id ASC")->select();
		$this->assign('result',$result);
		$this->display();
	}
    //专家
    public function expert_info(){
        $expertModel = D('expert');
        $where['is_delete'] = 0;
        $data = $expertModel->where($where)->limit('is_top DESC')->select();
        //专家类别
        $typeModel = D('expert_type');
        $types = $typeModel->where('')->select();
        foreach($types as $vo){
            $typeData[$vo['id']] = $vo['type_name'];
        }
        $this->assign('experts',$data);
        $this->assign('types',$typeData);
        $this->display();
    }
    //证书
    public function certificate_info(){
        $certiModel = D('certificate');
        $where['is_delete'] = 0;
        $where['type'] = 1;
        $matt = $certiModel->where($where)->select();
        $where['type'] = 0;
        $gov = $certiModel->where($where)->select();
        $this->assign('matt',$matt);
        $this->assign('gov',$gov);
        $this->display();
    }
    //学员
    public function students_info(){
        $stdModel = D('students');
        $where['is_delete'] = 0;
        $students = $stdModel->where($where)->select();
        $this->assign('students',$students);
        $this->display();
    }

    //诚信查询
    public function chaxun()
    {
        $name = I('get.name');
        if ($name) {
            $model = M();
            $info = $model->query("SELECT * FROM sp_student_main WHERE INSTR(`name`,'$name') OR INSTR(student_id,'$name') ");
            //var_dump($info);exit;
            if (empty($info)) {
                $this->error('结果不存在',U('portal/index/index'));
            } else {
                //var_dump($info);
            $this->assign('info',$info[0]);
            $sid = $info[0]['id'];
            $result = $model->query("SELECT general_result,name FROM sp_student_result a LEFT JOIN sp_info b ON a.info_id = b.id WHERE a.student_id = $sid");
            //var_dump($result);
            $this->assign('result',$result);
            }
            $this->display();
        }
        
    }
	
}
