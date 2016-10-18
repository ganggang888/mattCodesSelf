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
/**
 * 首页
 */
class IndexController extends HomebaseController {
	
    //首页
	public function index() {
        define('IN_ECS', true);
        vendor('phpexcel.init');
        vendor('phpexcel.PHPExcel');
        vendor('phpexcel.PHPExcel');
        vendor('phpexcel.PHPExcel.Writer.Excel5');
        vendor('phpexcel.PHPExcel.Writer.Excel2007');
        //创建一个excel对象
        $filePath = "AddrBook.xls"; 
        //建立reader对象  
        $PHPReader = new \PHPExcel_Reader_Excel2007();  
        if(!$PHPReader->canRead($filePath)){  
            $PHPReader = new \PHPExcel_Reader_Excel5();  
            if(!$PHPReader->canRead($filePath)){  
                echo 'no Excel';  
                return ;  
            }  
        }  
          
        //建立excel对象，此时你即可以通过excel对象读取文件，也可以通过它写入文件  
        $PHPExcel = $PHPReader->load($filePath);  
          
        /**读取excel文件中的第一个工作表*/  
        $currentSheet = $PHPExcel->getSheet(0);  
        /**取得最大的列号*/  
        $allColumn = $currentSheet->getHighestColumn();  
        /**取得一共有多少行*/  
        $allRow = $currentSheet->getHighestRow();  
          
        //循环读取每个单元格的内容。注意行从1开始，列从A开始  
        for($rowIndex=1;$rowIndex<=$allRow;$rowIndex++){  
            for($colIndex='A';$colIndex<=$allColumn;$colIndex++){  
                $addr = $colIndex.$rowIndex;  
                $cell = $currentSheet->getCell($addr)->getValue();  
                if($cell instanceof \PHPExcel_RichText)     //富文本转换字符串  
                    $cell = $cell->__toString();
                $info[] = $cell;  
            }  
          
        }
        $i=0;
        foreach ($info as $key=>$vo) {
            if (preg_match('/(13\d|14[57]|15[^4,\D]|17[678]|18\d)\d{8}|170[059]\d{7}/', $vo, $matches)) {
                $array[] = array('name'=>$info[$key-1],'phone'=>$vo);
            }
        }
        var_dump($array);
        var_dump(getimagesize('AddrBook.xls'));
        exit;
    	$this->display(":index");
    }

    //获取疫苗总列表
    public function getInfo()
    {
    	$vaccine = D('vaccine');
    	$content = CurlGet("http://app.miaomiaoguanjia.com/index.php/Api/Yimiao/get_common_yimiao?type=0");
    	$array = json_decode($content,true);

    	//获取不同月龄的数据分别存入数据库
    	foreach ($array['data'] as $vo) {
    		foreach ($vo['yimiao_lists'] as $v) {
    			//获取疫苗详细数据
    			$row = CurlGet("http://app.miaomiaoguanjia.com/index.php/Api/Yimiao/get_yimiao_detail?id=".$v['id']);
    			$result = json_decode($row,true);
    			$result['data']['create_time'] = date("Y-m-d H:i:s",$result['data']['create_time']);
    			$result['data']['update_time'] = date("Y-m-d H:i:s",$result['data']['update_time']);
    			unset($result['data']['id']);
    			$data[] = $result['data'];
    		}
    	}
    	//$vaccine->addAll($data);
    }

   

    //获取怀孕中的信息
    public function pregnancy()
    {
        $pregnancy = D('baby_daily');
        for ($i=1;$i<=52;$i++) {
            $row = curl_file_get_contents("http://www.lamabang.com/yunyu/week-$i-bbtype-3-day-1.html");
            //var_dump(rtrim($row));exit;
            //先获取html中的本周宝宝信息和准妈妈变化信息
            $regex4 = "/<div class=\"cont\".*?>.*?<\/div>/ism";
            preg_match_all($regex4,$row,$text);
            //获取当前孕期所在周期宝宝信息
            $babyMessage = strip_tags($text[0][0]);
            //获取当前所在周妈妈的状况信息
            $motherInfo = strip_tags($text[0][1]);


            preg_match_all("/<div class=\"info\".*?>.*?<\/div>/ism",$row,$info);

            //匹配宝宝身高以及体重相关信息
            preg_match_all("/<em>.*?<\/em>/ism",$info[0][1],$babyInfo);
            $height = strip_tags($babyInfo[0][0]);
            $weight = strip_tags($babyInfo[0][1]);
            preg_match_all("/<div class=\"article\".*?>.*?<\/div>/ism",$row,$taskall);
            $taskall = strip_tags($taskall[0][0]);
            $data[] = array('height'=>$height,'weight'=>$weight,'baby_message'=>$babyMessage,'mother_info'=>$motherInfo,'taskall'=>$taskall,'week'=>$i);
        }

        $pregnancy->addAll($data);
    }


    //有一个四位数，去除最前面一位后剩下三位乘以3刚好等于这个数
    public function trys()
    {
        /*for($i=1000;$i<10000;$i++) {
            if ($i == (substr($i,1,3) * 3)) {
                $j = $i;
            }
        }*/

        for ($i=1000;$i<10000;$i++) {
            for ($j=1;$j<=9;$j++) {
                if (($i - ($j*1000)) < 1000) {
                    $info = ($i - ($j*1000)) * 3;
                    if ($info == $i) {
                       var_dump($i);exit;
                    }
                }
            }
        }
    }

    public function update()
    {
        $illustrated = D('illustrated');
        $wchat = new \Wchat("wx2f971a9e879b1b05","b2aad035cbabe27b7b379177890177fa");
        $result = $wchat->getNew();
        foreach ($result as $vo) {
            $row = $illustrated->where(array('title'=>$vo['title']))->find();
            if (!$row) {
                $illustrated->add($vo);
            }
        }
    }
    
    //获取宝宝每日信息
    public function babyDay()
    {
        $baby_day = D('baby_day');
        for ($i=1;$i<=366;$i++) {
            //判断当前为第几周
            $week = ceil($i/7);
            $info = curl_file_get_contents("http://papi.mama.cn/wap/babygrow/share.php?source=1&week=1&bb_birthday=2016-04-29&days=$i&bb_nickname=");
            $regex4 = "/<p class=\"data-intro\".*?>.*?<\/p>/ism";
            preg_match_all($regex4,$info,$matches);
            $data[] = array('week'=>$week,'day'=>$i,'info'=>trim(strip_tags($matches[0][0])),'add_time'=>date("Y-m-d H:i:s"));
        }
        $baby_day->addAll($data);
    }

    //获取宝宝每日显示信息列表
    public function getBabyInfo()
    {
        $baby_daily = D('baby_daily');
        $baby_day = D('baby_day');
        $result = $baby_day->select();
        foreach ($result as $vo) {
            $info = $baby_daily->where(array('week'=>$vo['week']))->find();
            $baby_day->where(array('id'=>$vo['id']))->save(array('weight'=>$info['weight'],'height'=>$info['height']));
        }
    }

    public function mustTryInfo()
    {
        $model = M();
        $find = $model->query("SELECT * FROM M_Teacher WHERE ID = ");
    }
}


