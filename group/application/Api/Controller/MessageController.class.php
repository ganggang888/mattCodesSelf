<?php
namespace Api\Controller;
use Common\Controller\AppframeController;
class MessageController extends AppframeController
{
    //所有需要采集的微信文章分类
    protected $term = '';
    function _initialize() {
        $this->term = array(
            array('name'=>'专家科普','hid'=>7),
            array('name'=>'科普小脚丫','hid'=>10),
            array('name'=>'科技周','hid'=>4),
            array('name'=>'科技日','hid'=>5),
            array('name'=>'科普精选','hid'=>11,'url'=>'http://mp.weixin.qq.com/mp/homepage?__biz=MzA4MjMzNTM1Mg==&hid=11&sn=7115ae553846a452e969b773f02c61be&begin=0&count=100&action=appmsg_list&f=json&r=0.25178977368735245')
        );
    }
    
    //保存微信文章
    private function saveMessage($data)
    {
        $content = getUrlInfo($data['link'],'rich_media_inner','');
        $content = str_replace('data-src="http://mmbiz.qpic.cn/','src="http://read.html5.qq.com/image?src=forum&q=5&r=0&imgflag=7&imageUrl=http://mmbiz.qpic.cn/',$content);
        $content = str_replace('data-src="','src="',$content);
        $content = str_replace('height=375','height=258.5',$content);
        $content = str_replace('width=500','width=345',$content);
        $content = str_replace('preview.html','player.html',$content);
        $content = str_replace('class="video_iframe" style="   z-index:1;','class="video_iframe" style="z-index: 1; width: 345px !important; height: 258.75px !important; overflow: hidden;',$content);
        //打开默认的模板页，将信息插入data-src="http://mmbiz.qpic.cn/   src="http://read.html5.qq.com/image?src=forum&q=5&r=0&imgflag=7&imageUrl=http://mmbiz.qpic.cn/         
        $tex = file_get_contents(SITE_PATH.'info/tpl.html');
        //var_dump($content);exit;
        $tex = str_replace("123456789123456789",$content, $tex);
        $tex = str_replace("123123456123123456",$data['title'], $tex);
        //var_dump($tex);
        //开始生成对应html文件
        $newFile = SITE_PATH.'info/'.$data['appmsgid'].'.html';
        $myfile = fopen($newFile,'wb');
        //var_dump($newFile);
        $edit = fwrite($myfile,$tex);
        if ($edit) {
            $data['link'] = 'info/'.$data['appmsgid'].'.html';
            M('wchat')->add($data);
        }
        
    }
    public function index()
    {
        set_time_limit(0);
        foreach ($this->term as $value) {
            //批量获取 所有分类页面的文章
            if ($value['hid'] != 11) {
                $url = "http://mp.weixin.qq.com/mp/homepage?__biz=MzA4MjMzNTM1Mg==&hid=".$value['hid']."&sn=4594e3ae6c6aa202a7e64b6a2efeebad&cid=0&begin=0&count=100&action=appmsg_list&f=json&r=0.965015581272437";
            } else {
                $url = $value['url'];
            }
            $info = postRequest($url);
            $info = json_decode($info,true);
            //取出文章列表与数据库对比，如数据库没有，则插入
            foreach ($info['appmsg_list'] as $vo) {
                $find = M('wchat')->where(array('appmsgid'=>$vo['appmsgid']))->getField('id');
                //如果数据库没有则插入一条
                $vo['hid'] = $value['hid'];
                !$find ? $this->saveMessage($vo) : '';
            }
        }
        exit;
        
        //$content = curl_file_get_contents("http://mp.weixin.qq.com/s?__biz=MzA4MjMzNTM1Mg==&mid=2652099113&idx=1&sn=f8ef085f15b027f056fdd321ff422fa9&scene=19#wechat_redirect");
         
        $info = getUrlInfo("http://mp.weixin.qq.com/s?__biz=MzA4MjMzNTM1Mg==&mid=2652099113&idx=1&sn=f8ef085f15b027f056fdd321ff422fa9&scene=19#wechat_redirect","rich_media_content ",'');
        //$info = str_replace('data-src="','src=http://read.html5.qq.com/image?src=forum&q=5&r=0&imgflag=7&imageUrl=', $info);
        $info = str_replace('data-src="','src="http://read.html5.qq.com/image?src=forum&q=5&r=0&imgflag=7&imageUrl=',$info);
        var_dump($info);exit;
        preg_match_all('/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i', $info,$after);
        preg_match_all('/<img.*?data-w=[\"|\']?(.*?)[\"|\']?\s.*?>/i', $info,$width);
        //var_dump($width); 
        //var_dump($after);
        //开始加入特定的js
        foreach ($after[0] as $key=>$vo) {
            $widths = $width[1][$key];
            //var_dump($widths);
            !$widths ? $widths='640px' : '';
            $js = "<script type='text/javascript'>showImg('".$vo."','".$widths."');</script>";
            $info = str_replace($vo,$js,$info);
            //var_dump($info);exit;
        }
        $info = str_replace("data-src=","src=",$info);
        var_dump($info);
    }

    //Page_size 每页条数   Total_Size 总数  Current_page 当前所在页数  List_Page 当前列表数量
    public function lists()
    {
        error_reporting(E_ALL);
        $id = I("get.id");
        $merge = I('get.merge');
        if ($id) {
            $where = array("id"=>$id);
        } elseif ($merge && !$id) {
            $where = " hid IN(4,5,10)";
        }
        !$id && !$merge ? AjaxReturn(1,'缺少参数',0,1) : '';
        $count = M('wchat')->where($where)->count();
        $page = $this->page($count,10);
        var_dump($page);
        $result = M('wchat')->where($where)->order("appmsgid DESC")->limit($page->firstRow,$page->listRows)->select();
        foreach ($result as $vo) {
            $vo['link'] = 'http://www.spaca.org.cn/'.$vo['link'];
            $rows[] = $vo;
        }
        
        $_COOKIE['encryption'] = 1;
        $data = array(
            'pageInfo'=>array(
                'Page_size'=>$page->Page_size,
                'Total_Size'=>$page->Total_Size,
                'Current_page'=>$page->Current_page,
                'Total_Pages'=>$page->Total_Pages,
            ),
            'data'=>$rows,
        );
        $result ? AjaxReturn(0,'请求成功',$data,0) : AjaxReturn(2,'没有数据',0,1);
    }
}