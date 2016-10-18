<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class FenxiangController extends Controller {
    public function index(){

        // *********��ҳ**********
        $count    = M('article')->where('cid=4')->count(); //����
        $listRows = 16;                   //ÿҳ��ʾ����
        $Page     = new Page($count,$listRows);      //ʵ������ҳ�ഫ���ܼ�¼����ÿҳ��ʾ�ļ�¼��
        $page_str = $Page->show();
        // ***********************

        //��������
        $article = M('article')->where('cid=4')
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

