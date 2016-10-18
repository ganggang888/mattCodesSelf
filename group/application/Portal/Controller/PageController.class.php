<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController;
class PageController extends HomebaseController{
	public function index() {
		$id=$_GET['id'];
		$content=sp_sql_page($id);
		
		if(empty($content)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		     
		    return ;
		}
		
		$this->assign($content);
		$smeta=json_decode($content['smeta'],true);
		$tplname=isset($smeta['template'])?$smeta['template']:"";
		
		$tplname=sp_get_apphome_tpl($tplname, "page");
		
		$this->display(":$tplname");
	}
	
	public function nav_index(){
		$navcatname="页面";
		$datas=sp_sql_pages("field:id,post_title;");
		$navrule=array(
				"action"=>"Page/index",
				"param"=>array(
						"id"=>"id"
				),
				"label"=>"post_title");
		exit( sp_get_nav4admin($navcatname,$datas,$navrule) );
	}

	//生成二维码
	public function getCode()
	{
		error_reporting();
		//header("Content-type:text/html;charset=gbk");
		vendor('phpqrcode.phpqrcode');
		vendor('phpqrcode.image');
		$data = 'http://www.baidu.com/';   
		$image = new \Think\Image(); 
		$model = M();
		$result = $model->query("SELECT ID,Title,Media,Month FROM matt_app.m_teststore WHERE Type = 3 AND Media != ''");
		//var_dump($result);exit;
		foreach ($result as $vo) {
			$data = "http://open.mattbaby.com/mattbook.php?id=".DoMcrypt($vo['id'],1);
		    // 纠错级别：L、M、Q、H
		    $errorCorrectionLevel = 'H'; 
		    // 点的大小：1到10
		    $matrixPointSize = 8;
		    $filename = "images/".$vo['id'].".png";
		    \QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 0,false,"000,000,000");
		    $logo = "rebot.png";
		    $newPic = $filename;
		    $vo['title'] = str_replace(":","：",$vo['title']);
		    $vo['title'] = str_replace("/","：",$vo['title']);
		    $image->open($filename)->water($logo,\Think\Image::IMAGE_WATER_CENTER,100)->save($filename); 
		    //img_water_mark($filename,$logo,false,false,3,1000);
		    rename(iconv('UTF-8','GBK',$filename), iconv('UTF-8','GBK',"images/".$vo['title'].".png"));
		    //exit;
		}
	}

	public function test()
	{
		var_dump(DoMcrypt(123,1));
	}

	public function uploadAllFiles()
	{
		if (IS_POST) {
			if($upload["upload"]["tmp_name"]) {
				exit;
			} else {
				foreach ($_FILES as $key=>$vo) {
	    			$info = explode('.',$vo["name"]);
	    			$hou = $info[1];
			 		$names = uniqid();
		            $path = $names.".".$hou;
		            $thePath[] = "http://app.mattservice.com/uploads"."/".$uuid."/".$names.".".$hou;
		            move_uploaded_file($vo["tmp_name"],$path);
        		}
			}
			
		}
		var_dump(unserialize('a:3:{s:5:"info0";a:5:{s:4:"name";s:5:"0.jpg";s:4:"type";s:9:"image/jpg";s:8:"tmp_name";s:14:"/tmp/phpxRJjwV";s:5:"error";i:0;s:4:"size";i:415266;}s:5:"info1";a:5:{s:4:"name";s:5:"1.jpg";s:4:"type";s:9:"image/jpg";s:8:"tmp_name";s:14:"/tmp/phpM4qO9b";s:5:"error";i:0;s:4:"size";i:131260;}s:5:"info2";a:5:{s:4:"name";s:5:"2.jpg";s:4:"type";s:9:"image/jpg";s:8:"tmp_name";s:14:"/tmp/phpN3QnNs";s:5:"error";i:0;s:4:"size";i:415266;}}'));
		$this->display();
	}

	public function addTerm()
	{
		echo md5(date("Y-m-d")."wuyaowangQWIJNG1ds54FDfd4s");
		$this->display();
	}

	//获取天气图标
	public function getIcon()
	{
		$info = curl_file_get_contents("http://api.heweather.com/x3/condition?search=allcond&key=0a94f6b7b6cf43879cc8912a543793ff");
		$info = json_decode($info,true);
		foreach ($info['cond_info'] as $vo) {

			GrabImage($vo['icon'],"data/icon/".$vo['code'].".png");
		}
	}
}