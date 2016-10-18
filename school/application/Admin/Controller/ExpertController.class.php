<?php
/**
 * Created by PhpStorm.
 * User: karoro
 * Date: 2015/7/23
 * Time: 9:46
 */

namespace Admin\Controller;
use Common\Controller\AdminbaseController;
use Think\Page;


class ExpertController extends AdminbaseController
{
    protected $expertModel;
    protected $typeModel;
    public function _initialize(){
        $this->expertModel = D("Expert");
        $this->typeModel = D('ExpertType');
        import('ORG.Util.Page');

    }
    public function  index(){

        if(IS_POST){
            $name = I('post.name');
            if(!empty($name)){
                $search['name'] = $name;
                $where = array();
                $where['name'] = array("like","%$name%");
                $where['is_delete'] = 0;
                $Page = get_page( $this->expertModel,$where,10 );
                $expert = $this->expertModel->where($where)->select();
                $this->assign('search',$search);
            }else{
                $Page = get_page( $this->expertModel,'is_delete = 0',10 );
                $expert = $this->get_experts();
            }
        }else{
            $Page = get_page( $this->expertModel,'is_delete = 0',10 );
            $expert = $this->get_experts();
        }

        $this->assign('experts',$expert);
        $this->assign('Page',$Page->show());
        $expert_type = $this->get_type_array();
        $this->assign('types',$expert_type);
        $this->display();
    }
    public function add(){
        $types = $this->get_type_array();
        $this->assign('types',$types);
        $this->display();
    }
    public function add_post(){
        if(IS_POST){

            $post = I("post.post");
            if(empty($post['name'])){
                $this->error('姓名不能为空');
            }
            $post['introduce'] = htmlspecialchars_decode($post['introduce']);
            $post['is_delete'] = 0 ;
            $result = $this->expertModel->add($post);
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
                $result = $this->expertModel->where("id in ($idstr)")->save($update);
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
                $result = $this->expertModel->where("id = $id")->save($update);
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
        $types = $this->get_type_array();
        $expert = $this->get_experts($id);
        $this->assign('expert',$expert[0]);
        //var_dump($expert[0]);exit;
        $this->assign('types',$types);
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
            $result = $this->expertModel->where("id = $id")->save($post);
            if($result){
                $this->success('修改成功!');
            }else{
                $this->error("修改失败!");
            }

        }
    }
    //以下的是专家类型模块
    function expert_type(){
        $data = array();
        if(IS_POST){
            $parm = I('post.search');
            $where = array();
            if(!empty($parm)){
                $type_name = $parm['type_name'];
                $search['type_name'] = $type_name;
                $where['type_name'] = array("like","%$type_name%");
                $where['is_delete'] = 0;
                $data = $this->typeModel->where($where)->select();
            }else{
                $data = $this->get_types();
            }

        }else{
            $data = $this->get_types();
        }
        $this->assign('types',$data);
        $this->assign('search',$search);
        $this->display();
    }
    function type_add(){
        $this->display();
    }
    function type_add_post(){
        if(IS_POST){
            $post = I('post.post');
        }
        if(empty($post['type_name'])){
            $this->error('标题不能为空!');
        }
        $post['update_time'] = date('Y-m-d H:i:s',time());
        $post['is_delete'] = 0;
        $result = $this->typeModel->add($post);
        if($result){
            $this->success('添加成功!','expert_type');
        }else{
            $this->error('添加失败!');
        }
    }
    function type_delete(){
        $id = I('get.id');
        if(!empty($id)){
            $update['is_delete'] = 1;
            $update['update_time']=date('Y-m-d H:i:s');
            $result = $this->typeModel->where("id = $id")->save($update);
            if($result){
                $this->success('删除成功!','expert_type');
            }else{
                $this->error('删除失败!');
            }
        }else{
            $this->error('缺少参数!');
        }
    }
    function type_edit(){
        $id = I('get.id');
        if(!empty($id)){
            $data = $this->get_types($id);
            if(empty($data)){
                $this->error('服务器错误!');
            }else{
                $this->assign('type',$data[0]);
            }
        }else{
            $this->error('参数错误!');
        }
        $this->display();

    }
    function type_edit_post(){
        if(IS_POST){
            $id = I('get.id');
            if(!empty($id)){
                $post = I('post.post');
                if(empty($post['type_name'])){
                    $this->error('标题不能为空!');
                }
                $post['update_time'] = date('Y-m-d H:i:s',time());
                $result = $this->typeModel->where("id = $id")->save($post);
                if($result){
                    $this->success('修改成功!','expert_type');
                }else{
                    $this->error('修改失败!');
                }
            }
        }
    }
    /*
     * 取得专家信息 id为空为获取全部列表
     *
     */
    private function get_experts($id = 0){

        if($id != 0){
            $data = $this->expertModel->where("id = $id")->select();
        }else{
            $data = $this->expertModel->where('is_delete = 0')->select();
        }
        return $data;
    }
    /*
     * 取得专家类别 id为空为获取全部列表
     *
     */
    private function get_types($id = 0){

        if($id != 0){
            $data = $this->typeModel->where("id = $id")->select();
        }else{
            $data = $this->typeModel->where('is_delete = 0')->select();
        }
        return $data;
    }
    private function get_type_array(){
        $data = $this->get_types();
        $types = array();
        foreach($data as $vo){
            $types[$vo['id']] = $vo['type_name'];
        }
        return $types;
    }
} 