<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
/**
 * 文章内页
 */
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class ArticleController extends HomeBaseController {
    //文章内页
    public function index() {
    	$id=intval($_GET['id']);
    	$article=sp_sql_post($id,'');
    	if(empty($article)){
    	    header('HTTP/1.1 404 Not Found');
    	    header('Status:404 Not Found');
    	    if(sp_template_file_exists(MODULE_NAME."/404")){
    	        $this->display(":404");
    	    }
    	    
    	    return ;
    	}

        //add
        $model = M();
        $result = $model->query("SELECT * FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id = 3");
        $this->assign('result',$result);
        //add-end
    	$termid=$article['term_id'];
    	$term_obj= M("Terms");
    	$term=$term_obj->where("term_id='$termid'")->find();
    	
    	$article_id=$article['object_id'];
    	
    	$should_change_post_hits=sp_check_user_action("posts$article_id",1,true);
    	if($should_change_post_hits){
    		$posts_model=M("Posts");
    		$posts_model->save(array("id"=>$article_id,"post_hits"=>array("exp","post_hits+1")));
    	}
    	
    	$article_date=$article['post_modified'];
    	
    	$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';
    	$join2= "".C('DB_PREFIX').'users as c on b.post_author = c.id';
    	$rs= M("TermRelationships");
    	
    	$next=$rs->alias("a")->join($join)->join($join2)->where(array("post_modified"=>array("egt",$article_date), "tid"=>array('neq',$id), "status"=>1,'term_id'=>$termid))->order("post_modified asc")->find();
    	$prev=$rs->alias("a")->join($join)->join($join2)->where(array("post_modified"=>array("elt",$article_date), "tid"=>array('neq',$id), "status"=>1,'term_id'=>$termid))->order("post_modified desc")->find();
    	
    	 
    	$this->assign("next",$next);
    	$this->assign("prev",$prev);
    	
    	$smeta=json_decode($article['smeta'],true);
    	$content_data=sp_content_page($article['post_content']);
    	$article['post_content']=$content_data['content'];
    	$this->assign("page",$content_data['page']);
    	$this->assign($article);
    	$this->assign("smeta",$smeta);
    	$this->assign("term",$term);
        //获取分类id
        $term_info = $model->query("SELECT term_id FROM sp_term_relationships WHERE tid = $id");
        if ($term_info[0]['term_id'] == 2) {
            $allYear = $this->years(2);
        } elseif ($term_info[0]['term_id'] == 1) {
            $allYear = $this->years(1);
        }

        //查询出所点击的当前的所有新闻
        if ($termid == 1 || $term_id == 2) {
            $nums = $model->query("SELECT COUNT(*) AS num FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE YEAR(post_modified) = YEAR('$article_date') AND a.term_id = $termid");
            $theCount = $nums[0]['num'];
            $thePage = $this->page($theCount,10);
            $theResult = $model->query("SELECT * FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE YEAR(post_modified) = YEAR('$article_date') AND a.term_id = $termid ORDER BY post_modified DESC LIMIT ".$thePage->firstRow.",".$thePage->listRows);
            
            $this->assign('');
            $this->assign('allYear',$allYear);
            $this->assign('thePage',$thePage->show('Admin'));
            $this->assign('theResult',$theResult);
        }
        
        //end
    	$this->assign("article_id",$article_id);
    	
    	$tplname=$term["one_tpl"];
    	$tplname=sp_get_apphome_tpl($tplname, "article");
    	$this->display(":$tplname");
    }
    
    public function do_like(){
    	$this->check_login();
    	
    	$id=intval($_GET['id']);//posts表中id
    	
    	$posts_model=M("Posts");
    	
    	$can_like=sp_check_user_action("posts$id",1);
    	
    	if($can_like){
    		$posts_model->save(array("id"=>$id,"post_like"=>array("exp","post_like+1")));
    		$this->success("赞好啦！");
    	}else{
    		$this->error("您已赞过啦！");
    	}
    	
    }

    private function years($term_id)
    {
        $model = M();
        $row = $model->query("SELECT YEAR(`post_modified`) AS year FROM sp_term_relationships a LEFT JOIN sp_posts b ON a.object_id = b.id WHERE a.term_id = $term_id GROUP BY YEAR(`post_modified`) ORDER BY post_modified DESC");
        return $row;
    }
}
