<?php
namespace Home\Controller;
use Think\Controller;
class ZhoujiController extends Controller {
    public function index(){


        $first = M('article')->where('aid > 9 and aid < 22')->select();
        $this->assign('first',$first);

        $second = M('article')->where('aid > 21 and aid < 37')->select();
        $this->assign('second',$second);

        $third = M('article')->where('aid > 36 and aid < 50')->select();
        $this->assign('third',$third);

        $this->display();
    }

    public function content(){
        $liebiao = M('article')->where('aid > 9 and aid < 50')->select();
        $this->assign('liebiao',$liebiao);


        $id = I('id');
        $content = M('article')->where('aid='.$id)->select();
        $this->assign('content',$content);
        $this->display();
    }
}

