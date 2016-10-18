<?php
/**
    说明：此类函数是基于优优云图片识别平台的API接口,调用类中的函数可以进行图片识别
 
     
    类中的公有函数：
         setSoftInfo($softID,$softKey);                //设置软件ID和KEY
         userLogin($userName,$passWord);            //用户登录,登录成功返回用户的ID
         getPoint($userName,$passWord);                //获取用户剩余题分
         upload($imagePath,$codeType);                //根据图片路径上传,返回验证码在服务器的ID,$codeType取值查看：http://www.uuwise.com/price.html
         getResult($codeID);                        //根据验证码ID获取识别结果
         autoRecognition($imagePath,$codeType);        //将upload和getResult放到一个函数来执行,返回验证码识别结果
         reportError($codeID);                        //识别结果不正确报错误
         regUser($userName,$userPassword)            //注册新用户,注册成功返回新用户的ID
         pay($userName,$Card);                        //充值题分，充值成功返回用户当前题分
     
    类中的公有变量：
         $macAddress='00e021ac7d';                    //客户机的mac地址,服务器暂时没有用,后期准备用于绑定mac地址        赋值方法： $obj->macAddress='00e021ac7d'; 
         $timeOut='60000';                            //超时时间,建议不要改动此值                                    赋值方法： $obj->timeOut=60000;
          
    函数调用方法：
         需要先new一个对象
         $obj=new uuApi;
         $obj->setSoftInfo('2097','b7ee76f547e34516bc30f6eb6c67c7db');    //如何获取这两个值？请查看这个页面：http://dll.uuwise.com/index.php?n=ApiDoc.GetSoftIDandKEY
         $obj->userLogin('userName','userPassword');
         $result=autoRecognition($imagePath,$codeType);
         
*/
 
class uuApi{
     
    private $softID;
    private $softKEY;
    private $userName;
    private $userPassword;
     
    private $uid;
    private $userKey;
    private $softContentKEY;
     
    private $uuUrl;
    private $uhash;
    private $uuVersion='1.1.0.1';
    private $userAgent;
    private $gkey;
     
    public $macAddress='00e021ac7d';    //客户机的mac地址,服务器暂时没有用,后期准备用于绑定mac地址        赋值方法： $obj->macAddress='00e021ac7d'; 
    public $timeOut=60000;                //超时时间,建议不要改动此值                                    赋值方法： $obj->timeOut=60000;
     
    public function setSoftInfo($id,$key)
    {
        if($id&&$key){
            $this->softID=$id;
            $this->softKEY=$key;
            $this->uhash=md5($id.strtoupper($key));
            return 'YES';
        }
        return 'NO';
    }
    private function getServerUrl($Server)
    {
        $url = "http://common.taskok.com:9000/Service/ServerConfig.aspx";
        $result=$this->uuGetUrl($url,array(),$postData=false);
        preg_match_all("/\,(.*?)\:101\,(.*?)\:102\,(.*?)\:103/", $result, $match_index);
        $arr=array_filter($match_index);
        if(empty($arr)){return '-1001';}
        switch($Server)
        {
            case 'service':
                return 'http://'.$match_index[1][0];
                break;
            case 'upload':
                return 'http://'.$match_index[2][0];
                break;
            case 'code':
                return 'http://'.$match_index[3][0];
                break;
            default:
                return 'parameter error';
        }
        curl_close($this->uuUrl);
    }
    public function userLogin($userName,$passWord)
    {
        if(!($this->softID&&$this->softKEY))
        {
            return 'sorry,SoftID or softKey is not set! Please use the setSoftInfo(id,key) function to set!';
        }
        if(!($userName&&$passWord)){ return 'userName or passWord is empty!';}
        $this->userName=$userName;
        $this->userPassword=$passWord;
        $this->userAgent=md5(strtoupper($this->softKEY).strtoupper($this->userName)).$this->macAddress;
         
        $url = $this->getServerUrl('service').'/Upload/Login.aspx?U='.$this->userName.'&P='.md5($this->userPassword).'&R='.mktime();
        $result=$this->uuGetUrl($url);
         
        if($result>0)
        {
            $this->userKey=$result;
            $this->uid=explode("_",$this->userKey);
            $this->uid=$this->uid[0];
            $this->softContentKEY=md5(strtolower($this->userKey.$this->softID.$this->softKEY));
            $this->gkey=md5(strtoupper($this->softKEY.$this->userName)).$this->macAddress;
            return $this->uid;
        }
        return $result;
 
    }
    public function getPoint($userName,$passWord)
    {
        if(!($userName&&$passWord)){ return 'userName or passWord is empty!';}
        $url = $this->getServerUrl('service').'/Upload/GetScore.aspx?U='.$userName.'&P='.md5($passWord).'&R='.mktime();
        $result=$this->uuGetUrl($url);
        return $result;
    }
    public function upload($imagePath,$codeType,$auth=false)
    {
        if(!file_exists($imagePath)){return '-1003';}
        if(!is_numeric($codeType)){return '-3004';}
        $data=array(
            'img'=>'@'.$imagePath,
            'key'=>$this->userKey,
            'sid'=>$this->softID,
            'skey'=>$this->softContentKEY,
            'TimeOut'=>$this->timeOut,
            'Type'=>$codeType
        );
        $ver=array(
            'Version'=>'100',
        );
        if($auth){$data=$data+$ver;}
        $url = $this->getServerUrl('upload').'/Upload/Processing.aspx?R='.mktime();
        return $this->uuGetUrl($url,$data);
    }
    public function getResult($codeID)
    {
        if(!is_numeric($codeID)){return '-1009|The codeID is not number';}
        $url = $this->getServerUrl('code').'/Upload/GetResult.aspx?KEY='.$this->userKey.'&ID='.$codeID.'&Random='.mktime();
        $result='-3';
        $timer=0;
        while($result=='-3'&&($timer<$this->timeOut))
        {
            $result=$this->uuGetUrl($url,false,false);
            usleep(100000);
        }
        curl_close($this->uuUrl);
        if($result=='-3')
        {
            return '-1002';   
        }
        return $result;
    }
    public function autoRecognition($imagePath,$codeType)
    {
        $result=$this->upload($imagePath,$codeType,$auth=true);
        if($result>0){
            $arrayResult=explode("|",$result);
            if(!empty($arrayResult[1])){return $arrayResult[1];}
            return $this->getResult($result);
        }
        return $result;
    }
    private function uuGetUrl($url,$postData=false,$closeUrl=true)
    {
        $uid=isset($this->uid)?($this->uid):'100';
        $default=array(
            'Accept: text/html, application/xhtml+xml, */*',
            'Accept-Language: zh-CN',
            'Connection: Keep-Alive',
            'Cache-Control: no-cache',
            'SID:'.$this->softID,
            'HASH:'.$this->uhash,
            'UUVersion:'.$this->uuVersion,
            'UID:'.$uid,
            'User-Agent:'.$this->userAgent,
            'KEY:'.$this->gkey,
        );
        $this->uuUrl = curl_init();
        curl_setopt($this->uuUrl, CURLOPT_HTTPHEADER, ($default));
        curl_setopt($this->uuUrl, CURLOPT_HEADER, false);
        curl_setopt($this->uuUrl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->uuUrl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->uuUrl, CURLOPT_VERBOSE, false);
        curl_setopt($this->uuUrl, CURLOPT_TIMEOUT, $this->timeOut);
        curl_setopt($this->uuUrl, CURLOPT_AUTOREFERER, true);
        curl_setopt($this->uuUrl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->uuUrl, CURLOPT_HTTPGET, true);
        curl_setopt($this->uuUrl, CURLOPT_URL,$url);
        if($postData)
        {
            curl_setopt($this->uuUrl, CURLOPT_POST, true);
            curl_setopt($this->uuUrl, CURLOPT_POSTFIELDS, $postData);
        }
        $info=curl_exec($this->uuUrl);
        if($closeUrl){
            curl_close($this->uuUrl);
        }
        return trim($info);
    }
    public function reportError($codeID)
    {
        if(!is_numeric($codeID)){return '-1009|The codeID is not number';}
        if($this->softContentKEY&&$this->userKey)
        {
            $url = $this->getServerUrl('code').'/Upload/ReportError.aspx?key='.$this->userKey.'&ID='.$codeID.'&sid='.$this->softID.'&skey='.$this->softContentKEY.'&R='.mktime();
            $result=$this->uuGetUrl($url);
            if($result=='OK')
            {
                return 'OK';   
            }
            return $result;
        }
        return '-1';
    }
    public function regUser($userName,$userPassword)
    {
        if($this->softID&&$this->softKEY)
        {
            if($userName&&$userPassword)
            {
                $data=array(
                    'U'=>$userName,
                    'P'=>$userPassword,
                    'sid'=>$this->softID,
                    'UKEY'=>md5(strtoupper($userName).$userPassword.$this->softID.strtolower($this->softKEY)),
                );
                $url=$this->getServerUrl('service').'/Service/Reg.aspx';
                return $this->uuGetUrl($url,$data);
            }
            return 'userName or userPassword is empty!';
        }
        return '-1';
    }
     
    public function pay($userName,$Card)
    {
        if($this->softID&&$this->softKEY)
        {
            if($userName&&$Card)
            {
                $data=array(
                    'U'=>$userName,
                    'card'=>$Card,
                    'sid'=>$this->softID,
                    'pkey'=>md5(strtoupper($userName).$this->softID.$this->softKEY.strtoupper($Card)),
                );
                $url=$this->getServerUrl('service').'/Service/Pay.aspx';
                return $this->uuGetUrl($url,$data);
            }
            return 'userName or Card is empty!';
        }
        return '-1';   
    }
}
?>