<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	protected $link = null;

	function _initialize() {
		$this->link = D("Links");
	}
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    //添加一条数据
    public function add()
    {
    	if (IS_POST) {
    		if ($this->link->create()!== false) {
    			if ($this->link->add($_POST) !== false) {
    				$this->success('添加成功',U('Index/info'));
    			} else {
    				$this->error('添加失败');
    			}
    		} else {
    			$this->error($this->link->getError());
    		}
    	}
    }

    public function hello()
    {
        
    }

    //修改一条数据
    public function edit()
    {
    	if (IS_POST) {
    		$id = I('post.id');
    		if ($this->link->create()!== false) {
    			if ($this->link->where(array('id'=>$id))->save($_POST) !== false) {
    				$this->success('修改成功',U('Index/info'));
    			} else {
    				$this->error('修改失败');
    			}
    		} else {
    			$this->error($this->link->getError());
    		}
    	}
    }

    //查询数据
    public function info()
    {
    	$count = $this->link->count();
    	$page = new \Think\Page($count,10);
    	$result = $this->link->field(array('link_name','id','link_url'))->limit($page->firstRow,$page->listRows)->select();
    	var_dump($page);
    	var_dump($result);
    }

    //删除一条数据
    public function delete()
    {
    	$id = I('get.id');
    	$this->link->where(array('id'=>$id))->delete() ? $this->success('成功',U('Index/info')) : $this->success('失败');
    }
}    