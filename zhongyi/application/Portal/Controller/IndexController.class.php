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
 * 首页
 */
class IndexController extends HomeBaseController {
	
    //首页
	public function index() {
        $this->assign('index','index');
    	$this->display(":index");
    }

    //我要献计提交
    public function xianji()
    {
    	if (IS_POST) {
    		$name = $_POST['name'];
    		$address = $_POST['address'];
    		$username = $_POST['username'];
    		$email = $_POST['email'];
    		$man = $_POST['man'];
    		$goods = $_POST['goods'];
    		$phone = $_POST['phone'];
    		$term_info = $_POST['term_info'];
    		if (!$name || !$username || !$phone || !$term_info) {
    			$this->error("缺少必要参数");
    		}
    		$xianji = D('xianji');
    		$array = array(
    			'name'=>$name,
    			'address'=>$address,
    			'username'=>$username,
    			'email'=>$email,
    			'man'=>$man,
    			'phone'=>$phone,
    			'goods'=>$goods,
    			'term_info'=>$term_info,
    			'add_time'=>date("Y-m-d H:i:s"),
    		);
    		$row = $xianji->add($array);
    		if ($row) {
    			$this->success('添加成功');
    		} else {
    			$this->error('添加失败');
    		}
    	}
    }
    //推荐提交
    public function tuijian()
    {
    	if (IS_POST) {
    		$man = $_POST['man'];
    		$isman = $_POST['isman'];
    		$content = $_POST['content'];
    		$name = $_POST['name'];
    		$phone = $_POST['phone'];
    		if (!$man || !$isman || !$content || !$name || !$phone) {
    			$this->error("缺少必要参数");
    		}
    		$array = array(
    			'man'=>$man,
    			'isman'=>$isman,
    			'content'=>$content,
    			'name'=>$name,
    			'phone'=>$phone,
    			'add_time'=>date("Y-m-d H:i:s"),
    		);
    		$tuijian = D('tuijian');
    		$row = $tuijian->add($array);
    		if ($row) {
    			$this->success('添加成功');
    		} else {
    			$this->error('添加失败');
    		}
    	}
    }

    //获取孕期食谱列表
    public function pregnantWoman()
    {
        $list = D('pregnant_woman');
        $month =1;
        for ($i=32;$i<=41;$i++) {
            //从一月孕期开始到十月孕期获取数据
            $result = curlGet("http://babyappdata.intobio.com/1.1/index.php?moduleid=21&catid=$i&cattype=all&page=1");
            $array = json_decode($result,true);
            foreach ($array['list'] as $vo) {
                $img = uniqid().".png";
                getImg($vo['img'],'data/eat/yunfu/'.$img);
                $vo['img'] = "http://app.mattservice.com/info/data/eat/yunfu/".$img;
                $vo['month'] = $month;
                $list->add($vo);
            }
            if ($array['maxpage'] != 1) {
                $row = curlGet("http://babyappdata.intobio.com/1.1/index.php?moduleid=21&catid=$i&cattype=all&page=2");
                foreach ($row['list'] as $vo) {
                    $img = uniqid().".png";
                    getImg($vo['img'],'data/eat/yunfu/'.$img);
                    $vo['img'] = "http://app.mattservice.com/info/data/eat/yunfu/".$img;
                    $vo['month'] = $month;
                    $list->add($vo);
                }
            }
            $month++;
        }
    }

    //储存所有详细内容信息
    public function getAllContents()
    {
        $pregnant_eat = D('pregnant_eat');
        $list = D('pregnant_woman');
        $result = $list->select();
        foreach ($result as $vo) {
            $row = curlGet("http://babyappdata.intobio.com/1.1/index.php?moduleid=21&itemid=".$vo['id']);
            $row = json_decode($row,true);
            preg_match_all('/<img.*?src="(.*?)".*?>/is',$row['re']['content'],$array);

            $img = uniqid().".png";
            getImg($array[1][0],'data/eat/yunfu/'.$img);
            $row['re']['content'] = str_replace($array[1][0], "http://app.mattservice.com/info/data/eat/yunfu/".$img, $row['re']['content']);
            $data[] = array('id'=>$vo['id'],'content'=>json_encode($row['re']));
        }
        $pregnant_eat->addAll($data);
    }


    //
    /*
    *@孕妇食谱列表
    *@param $month
    */
    public function getMonthInfo()
    {
        $month = I('get.month');
        $result = D('pregnant_woman')->where(array('month'=>$month))->select();
        AjaxReturn(0,0,$result,0);
    }

    /*
    *@孕妇食谱详细
    *@param $id
    */
    public function getMonthContent()
    {
        $id = I('get.id');
        $row = D('pregnant_eat')->where(array('id'=>$id))->find();
        AjaxReturn(0,0,$row['content'],0);
    }

    /*
    *@首页顶部广告
    *@param $id
    */
    public function ad()
    {
        $array = array(
            array('title'=>'百度首页','img'=>"https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png",'url'=>'http://www.baidu.com'),
            array('title'=>'麦麦育儿机器人',"img"=>"http://qr.mattservice.com/app/img/bg.jpg",'url'=>"http://qr.mattservice.com/app/")
        );
    }
    
}


 