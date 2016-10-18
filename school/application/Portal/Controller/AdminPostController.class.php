<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\AdminbaseController;
use Api\Controller\WchatController;
class AdminPostController extends AdminbaseController {
	protected $posts_model;
	protected $term_relationships_model;
	protected $terms_model;
	
	function _initialize() {
		parent::_initialize();
		$this->posts_model = D("Common/Posts");
		$this->terms_model = D("Common/Terms");
		$this->term_relationships_model = D("Common/TermRelationships");
	}
	function index(){
		$this->_lists();
		$this->_getTree();
		$this->display();
	}
	
	function add(){
		$terms = $this->terms_model->order(array("listorder"=>"asc"))->select();
		$term_id = intval(I("get.term"));
		$this->_getTermTree();
		$term=$this->terms_model->where("term_id=$term_id")->find();
		$this->assign("author","1");
		$this->assign("term",$term);
		$this->assign("terms",$terms);
		$this->display();
	}
	public function testSendAll()
    {
        $thumb = "/data/upload/5636fd7b395ef.jpg";
        $title = "周超傻逼";
        $author = "邵博洋";
        $content = '<p>
    <img src="http://m.matteducation.com/data/upload/ueditor/20151102/563713585019e.jpg" title="1.jpg" alt="1.jpg"/>
</p>
<p>
    你好吗
</p>
<p>
    你猜我好不好呢
</p>
<p>
    大家一起来愉快的玩耍吧
</p>
<p>
    好啊，大家来玩吧
</p>
<p>
    <img src="http://m.matteducation.com/data/upload/ueditor/20151102/563713739839f.jpg" title="7.jpg" alt="7.jpg"/>
</p>
<p>
    麦忒帅哥有非常非常的多，你说呢
</p>';
        $content_source_url = "http://www.baidu.com";
        $digest = "邵博洋";
        $row = $this->sendToWeixin($thumb,$title,$author,$content_source_url,$content,$digest);
        var_dump($row);
    }
	function add_post(){
		if (IS_POST) {
            /*if ($_POST['wchat'] == 1 && $_POST['smeta']['thumb']) {
                $title = $_POST['post']['post_title'];
                $author = $_POST['post']['post_keywords'];
                $thumb = $_POST['smeta']['thumb'];
                $content_source_url = $_POST['post']['post_source'];
                $content = $_POST['post']['post_content'];
                $digest = $_POST['post']['post_excerpt'];
                if (!$title || !$author || !$thumb || !$content_source_url || !$content || !$digest) {
                    $this->error("请填写完整的参数");
                }
                $row = $this->sendToWeixin($thumb,$title,$author,$content_source_url,$content,$digest);
                if ($row == false) {
                    $this->error("微信同步失败，请明天再来");
                }

            }*/
			if(empty($_POST['term'])){
				$this->error("请至少选择一个分类栏目！");
			}
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			 
			$_POST['post']['post_date']=date("Y-m-d H:i:s",time());
			$_POST['post']['post_author']=get_current_admin_id();
			$article=I("post.post");
			$article['smeta']=json_encode($_POST['smeta']);
			$article['post_content']=htmlspecialchars_decode($article['post_content']);
			$result=$this->posts_model->add($article);
			if ($result) {
				//添加文章成功后如果点击了同步到微信，那么同步到微信向所有已关注的人员发送客服消息
                if ($_POST['wchat'] == 1 && $_POST['smeta']['thumb']) {
                    //var_dump($_POST['post']['post_title']);var_dump($_POST['post']['post_excerpt']);var_dump($_POST['post']['post_content']);var_dump($_POST['smeta']['thumb']);exit;
                    if (!$_POST['smeta']['thumb']) {
                        $this->error("缺少参数");
                    }
                    $title = $_POST['post']['post_title'];
                    $description = $_POST['post']['post_excerpt'];
                    $url = WEB_PATH."/index.php?g=portal&m=page&a=WxArticle&id=".$result;
                    $picurl = WEB_PATH."/data/upload/".$_POST['smeta']['thumb'];
                    $this->sendMessageToUser($title,$description,$url,$picurl);
                }
				foreach ($_POST['term'] as $mterm_id){
					$this->term_relationships_model->add(array("term_id"=>intval($mterm_id),"object_id"=>$result));
				}
				
				$this->success("添加成功！");
			} else {
				$this->error("添加失败！");
			}


			 
		}
	}
	
	public function edit(){
		$id=  intval(I("get.id"));
		
		$term_relationship = M('TermRelationships')->where(array("object_id"=>$id,"status"=>1))->getField("term_id",true);
		$this->_getTermTree($term_relationship);
		$terms=$this->terms_model->select();
		$post=$this->posts_model->where("id=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		$this->assign("terms",$terms);
		$this->assign("term",$term_relationship);
		$this->display();
	}
	
	public function edit_post(){
		if (IS_POST) {
			if(empty($_POST['term'])){
				$this->error("请至少选择一个分类栏目！");
			}
			$post_id=intval($_POST['post']['id']);
			
			$this->term_relationships_model->where(array("object_id"=>$post_id,"term_id"=>array("not in",implode(",", $_POST['term']))))->delete();
			foreach ($_POST['term'] as $mterm_id){
				$find_term_relationship=$this->term_relationships_model->where(array("object_id"=>$post_id,"term_id"=>$mterm_id))->count();
				if(empty($find_term_relationship)){
					$this->term_relationships_model->add(array("term_id"=>intval($mterm_id),"object_id"=>$post_id));
				}else{
					$this->term_relationships_model->where(array("object_id"=>$post_id,"term_id"=>$mterm_id))->save(array("status"=>1));
				}
			}
			
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			unset($_POST['post']['post_author']);
			$article=I("post.post");
			$article['smeta']=json_encode($_POST['smeta']);
			$article['post_content']=htmlspecialchars_decode($article['post_content']);
			$result=$this->posts_model->save($article);
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->term_relationships_model);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	private  function _lists($status=1){
		$term_id=0;
		if(!empty($_REQUEST["term"])){
			$term_id=intval($_REQUEST["term"]);
			$term=$this->terms_model->where("term_id=$term_id")->find();
			$this->assign("term",$term);
			$_GET['term']=$term_id;
		}
		
		$where_ands=empty($term_id)?array("a.status=$status"):array("a.term_id = $term_id and a.status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"post_date","operator"=>">"),
				'end_time'  => array("field"=>"post_date","operator"=>"<"),
				'keyword'  => array("field"=>"post_title","operator"=>"like"),
		);
		if(IS_POST){
			
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		
		$where= join(" and ", $where_ands);
			
			
		$count=$this->term_relationships_model
		->alias("a")
		->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
		->where($where)
		->count();
			
		$page = $this->page($count, 20);
			
			
		$posts=$this->term_relationships_model
		->alias("a")
		->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("a.listorder ASC,b.post_modified DESC")->select();
		$users_obj = M("Users");
		$users_data=$users_obj->field("id,user_login")->where("user_status=1")->select();
		$users=array();
		foreach ($users_data as $u){
			$users[$u['id']]=$u;
		}
    	$terms = $this->terms_model->order(array("term_id = $term_id"))->getField("term_id,name",true);
		$this->assign("users",$users);
    	$this->assign("terms",$terms);
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}
	
	private function _getTree(){
		$term_id=empty($_REQUEST['term'])?0:intval($_REQUEST['term']);
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$term_id==$r['term_id']?"selected":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}
	
	private function _getTermTree($term=array()){
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=in_array($r['term_id'], $term)?"selected":"";
			$r['checked'] =in_array($r['term_id'], $term)?"checked":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}
	
	function delete(){
		if(isset($_GET['tid'])){
			$tid = intval(I("get.tid"));
			$data['status']=0;
			if ($this->term_relationships_model->where("tid=$tid")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			$data['status']=0;
			if ($this->term_relationships_model->where("tid in ($tids)")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
			$data["post_status"]=1;
			
			$tids=join(",",$_POST['ids']);
			$objectids=$this->term_relationships_model->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
			
			$data["post_status"]=0;
			$tids=join(",",$_POST['ids']);
			$objectids=$this->term_relationships_model->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_model->where("id in ($ids)")->save($data)) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	
	function top(){
		if(isset($_POST['ids']) && $_GET["top"]){
			$data["istop"]=1;
				
			$tids=join(",",$_POST['ids']);
			$objectids=$this->term_relationships_model->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("置顶成功！");
			} else {
				$this->error("置顶失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["untop"]){
				
			$data["istop"]=0;
			$tids=join(",",$_POST['ids']);
			$objectids=$this->term_relationships_model->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_model->where("id in ($ids)")->save($data)) {
				$this->success("取消置顶成功！");
			} else {
				$this->error("取消置顶失败！");
			}
		}
	}
	
	function recommend(){
		if(isset($_POST['ids']) && $_GET["recommend"]){
			$data["recommended"]=1;
	
			$tids=join(",",$_POST['ids']);
			$objectids=$this->term_relationships_model->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("推荐成功！");
			} else {
				$this->error("推荐失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["unrecommend"]){
	
			$data["recommended"]=0;
			$tids=join(",",$_POST['ids']);
			$objectids=$this->term_relationships_model->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_model->where("id in ($ids)")->save($data)) {
				$this->success("取消推荐成功！");
			} else {
				$this->error("取消推荐失败！");
			}
		}
	}
	
	function move(){
		if(IS_POST){
			if(isset($_GET['ids']) && isset($_POST['term_id'])){
				$tids=$_GET['ids'];
				if ( $this->term_relationships_model->where("tid in ($tids)")->save($_POST) !== false) {
					$this->success("移动成功！");
				} else {
					$this->error("移动失败！");
				}
			}
		}else{
			$parentid = intval(I("get.parent"));
			
			$tree = new \Tree();
			$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
			$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
			$terms = $this->terms_model->order(array("path"=>"asc"))->select();
			$new_terms=array();
			foreach ($terms as $r) {
				$r['id']=$r['term_id'];
				$r['parentid']=$r['parent'];
				$new_terms[] = $r;
			}
			$tree->init($new_terms);
			$tree_tpl="<option value='\$id'>\$spacer\$name</option>";
			$tree=$tree->get_tree(0,$tree_tpl);
			 
			$this->assign("terms_tree",$tree);
			$this->display();
		}
	}
	
	function recyclebin(){
		$this->_lists(0);
		$this->_getTree();
		$this->display();
	}
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$tids= implode(",", array_keys($_POST['ids']));
			$data=array("post_status"=>"0");
			$status=$this->term_relationships_model->where("tid in ($tids)")->delete();
			if($status!==false){
				foreach ($_POST['ids'] as $post_id){
					$post_id=intval($post_id);
					$count=$this->term_relationships_model->where(array("object_id"=>$post_id))->count();
					if(empty($count)){
						$status=$this->posts_model->where(array("id"=>$post_id))->delete();
					}
				}
				
			}
			
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$tid = intval(I("get.tid"));
				$status=$this->term_relationships_model->where("tid = $tid")->delete();
				if($status!==false){
					$count=$this->term_relationships_model->where(array("object_id"=>$id))->count();
					if(empty($count)){
						$status=$this->posts_model->where("id=$id")->delete();
					}
					
				}
				if ($status!==false) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}
		}
	}
	
	function restore(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data=array("tid"=>$id,"status"=>"1");
			if ($this->term_relationships_model->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}

    /*
     * 微信上传缩略图素材，群发消息时文章的说略图url
     *api:https://api.weixin.qq.com/cgi-bin/media/upload
     */
    private function uploadImgThumb($url = '', $path = '')
    {
        $access_token = WchatController::access_token();
        $shell = 'curl -F media=@/home/wwwroot/default/school'.$path.' "'.$url.'?access_token='.$access_token.'&type=image"';
        $shell = exec($shell);
        return $shell;

    }

    /*
     * 微信上传图片，在微信文章中图片会用到
     * api:https://api.weixin.qq.com/cgi-bin/media/uploadimg
     */
    private function uploadImg($path = '')
    {
        $access_token = WchatController::access_token();
        $shell = 'curl -F media=@/home/wwwroot/default/school/'.$path.' "https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token="'.$access_token;
        $shell = exec($shell);
        return $shell;
    }

    /*
     * 上传图文消息接口
     * api:https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=ACCESS_TOKEN
     */
    private function uploadNews($thumb_media_id = '',$author = '',$title,$content_source_url,$content,$digest,int $show_cover_pic)
    {
        var_dump($content);
        $access_token = WchatController::access_token();
        $info = '{
           "articles": [
                 {
                     "thumb_media_id":"'.$thumb_media_id.'",
                     "author":"'.$author.'",
                     "title":"'.$title.'",
                     "content_source_url":"'.$content_source_url.'",
                     "content":"'.$content.'",
                     "digest":"'.$digest.'",
                     "show_cover_pic":"'.$show_cover_pic.'"
                 },
           ]
        }';
        $row = WchatController::add_material("https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=".$access_token,$info);
        return $row;
    }

    /*
     * 根据分组进行群发
     * api:https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=ACCESS_TOKEN
     */
    private function sendAll($media_id)
    {
        $access_token = WchatController::access_token();
        $send = array(
            "filter"=>array('is_to_all'=>false,'group_id'=>''),
            "mpnews"=>array('media_id'=>$media_id),
            "msgtype"=>"mpnews",
        );
        $send = json_encode($send);
        $row = WchatController::add_material("https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=".$access_token,$send);
        return $row;
    }

    /*
     * 如果添加文章时选择了缩略图和点击同步微信，则调用此函数
     */
    private function sendToWeixin($thumb,$title,$author,$content_source_url,$content,$digest)
    {
        //将图片替换成微信里面的图片
        $rule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
        $allResult = $content;
        preg_match_all($rule,$allResult,$match);
        $url = $match[1];
        foreach ($url as $vo) {
            $pregStr = 'http://m.matteducation.com/';
            $info = str_replace($pregStr, '', $vo);
            $pic_url = $this->uploadImg($info);
            $result = json_decode($pic_url,true);
            $the_url = $result["url"];
            $allResult = str_replace($vo,$the_url,$allResult);
        }
        //缩略图上传
        $thumb_info = $this->uploadImgThumb("https://api.weixin.qq.com/cgi-bin/media/upload",$thumb);
        $thumb_info = json_decode($thumb_info,true);
        $media_id = $thumb_info['media_id'];
        //开始上传文章信息
        $newsUpload = $this->uploadNews($media_id,$author,$title,$content_source_url,$allResult,$digest,1);
        $new_info = json_decode($newsUpload,true);
        $new_media_id = $new_info['media_id'];  //获取到文章id
        //最后根据id进行群发
        $row = $this->sendAll($new_media_id);
        $json_row = json_decode($row,true);
        print_r($json_row);
        if ($json_row['errcode'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    //向所有用户发送客服消息
    private function sendMessageToUser($title,$description,$url,$picurl)
    {
        $result = $this->userList();
        foreach ($result as $vo) {
            $info = '{
                    "touser":"'.$vo.'",
                    "msgtype":"news",
                    "news":{
                        "articles": [
                         {
                             "title":"'.$title.'",
                             "description":"'.$description.'",
                             "url":"'.$url.'",
                             "picurl":"'.$picurl.'"
                         }
                         ]
                    }
                }';
            $access_token = WchatController::access_token();
            $data[] = WchatController::add_material("https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token,$info);
        }
    }
    public function testUploadImgThumb()
    {

    }

    public function sendToOne()
    {
        $row = $this->sendMessageToUser("opYKmtzZLqZlM93WH5_gU9UztczI","你好","你好吗？我的朋友们","http://www.baidu.com","http://m.matteducation.com/data/upload/55e01fbf932e2.jpg");
        var_dump($row);
    }
    //获取微信用户列表
    private function userList()
    {
        $access_token = WchatController::access_token();
        $row = '';
        $user = WchatController::add_material("https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$access_token."&next_openid=",$row);
        $data = json_decode($user,true);
        $openids = $data['data']['openid'];
        return $openids;
    }
	
}