<?php
//微信
namespace Api\Controller;
use Common\Controller\HomeBaseController;
class WchatController extends HomeBaseController
{
	public function _initialize()
	{
		define("TOKEN","WEdfhjfdpiomnndi12");
		parent::_initialize();
        $access_token = $this->access_token();
        $_COOKIE['access_token'] = $access_token;


	}

	public function index()
	{
		//$this->valid();//
		if ($_COOKIE['access_token']) {
            $this->responseMsg();
		}
	}

	//与微信对接
	private function valid()
	{
		$echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
	}

	//获取access_token
	public function access_token()
	{
        $setting = D('setting');
        $info = $setting->find(1);
        if (!$info) {
            $data = array(
                'grant_type'=>'client_credential',
                'appid'	=>	C("AppID"),
                'secret'=>	C("AppSecret"),
            );
            $row = resquestGet('https://api.weixin.qq.com/cgi-bin/token', $data);
            $row = json_decode($row);
            $insert = array(
                'access_token' => $row->access_token,
            );
            $setting->add(array('data'=>serialize($insert)));
            return $row->access_token;
        } else {
            if (time() - $info['add_time'] > 7100) {
                $data = array(
                    'grant_type'=>'client_credential',
                    'appid'	=>	C("AppID"),
                    'secret'=>	C("AppSecret"),
                );
                $row = resquestGet('https://api.weixin.qq.com/cgi-bin/token', $data);
                $row = json_decode($row);
                $new_data = serialize(array('access_token'=>$row->access_token));
                $setting->where("id = 1")->save(array('data'=>$new_data,'add_time'=>time()));
                return $row->access_token;
            } else {
                $data = unserialize($info['data']);
                return $data['access_token'];
            }
        }
    vendor();
        setcookie('access_token',$row->access_token,time()+3600*2);
        return $row->access_token;

	}


	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	//自定义回复
	public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";             
                if(!empty( $keyword ))
                {
                    $model = M();
                    $info = $model->query("SELECT keyword,type,text,photos FROM sp_reply WHERE INSTR(`keyword`,'$keyword')");
                    if ($info) {
                        $num = array_rand($info,1);
                        $data = $info[$num];
                        $contentStr = $data['text'];
                    } else {
                        $contentStr = '你好呀';
                    }
                    if ($data['type'] == 1) {
                        $msgType = "text";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    } elseif ($data['type'] == 3) {
                        $msgType = 'news';
                        $photos = $data['photos'];
                        $photos = unserialize($photos);
                        $path = $photos['path'];
                        $url = $photos['url'];
                        $title = $photos['title'];
                        $description = $photos['description'];
                        $ArticlesCount = "<ArticleCount>".sizeof($path)."</ArticleCount>";
                        $pic = '';
                        foreach($path as $key=>$vo) {
                            $the_url = "http://m.matteducation.com/".$vo;
                            $pic .= "<item>
                                    <Title><![CDATA[".$title[$key]."]]></Title>
                                    <Description><![CDATA[".$description[$key]."]]></Description>
                                    <PicUrl><![CDATA[".$the_url."]]></PicUrl>
                                    <Url><![CDATA[".$url[$key]."]]></Url>
                                    </item>
                                    ";
                        }
                        $msgType = "news";
                        $textTpl = "<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[%s]]></MsgType>
                                    ".$ArticlesCount."
                                    <Articles>
                                    ".$pic."
                                    </Articles>
                                    </xml>";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType);
                        echo $resultStr;
                    } else {
                        $msgType = "text";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    }
                    
                }else{
                    echo "Input something...";
                }

        }else {
            echo "";
            exit;
        }
    }   


    //创建微信菜单
    public function createmenu($access_token)
    {
        $data = '{
             "button":[
             {
                  "type":"view",
                  "name":"麦忒学校",
                  "url":"http://www.matteducation.com"
              },
              {
                   "type":"view",
                   "name":"学校介绍",
                   "url":"http://m.matteducation.com"
              },
              {
                   "name":"菜单",
                   "sub_button":[
                    {
                       "type":"view",
                       "name":"育儿机器人",
                       "url":"http://app.mattservice.com/re/ma.html"
                    },
                    {
                       "type":"view",
                       "name":"麦忒公司网站",
                       "url":"http://www.mattservice.com"
                    }]
               }]
        }';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }

        curl_close($ch);
        return $tmpInfo;
    }



    //发送POST消息
    public function add_material($url,$info){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $info);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        return $tmpInfo;
    }


}