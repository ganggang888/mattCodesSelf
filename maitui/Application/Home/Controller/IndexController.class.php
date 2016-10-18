<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class IndexController extends Controller {
	
	protected function _initialize()
    {
        $siteinfo = M('siteinfo')->select();
        $this->assign('siteinfo',$siteinfo);
    }
	
    public function index(){

        //公司新闻
        $news = M('article')->where('cid=1') ->limit(0, 3)->select();
        $this->assign('news',$news);
        $this->assign('shows','1');
        $this->display(join);
    }

    public function verify_c()
    {  
        $Verify =     new \Think\Verify();
        $Verify->fontSize = 30;
        $Verify->length   = 3;
        $Verify->useNoise = false;
        $Verify->entry();
    }  
    public function research(){
        $this->display();
    }

    public function map()
    {
        $this->display();
    }	
	
    public function savediaocha(){

        $data['que1']        = I('que1');
        $data['que2']        = I('que2');
        $data['que3']        = I('que3');
        $data['que4']        = I('que4');
        $data['que5']        = I('que5');
        $data['que6']        = I('que6');
        $data['que7']        = I('que7');
        $data['create_time'] = time();



        M('diaocha')->data($data)->add();

        $this->success('感谢您的参与！', U('Index/research'));
    }
	
	public function mamashouce(){
		
		// *********分页**********
        $count    = M('article')->where('cid=5')->count(); //总数
        $listRows = 8;                   //每页显示条数
        $Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
        // ***********************

        //所有文章
        $article = M('article')->where('cid=5')
            ->order('aid asc')
            ->limit($Page->firstRow, $listRows)
            ->select();



        $this->assign('total',$count);
        $this->assign('page',$page_str);
        $this->assign('article',$article);
		
		
		$this->display();
	}
	
	public function yunqi(){



        $id = I('id');
        $content = M('article')->where('aid='.$id)->select();
        $this->assign('content',$content);
        $this->display();
    }
	
	public function baobeichengzhang(){
		
		// *********分页**********
        $count    = M('article')->where('cid=6')->count(); //总数
        $listRows = 8;                   //每页显示条数
        $Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
        // ***********************

        //所有文章
        $article = M('article')->where('cid=6')
            ->order('aid asc')
            ->limit($Page->firstRow, $listRows)
            ->select();



        $this->assign('total',$count);
        $this->assign('page',$page_str);
        $this->assign('article',$article);
		
		
		$this->display();
	}
	
	public function baobao(){



        $id = I('id');
        $content = M('article')->where('aid='.$id)->select();
        $this->assign('content',$content);
        $this->display();
    }
	public function join(){



		$id = I('id');
		$content = M('article')->where('aid='.$id)->select();
		$this->assign('content',$content);
		$this->display();
	}
}

