<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class NewsController extends Controller {
    public function index(){

        // *********分页**********
        $count    = M('article')->where('cid=1')->count(); //总数
        $listRows = 8;                   //每页显示条数
        $Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
        // ***********************

        //所有文章
        $article = M('article')->where('cid=1')
            ->order('aid desc')
            ->limit($Page->firstRow, $listRows)
            ->select();



        $this->assign('total',$count);
        $this->assign('page',$page_str);
        $this->assign('article',$article);

        $this->display();
    }


    public function content(){



        $id = I('id');
        $content = M('article')->where('aid='.$id)->select();
        $this->assign('content',$content);
        $this->display();
    }
}

