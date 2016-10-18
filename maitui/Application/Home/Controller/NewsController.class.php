<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class NewsController extends Controller {
    public function index(){

        // *********��ҳ**********
        $count    = M('article')->where('cid=1')->count(); //����
        $listRows = 8;                   //ÿҳ��ʾ����
        $Page     = new Page($count,$listRows);      //ʵ������ҳ�ഫ���ܼ�¼����ÿҳ��ʾ�ļ�¼��
        $page_str = $Page->show();
        // ***********************

        //��������
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

