<?php
/**
 * Created by PhpStorm.
 * User: karoro
 * Date: 2015/8/25
 * Time: 9:28
 */

namespace Admin\Controller;
use Common\Controller\AdminbaseController;
use Think\Page;

class StudentsController extends AdminbaseController
{
    protected $stdModel;
    public  function _initialize(){
        $this->stdModel = D("Students");
        import('ORG.Util.Page');

    }
    public  function index(){
        if(IS_POST){
            $name = I('post.name');
            if(!empty($name)){
                $search['name'] = $name;
                $where = array();
                $where['name'] = array("like","%$name%");
                $where['is_delete'] = 0;
                //分页...(@model,@查询总条数的条件,@pagesize)
                $Page = get_page( $this->stdModel,$where,10 );
                $std = $this->stdModel->where($where)->select();
                $this->assign('search',$search);
            }else{
                $Page = get_page( $this->stdModel,'is_delete = 0',10 );
                $std = $this->get_students();
            }
        }else{
            $Page = get_page( $this->stdModel,'is_delete = 0',10 );
            $std = $this->get_students();
        }

        $this->assign('students',$std);
        $this->assign('Page',$Page->show());
        $this->display();
    }
    public function add(){
        $this->display();
    }
    public function add_post(){
        if(IS_POST){

            $post = I("post.post");
            if(empty($post['name'])){
                $this->error('姓名不能为空');
            }
            $post['introduce'] = htmlspecialchars_decode($post['introduce']);
           // var_dump($post);exit;
            $post['is_delete'] = 0 ;
            $result = $this->stdModel->add($post);
            if($result){
                $this->success('添加成功!','index');
            }else{
                $this->error('添加失败!');
            }
        }
    }
    public function  delete(){
        if(IS_POST){
            //批量删除
            $ids = I('post.ids');
            if(!empty($ids)){
                $idstr = join($ids,',');
                $update['is_delete'] = 1;
                $update['update_time'] = date('Y-m-d H:i:s',time());
                $result = $this->stdModel->where("id in ($idstr)")->save($update);
                if($result){
                    if($result){
                        $this->success('删除成功！');
                    }else{
                        $this->error('服务器错误！');
                    }
                }

            }else{
                $this->error('缺少参数！');
            }
        }else{
            if(isset($_GET['id'])){
                $id = I('get.id');
                $update['is_delete'] = 1;
                $update['update_time']=date('Y-m-d H:i:s');
                $result = $this->stdModel->where("id = $id")->save($update);
                if($result){
                    $this->success("删除成功!");
                }else{
                    $this->error("删除失败!");
                }
            }else{
                $this->error('缺少参数！');
            }
        }

    }
    public function edit(){
        $id = I('get.id');
        if(empty($id)){
            $this->error('缺少参数!');
        }
        $student = $this->get_students($id);
        $this->assign('student',$student[0]);
        $this->display();
    }
    public function edit_post(){
        if(IS_POST){
            $id = I('get.id');
            if(empty($id)){
                $this>error("缺少参数!");
            }
            $post = I("post.post");
            if(empty($post['name'])){
                $this->error('姓名不能为空');
            }
            if(empty($post['photo'])){
                unset($post['photo']);
            }
            $post['introduce'] = htmlspecialchars_decode($post['introduce']);
            $result = $this->stdModel->where("id = $id")->save($post);
            if($result){
                $this->success('修改成功!');
            }else{
                $this->error("修改失败!");
            }

        }
    }
    private function get_students($id = 0){
        if($id != 0){
            $data = $this->stdModel->where("id = $id")->select();
        }else{
            $data = $this->stdModel->where('is_delete = 0')->select();
        }
        return $data;
    }

} 