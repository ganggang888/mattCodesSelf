<?php
/**
 * Created by PhpStorm.
 * User: karoro
 * Date: 2015/8/4
 * Time: 13:36
 */

namespace Admin\Controller;
use Common\Controller\AdminbaseController;


class CertificateController extends AdminbaseController
{
    protected $certificateModel;
    function _initialize(){
        $this->certificateModel = D('Certificate');
    }
    function index(){
        if(IS_POST){
            $title = I('post.title');
            if(!empty($title)){
                $search['title'] = $title;
                $where = array();
                $where['title'] = array("like","%$title%");
                $where['is_delete'] = 0;
                $page = get_page( $this->certificateModel,$where,10 );
                $data = $this->certificateModel->where($where)->select();

                $this->assign('search',$search);
            }else{
                $page = get_page( $this->certificateModel,'is_delete = 0',10 );
                $data = $this->get_data();
            }
        }else{
            $page = get_page( $this->certificateModel,'is_delete = 0',10 );
            $data = $this->get_data();
        }
        $this->assign('certificates',$data);
        $this->assign('Page',$page->show());
        $this->display();
    }
    function add(){
        $this->display();
    }
    function add_post(){
        if(IS_POST){
            $post = I('post.post');
            if(empty($post['title'])){
                $this->error('标题不能为空!');
            }
            if(empty($post['photo'])){
                unset($post['photo']);
            }
            $post['introduce'] = htmlspecialchars_decode($post['introduce']);
            $result = $this->certificateModel->add($post);
            if($result){
                $this->success('添加成功!');
            }else{
                $this->error('添加失败!');
            }

        }
    }
    function edit(){
        $id = I('get.id');
        if(empty($id)){
            $this->error('参数错误!');
        }
        $data = $this->get_data($id);
        if(empty($data)){
            $this->error('服务器错误!');
        }else{
            $this->assign('data',$data[0]);
        }
        $this->display();
    }
    function edit_post(){
        if(IS_POST){
            $id = I('get.id');
            if($id){
                $post =  I('post.post');
                if(empty($post['title'])){
                    $this->error('标题不能为空!');
                }
                $post['introduce'] = htmlspecialchars_decode($post['introduce']);
                $result = $this->certificateModel->where("id = $id")->save($post);
                if($result){
                    $this->success('修改成功!','index');
                }else{
                    $this->error('修改失败!');
                }
            }else{
                $this->error('参数错误!');
            }

        }
    }
    function delete(){
        if(IS_POST){
            //批量删除
            $ids = I('post.ids');
            if(!empty($ids)){
                $idstr = join($ids,',');
                $update['is_delete'] = 1;
                $update['update_time'] = date('Y-m-d H:i:s',time());
                $result = $this->certificateModel->where("id in ($idstr)")->save($update);
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
            $id = I('get.id');

            if(!empty($id)){
                $where['id'] = $id;
                $update['is_delete'] = 1;
                $update['update_time'] = date('Y-m-d H:i:s',time());
                $result = $this->certificateModel->where($where)->save($update);
                if($result){
                    $this->success('删除成功！');
                }else{
                    $this->error('服务器错误！');
                }
            }else{
                $this->error('缺少参数！');
            }
        }

    }
    private function get_data($id = 0){

        if($id != 0){
            $data = $this->certificateModel->where("id = $id")->select();
        }else{
            $data = $this->certificateModel->where('is_delete = 0')->order('is_top')->select();
        }

        return $data;


    }
} 