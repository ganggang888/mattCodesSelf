<?php
namespace Zhou\Controller;
use Think\Controller;
use Think\Think;
use Think\Tree;
use Think\Page;

class IndexController extends Controller {
    
    protected function _initialize()
    {
    
        if(! is_login()){
            echo "<script>top.location.href='".U('Login/index')."';</script>";
        }
    
    }
    
    //判断是否登录,未登录跳转登录界面，已登录跳转后台主界面
    public function index()
    {
        $this->display();       
    }
    
    //后台桌面
    public function desktop()
    {
        $info = array(
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            'ThinkPHP版本'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
        );
        $this->assign('info',$info);
        $this->display();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**************************************** 文章分类 start **************************************/
    
    //文章分类页面
    public function article_category()
    {
        $cateArray = M("category")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
        
		$this->assign('categoryTR',$categoryList);
		$this->display();
    }
    
    //保存添加文章分类
    public function save_article_category_add()
    {
        $data['pid']       = I('pid');
        $data['catename']  = I('catename');
        $data['catesort']  = I('catesort');
        M('category')->data($data)->add();
    }
    
    //显示修改文章分类
    public function show_article_category_edit()
    {
        //获得当前分类信息
        $cate = M('category')->where('id='.I('id'))->select();
        $this->assign('cate',$cate);
    
        $cateArray = M("category")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
    
        $this->assign('categoryTR',$categoryList);
        $this->display();
    }
    
    //保存修改文章分类
    public function save_article_category_edit()
    {
        $id                = I('id');
        $data['pid']       = I('pid');
        $data['catename']  = I('catename');
        $data['catesort']  = I('catesort');
        M('category')->where('id='.$id)->save($data);
    }
    
    //删除文章分类
    public function article_category_del()
    {
        //判断是否有子分类，如果有子类请先删除子分类
        $id = M('category')->where('pid='.I('id'))->getField('id');        
        
        if($id){
            echo '1';                                       //该分类下面的子类，不能删除，返回1
        }else{
            M('category')->delete(I('id'));                 //删除该分类
            M('article')->where('cid='.I('id'))->delete();  //删除所有属于该分类的文章
            echo '2';                                       //删除成功，返回2
        }

    }
    
    /**************************************** 文章分类 end **************************************/
    
    
    
    
    public function diaocha(){
        // *********分页**********
        $count    = M('diaocha')->count(); //总数
        $listRows = 15;                   //每页显示条数
        $Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
        // ***********************

        //所有文章
        $diaocha = M('diaocha')
            ->order('id desc')
            ->limit($Page->firstRow, $listRows)
            ->select();

        $this->assign('total',$count);
        $this->assign('page',$page_str);
        $this->assign('diaocha',$diaocha);
        $this->display();

    }
    
    public function diaocha_del(){
        $id = I('id');

        M('diaocha')->where('id='.$id)->delete();
    }
    
    
    
    
    
    
    
    
    
    /**************************************** 文章列表 start **************************************/
    
    //文章列表页面
    public function article_list()
    {
        
        // *********分页**********
		$count    = M('article')->count(); //总数
		$listRows = 15;                   //每页显示条数
		$Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
		// ***********************	
		
        //所有文章
		$articleList = M('article')->join('LEFT JOIN __CATEGORY__ ON __ARTICLE__.cid = __CATEGORY__.id')
		->order('aid desc')
		->limit($Page->firstRow, $listRows)
		->select();

		//所有分类
		$cateArray = M("category")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
		$this->assign('categoryTR',$categoryList);
		
		$this->assign('total',$count);
		$this->assign('page',$page_str);
		$this->assign('article',$articleList);
		$this->display();
    }
    
    //显示添加文章页面
    public function show_article_add()
    {
        $cateArray = M("category")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
        $this->assign('categoryTR',$categoryList);
        
        $this->display();
    }
    
    //保存添加文章页面
    public function save_article_add()
    {
        $data['title']           = I('title');
        $data['cid']             = I('cid');
        $data['content']         = I('content');
        $data['create_time']     = time();
        $data['modify_time']     = time();
        $data['hits']            = 0;
        $data['author']          = I('author');
        $data['image']           = I('image');
        $data['zhaiyao']         = I('zhaiyao');
        $data['seo_key']         = I('seo_key');
        $data['seo_description'] = I('seo_description');
        
        M('article')->data($data)->add();
        
        $this->success('添加文章成功！', U('Index/article_list'));
    }
    
    //显示修改文章页面
    public function show_article_edit()
    {
        $cateArray    = M("category")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
        $this->assign('categoryTR',$categoryList);
    
        $id      = I('id');
        $article = M('article')->where('aid='.$id)->select();
        $this->assign('article',$article);
        
        $this->display();
    }
    
    //删除图片
    public function article_img_del(){
        $id     = I('id');
        $imgstr = I('str');
        
        //删除数据库中字段image
        M('article')->where('aid='.$id)->setField('image','');
        
        //删除图片文件
        unlink("./Public/Upload/Uploadify/article/".$imgstr);
    }
    
    public function single_img_del(){
        $id     = I('id');
        $imgstr = I('str');
        
        //删除数据库中字段image
        M('singlepage')->where('id='.$id)->setField('image','');
        
        //删除图片文件
        unlink("./Public/Upload/Uploadify/banner/".$imgstr);
    }
    
    public function save_article_edit()
    {
        $id                      = I('aid');
        $data['title']           = I('title');
        $data['cid']             = I('cid');
        $data['content']         = I('content');
        $data['modify_time']     = time();
        $data['author']          = I('author');
        $data['image']           = I('image');
        $data['zhaiyao']         = I('zhaiyao');
        $data['seo_key']         = I('seo_key');
        $data['seo_description'] = I('seo_description');
        
        M('article')->where('aid='.$id)->save($data);
        
        $this->success('修改文章成功！', U('Index/article_list'));
    }
    
    //删除文章
    public function article_del()
    {
        $id = I('id');
        $img = M('article')->where('aid='.$id)->getField('image');
        //删除图片文件
        unlink("./Public/Upload/Uploadify/article/".$img);
        
        M('article')->where('aid='.$id)->delete();
    }
    
    //批量删除文章
    public function del_article_all()
    {
        $ids = I('ids');
        $ids = substr($ids,0,strlen($ids)-1);
        
        M('article')->delete($ids);
    }
    
    //批量发布文章 
    public function fabu_article_all()
    {
        $ids = I('ids');
        $ids = substr($ids,0,strlen($ids)-1);
        $map['aid']=array('in',$ids); 
        M('article')->where($map)->setField('is_show',1);
    }
    
    /**************************************** 文章列表 end **************************************/
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**************************************** 产品分类 start **************************************/
    
    //产品分类页面
    public function product_category()
    {
        $cateArray = M("productcate")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
    
        $this->assign('categoryTR',$categoryList);
        $this->display();
    }
    
    //保存添加产品分类
    public function save_product_category_add()
    {
        $data['pid']       = I('pid');
        $data['catename']  = I('catename');
        $data['catesort']  = I('catesort');
        M('productcate')->data($data)->add();
    }
    
    //显示修改产品分类
    public function show_product_category_edit()
    {
        //获得当前分类信息
        $cate = M('productcate')->where('id='.I('id'))->select();
        $this->assign('cate',$cate);
    
        $cateArray = M("productcate")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
    
        $this->assign('categoryTR',$categoryList);
        $this->display();
    }
    
    //保存修改产品分类
    public function save_product_category_edit()
    {
        $id                = I('id');
        $data['pid']       = I('pid');
        $data['catename']  = I('catename');
        $data['catesort']  = I('catesort');
        M('productcate')->where('id='.$id)->save($data);
    }
    
    //删除产品分类
    public function product_category_del()
    {
        //判断是否有子分类，如果有子类请先删除子分类
        $id = M('productcate')->where('pid='.I('id'))->getField('id');
    
        if($id){
            echo '1';                                       //该分类下面的子类，不能删除，返回1
        }else{
            M('productcate')->delete(I('id'));              //删除该分类
            M('product')->where('cid='.I('id'))->delete();  //删除所有属于该分类的产品
            echo '2';                                       //删除成功，返回2
        }
    
    }
    
    /**************************************** 产品分类 end **************************************/
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**************************************** 产品列表 start **************************************/
    
    //产品列表页面
    public function product_list()
    {
    
        // *********分页**********
        $count    = M('product')->count(); //总数
        $listRows = 15;                   //每页显示条数
        $Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
        // ***********************
    
        //所有产品
        $productList = M('product')->join('LEFT JOIN __PRODUCTCATE__ ON __PRODUCT__.cid = __PRODUCTCATE__.id')
        ->order('psort asc')
        ->limit($Page->firstRow, $listRows)
        ->select();
    
        //所有分类
        $cateArray = M("productcate")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
        $this->assign('categoryTR',$categoryList);
    
        $this->assign('total',$count);
        $this->assign('page',$page_str);
        $this->assign('product',$productList);
        $this->display();
    }

    public function query_product()
    {
        /********************** 查询条件 ****************************/
        $map = I('get.');
        $str = '1';
        if ($map['title'] != '') {
            $str .= ' AND title like "%' . $map['title'] . '%"';
        }
        if ($map['xinghao'] != '') {
            $str .= ' AND xinghao like "%' . $map['xinghao'] . '%"';
        }
        /************************************************************/

        // *********分页**********
        $count    = M('product')->where($str)->count(); //总数
        $listRows = 15;                   //每页显示条数
        $Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
        // ***********************

        //所有产品
        $productList = M('product')->where($str)->join('LEFT JOIN __PRODUCTCATE__ ON __PRODUCT__.cid = __PRODUCTCATE__.id')
            ->order('psort asc')
            ->limit($Page->firstRow, $listRows)
            ->select();

        //所有分类
        $cateArray = M("productcate")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
        $this->assign('categoryTR',$categoryList);

        $this->assign('get_title', I('title'));
        $this->assign('get_xinghao', I('xinghao'));


        $this->assign('total',$count);
        $this->assign('page',$page_str);
        $this->assign('product',$productList);
        $this->display('Index/product_list');

    }

    //显示添加产品页面
    public function show_product_add()
    {
        $cateArray = M("productcate")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
        $this->assign('categoryTR',$categoryList);
    
        $this->display();
    }
    
    //保存添加产品页面
    public function save_product_add()
    {
        $data['title']           = I('title');
        $data['cid']             = I('cid');
        $data['content']         = I('content');
        $data['create_time']     = time();
        $data['modify_time']     = time();
        $data['hits']            = 0;
        $data['is_tuijian']      = I('is_tuijian');
        $data['image']           = ltrim(I('image'),',');
        $data['seo_key']         = I('seo_key');
        $data['seo_description'] = I('seo_description');
        $data['psort']           = I('psort');

    
        M('product')->data($data)->add();
    
        $this->success('添加产品成功！', U('Index/product_list'));
    }
    
    //显示修改产品页面
    public function show_product_edit()
    {
        $cateArray    = M("productcate")->order('pid asc,catesort asc')->select(); // 不对pid进行asc排序就显示不完全
        $categoryList = Tree::list2tree($cateArray);
        $this->assign('categoryTR',$categoryList);
    
        $id      = I('id');
        $product = M('product')->where('aid='.$id)->select();
        $this->assign('product',$product);
    
        $this->display();
    }



    
    //删除产品图片
    public function product_img_del()
    {
        $id     = I('id');
        $imgstr = I('str');

        $image = M('product')->where('aid='.$id)->getField('image');
        $tmparr = explode(",",$image);
        foreach($tmparr as $v){
            if($v != $imgstr){
                $arr[] = $v;
            }
        }
        $newstr = implode(",",$arr);
        M('product')->where('aid='.$id)->setField('image',$newstr);
    
        //删除图片文件
        unlink("./Public/Upload/Uploadify/product/".$imgstr);
    }

    public function product_fujian_del()
    {
        $id     = I('id');
        $fujian = I('str');

        M('product')->where('aid='.$id)->setField('fujian','');
        M('product')->where('aid='.$id)->setField('fj_title','');

        //删除图片文件
        unlink("./Public/Upload/Uploadify/product/".$fujian);
    }

    public function product_vedio_del()
    {
        $id     = I('id');
        $imgstr = I('str');
        
        //删除数据库中字段image
        M('product')->where('aid='.$id)->setField('vedio','');
        
        //删除图片文件
        unlink("./Public/Upload/Uploadify/product/vedio/".$imgstr);
    }
    
    //保存修改产品
    public function save_product_edit()
    {
        $id                      = I('aid');
        $data['title']           = I('title');
        $data['cid']             = I('cid');
        $data['content']         = I('content');
        $data['modify_time']     = time();
        $data['is_tuijian']      = I('is_tuijian');
        $data['image']           = ltrim(I('image'),',');
        $data['seo_key']         = I('seo_key');
        $data['seo_description'] = I('seo_description');
        $data['psort']           = I('psort');
    
        M('product')->where('aid='.$id)->save($data);
    
        $this->success('修改产品成功！', U('Index/product_list'));
    }
    
    //删除产品
    public function product_del()
    {
        $id = I('id');
        $img = M('product')->where('aid='.$id)->getField('image');
        //删除图片文件
        unlink("./Public/Upload/Uploadify/product/".$img);
    
        M('product')->where('aid='.$id)->delete();
    }
    
    //批量删除产品
    public function del_product_all()
    {
        $ids = I('ids');
        $ids = substr($ids,0,strlen($ids)-1);
    
        M('product')->delete($ids);
    }
    
    //批量发布产品
    public function fabu_product_all()
    {
        $ids = I('ids');
        $ids = substr($ids,0,strlen($ids)-1);
        $map['aid']=array('in',$ids);
        M('product')->where($map)->setField('is_show',1);
    }
    
    /**************************************** 产品列表 end **************************************/
    

    
    
    
    
    
    
    /**************************************** 修改密码  **************************************/
    //显示修改密码界面
    public function modify_password()
    {
        $this->display();
    }
    
    //保存修改密码
    public function save_modify_password()
    {
        $oldpw = md5(I('oldpw').'glenn');
        $newpw = md5(I('newpw1').'glenn');
        
        $pw = M('admin')->getField('password');

        if($pw == $oldpw){
            M('admin')-> where("username='admin'")->setField('password',$newpw);
            $this->success('修改密码成功！', U('Index/modify_password'));
        }else{
            $this->error('原密码错误！', U('Index/modify_password'));
        }
    }
    /**************************************** 修改密码  end **************************************/
    
    
    
    
    
    
    
    
    
    
    
    
    /**************************************** 模块管理  **************************************/
    
    //显示友情链接页面
    public function friend_link()
    {
        $friendlink = M('friendlink')->order('zsort asc')->select();
        $this->assign('friendlink',$friendlink);
        $this->display();    
    }
	
	//显示合作客户页面
    public function hezuo()
    {
        $hezuokehu = M('hezuokehu')->order('id desc')->select();
        $this->assign('hezuokehu',$hezuokehu);
        $this->display();    
    }
	
	//保存添加合作客户
    public function save_hezuokehu_add()
    {
        $data['imgurl']   = I('imgurl');
        M('hezuokehu')->data($data)->add();
    }
	
	//删除合作客户
    public function hezuokehu_del()
    {
        M('hezuokehu')->delete(I('id'));
    }
    
    //保存添加友情链接
    public function save_friendlink_add()
    {
        $data['zsort'] = I('zsort');
        $data['name']  = I('name');
        $data['url']   = I('url');
        M('friendlink')->data($data)->add();
    }
    
    //删除友情链接
    public function friendlink_del()
    {
        M('friendlink')->delete(I('id'));
    }
    
    //显示修改友情链接界面
    public function show_friendlink_edit()
    {
        //获得当前分类信息
        $str = M('friendlink')->where('id='.I('id'))->select();
        $this->assign('link',$str);
        $this->display();    
    }
    
    //保存修改友情链接
    public function save_friendlink_edit()
    {
        $id            = I('id');
        $data['name']  = I('name');
        $data['url']   = I('url');
        $data['zsort'] = I('zsort');
        M('friendlink')->where('id='.$id)->save($data);
    }
    
    //显示友情链接页面
    public function banner()
    {
        $str = M('banner')->order('bsort asc')->select();
        $this->assign('banner',$str);
        $this->display();
    }
    
    //保存添加BANNER
    public function save_banner_add()
    {
        $data['bsort'] = I('bsort');
        $data['image'] = I('image');
        $data['url']   = I('url');
        M('banner')->data($data)->add();
    }
    
    //删除Banner图
    public function banner_del()
    {
        M('banner')->delete(I('id'));
    }
    
    //站点信息
    public function siteinfo()
    {
        $str = M('siteinfo')->select();
        $this->assign('site',$str);
        $this->display();
    }
    
    //保存站点信息修改
    public function save_siteinfo()
    {
        $id                      = I('id');
        $data['company']         = I('company');
        $data['cnname']          = I('cnname');
        $data['mobile']          = I('mobile');
        $data['tel']             = I('tel');
        $data['tel400']          = I('tel400');
        $data['qq']              = I('qq');
        $data['email']           = I('email');
        $data['address']         = I('address');
        $data['micromsg']        = I('micromsg');
        $data['fax']             = I('fax');
        $data['seo_key']         = I('seo_key');
        $data['seo_description'] = I('seo_description');
        $data['tongji']          = I('tongji');
        $data['kefu']            = I('kefu');
        $data['zuobiao']         = I('zuobiao');
      
        M('siteinfo')->where('id='.$id)->save($data);
		

		
        $this->success('站点信息更新成功！', U('Index/siteinfo'));
    }
    
    //问答模块界面（常见问题）
    public function question()
    {
        // *********分页**********
        $count    = M('question')->count(); //总数
        $listRows = 15;                   //每页显示条数
        $Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
        // ***********************
        $str = M('question')->order('zsort asc')->limit($Page->firstRow, $listRows)->select();
        
        $this->assign('total',$count);
        $this->assign('page',$page_str);
        $this->assign('question',$str);
        
        $this->display();
    }
    
    //显示添加问答
    public function show_question_add()
    {
        $this->display();
    }
    
    //保存添加问答
    public function save_question_add()
    {
        $data['zsort']    = I('zsort');
        $data['question'] = I('question');
        $data['answer']   = I('answer');
        M('question')->data($data)->add();
    }
    
    //显示修改问答
    public function show_question_edit()
    {
        $str = M('question')->where('id='.I('id'))->select();
        $this->assign('question',$str);
        $this->display();
    }
    
    //保存修改问答
    public function save_question_edit()
    {
        $id               = I('id');
        $data['zsort']    = I('zsort');
        $data['question'] = I('question');
        $data['answer']   = I('answer');
        M('question')->where('id='.$id)->save($data);
    }
    
    //删除问答
    public function question_del()
    {
        M('question')->delete(I('id'));
    }
    
    //批量删除问答
    public function del_question_all()
    {
        $ids = I('ids');
        $ids = substr($ids,0,strlen($ids)-1);
        M('question')->delete($ids);
    }
    
    //独立页面
    public function single_page()
    {
        $str = M('singlepage')->select();
        $this->assign('singlepage',$str);
        $this->display();
    }
    
    //显示修改独立页面
    public function show_singlepage_edit()
    {
        $str = M('singlepage')->where('id='.I('id'))->select();
        $this->assign('singlepage',$str);
        $this->display();
    }
    
    //保存修改独立页面
    public function save_singlepage_edit()
    {
        $id                      = I('id');
        $data['title']           = I('title');
        $data['seo_key']         = I('seo_key');
        $data['seo_description'] = I('seo_description');
        $data['content']         = I('content');
        $data['image']           = I('image');
        
        M('singlepage')->where('id='.$id)->save($data);
        
        $this->success('修改独立页面成功！', U('Index/single_page'));
    }
    
    //视频中心
    public function vediocenter()
    {
        $str = M('vedio')->select();
        $this->assign('vedio',$str);
        $this->display();
    }
    
    //显示添加视频页面
    public function show_vedio_add()
    {
        $this->display();
    }
    
    //保存添加视频
    public function save_vedio_add()
    {
        $data['vname']  = I('vname');
        if(I('vlocal')){
            $data['vimg']   = I('vimg');
        }
        $data['vurl']   = I('vurl');
        $data['vlocal'] = I('vlocal');
        M('vedio')->data($data)->add();
        $this->success('添加视频成功！', U('Index/vediocenter'));
    }
    
    //删除视频
    public function del_vedio_all()
    {
        $ids = I('ids');
        $ids = substr($ids,0,strlen($ids)-1);
        M('vedio')->delete($ids);
    }
    
    
    //删除留言
    public function message_del()
    {
        M('message')->delete(I('id'));
    }
    
    //批量删除问答
    public function del_message_all()
    {
        $ids = I('ids');
        $ids = substr($ids,0,strlen($ids)-1);
        M('message')->delete($ids);
    }
    
    
    //留言模块
    public function message()
    {
        // *********分页**********
        $count    = M('message')->count(); //总数
        $listRows = 15;                   //每页显示条数
        $Page     = new Page($count,$listRows);      //实例化分页类传入总记录数和每页显示的记录数
        $page_str = $Page->show();
        // ***********************
        $str = M('message')->limit($Page->firstRow, $listRows)->select();
    
        $this->assign('total',$count);
        $this->assign('page',$page_str);
        $this->assign('message',$str);
    
        $this->display();
    }
    /**************************************** 模块管理 end **************************************/
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}