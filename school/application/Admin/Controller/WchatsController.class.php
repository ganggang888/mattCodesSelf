<?php
//微信自定义回复
namespace Admin\Controller;

use Common\Controller\AdminbaseController;
use Api\Controller\WchatController;
class WchatsController extends AdminbaseController
{
	protected $term = null; //微信自定义回复分类
	protected $reply = null; //回复model
	public function _initialize()
	{
		parent::_initialize();
		$this->term = array(
			array('id'=>1,'name'=>'文本消息'),
			//array('id'=>2,'name'=>'图片消息'),
			array('id'=>3,'name'=>'图文消息'),
		);
		$this->reply = D('reply');
		$this->assign('term',$this->term);
	}

	public function index()
	{
		$count = $this->reply->count();
		$page = $this->page($count,10);
		$result = $this->reply->limit($page->firstRow.",".$page->listRows)->select();
		$this->assign('page',$page->show('Admin'));
		$this->assign('result',$result);
		$this->display();
	}

	//添加触发验证
	public function add()
	{
		$this->display();
	}

	//添加Post
	public function add_post()
	{
		if (IS_POST) {
			$info = array(
				'path'=>$_POST['photos_url'],
				'url'=>$_POST['photos_alt'],
                'title'=>$_POST['title'],
                'description'=>$_POST['description'],
			);
			$_POST['photos'] = serialize($info);
			if ($this->reply->add($_POST)) {
				$this->success('添加成功',U('Wchats/index'));
			} else {
				$this->error('添加失败');
			}
		}
	}

	//修改出发验证
	public function edit()
	{
		$id = intval(I('get.id'));
		$info = $this->reply->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	//修改post
	public function edit_post()
	{
		if (IS_POST) {
			$info = array(
                'path'=>$_POST['photos_url'],
                'url'=>$_POST['photos_alt'],
                'title'=>$_POST['title'],
                'description'=>$_POST['description'],
			);
			$_POST['photos'] = serialize($info);
			//var_dump($_POST);exit;
			if ($this->reply->where(array('id'=>$_POST['id']))->save(array('keyword'=>$_POST['keyword'],'type'=>$_POST['type'],'text'=>$_POST['text'],'photos'=>$_POST['photos']))) {
				$this->success('修改成功',U('Wchats/index'));
			} else {
				$this->error('修改失败');
			}
		}
	}

    public function testPicPost()
    {

        $access_token = WchatController::access_token();
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
	//删除
	public function delete()
	{
		$id = intval(I('get.id'));
		if ($this->reply->where("id = '$id'")->delete()) {
			$this->success('删除成功',U('Wchats/index'));
		} else {
			$this->error('删除失败',U('Wchats/index'));
		}
	}

    //删除自定义菜单
    public function deleteMenu()
    {
        $access_token = WchatController::access_token();
        $data = array(
            'access_token' => $access_token,
        );
        $row = resquestGet("https://api.weixin.qq.com/cgi-bin/menu/delete",$data);
        $info = json_decode($row,true);
        if ($info['errmsg'] == 'ok') {
            echo "删除成功";
        }
    }

    //生成底部菜单
    public function createMenu()
    {

        $access_token = WchatController::access_token();
        $row = WchatController::createmenu($access_token);
        var_dump($row);
    }

    //发红包
    public function sendRed()
    {

       /* $access_token = WchatController::access_token();
        $appid = C("AppID");
        $ordernum = C("CHID").date("YmdHis");
        $nonceStr = nonceStr();
        $mch_id = C("CHID");
        $nick_name = "上海麦忒家政服务发展有限公司";
        $send_name = "send_name";
        $re_openid = "opYKmtzZLqZlM93WH5_gU9UztczI";
        $total_amount = 100;
        $min_value = 100;
        $max_value = 100;
        $total_num = 1;
        $wishing = '给你红包来领';
        $client_ip = '211.149.218.203';
        $act_name = '来给你送红包';
        $remark = '早抢早得到';
        $logo_imgurl = "http://app.mattservice.com/2.png";
        $key = C("PAY_KEY");
        $array = array(
            'nonce_str'=>$nonceStr,
            'mch_billno'=>$ordernum,
            'mch_id'=>$mch_id,
            'wxappid'=>$appid,
            'nick_name'=>$nick_name,
            'send_name'=>$send_name,
            're_openid'=>$re_openid,
            'total_amount'=>$total_amount,
            'min_value'=>$min_value,
            'max_value'=>$max_value,
            'total_num'=>$total_num,
            'wishing'=>$wishing,
            'client_ip'=>$client_ip,
            'act_name'=>$act_name,
            'remark'=>$remark,
            'logo_imgurl'=>$logo_imgurl,
            'share_content'=>'你好吗',
            'share_url'=>'https://xx/img/wxpaylogo.png',
            'share_imgurl'=>'http://app.mattservice.com/2.png',
            'act_id'=>1,
            'act_name'=>'哈哈'

        );
        ksort($array);
        $info = $this->formatQueryParaMap($array,false);*/
        //var_dump($info);
        //var_dump($array);
        //$info = http_build_query($array);
        //$info = $info."&key=".$key;
        /*
        $info = "nonce_str=&mch_billno=126147260120150804152803&mch_id=1261472601&wxappid=wx29e217b2756f8baa&nick_name=%E4%B8%8A%E6%B5%B7%E9%BA%A6%E5%BF%92%E5%AE%B6%E6%94%BF%E6%9C%8D%E5%8A%A1%E5%8F%91%E5%B1%95%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8&send_name=send_name&re_openid=opYKmtzZLqZlM93WH5_gU9UztczI&total_amount=100&min_value=100&max_value=100&total_num=1&wishing=%E7%BB%99%E4%BD%A0%E7%BA%A2%E5%8C%85%E6%9D%A5%E9%A2%86&client_ip=211.149.218.203&act_name=%E5%93%88%E5%93%88&remark=%E6%97%A9%E6%8A%A2%E6%97%A9%E5%BE%97%E5%88%B0&logo_imgurl=http%3A%2F%2Fapp.mattservice.com%2F2.png&share_content=%E4%BD%A0%E5%A5%BD%E5%90%97&share_url=https%3A%2F%2Fxx%2Fimg%2Fwxpaylogo.png&share_imgurl=http%3A%2F%2Fapp.mattservice.com%2F2.png&act_id=1&key=01c6d59a3f9024db6336662acg5c8e74";
*/
        /*$sign = strtoupper(md5($info));
        $array['sign'] = $sign;
        var_dump($sign);
        $data = $this->arrayToXml($array);
        var_dump($data);
        $row = $this->curl_post_ssl("https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack",$data);
        echo $row;exit;*/

    }

    //生成xml
    function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val))
            {
                $xml.="<".$key.">".$val."</".$key.">";

            }
            else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }


    //数组以ASSIC由大到小排序
    function formatQueryParaMap($paraMap, $urlencode){
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v){
            if (null != $v && "null" != $v && "sign" != $k) {
                if($urlencode){
                    $v = urlencode($v);
                }
                $buff .= $k . "=" . $v . "&";
            }
        }
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        return $reqPar;
    }
    function curl_post_ssl($url, $vars, $second=30,$aHeader=array())
    {
        $ch = curl_init();
        //超时时间
        curl_setopt($ch,CURLOPT_TIMEOUT,$second);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        //这里设置代理，如果有的话
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);

        //cert 与 key 分别属于两个.pem文件
        curl_setopt($ch,CURLOPT_SSLCERT,SITE_PATH.'book/apiclient_cert.pem');
        curl_setopt($ch,CURLOPT_SSLKEY,SITE_PATH.'book/apiclient_key.pem');
        curl_setopt($ch,CURLOPT_CAINFO,SITE_PATH.'book/rootca.pem');


        if( count($aHeader) >= 1 ){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
        }

        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$vars);
        $data = curl_exec($ch);
        if($data){
            curl_close($ch);
            return $data;
        }
        else {
            $error = curl_errno($ch);
            curl_close($ch);
            return $data;
        }
    }

    //红包发送记录
    public function red()
    {
        $history = D('send_red');
        $count = $history->count();
        $page = $this->page($count,10);
        $result = $history->limit($page->firstRow . "," . $page->listRows)->select();
        $this->assign('page',$page->show('Admin'));
        $this->assign('result',$result);
        $this->display();
    }

    //删除红包记录
    public function redDelete()
    {
        $history = D('send_red');
        $id = I('get.id');
        if (!$id) {
            $this->error('GET OUT');
        }
        $row = $history->where(array('id'=>$id))->delete();
        if ($row) {
            $this->success('删除成功',U('Wchats/red'));
        } else {
            $this->error('删除失败',U('Wchats/red'));
        }
    }

    //查看用户信息
    public function wxUser()
    {
        $wchat = D('wchat');
        $count = $wchat->count();
        $page = $this->page($count,10);
        $result = $wchat->limit($page->firstRow.",".$page->listRows)->select();
        $this->assign('page',$page->show('Admin'));
        $this->assign('result',$result);
        $this->display();
    }

    //给用户发红包
    public function getRed()
    {
        $id = I('get.id');
        if (!$id) {
            $this->error("GET OUT");
        }
        $this->assign('id',$id);
        $this->display();
    }

    //处理给用户发红包
    public function getRedPost()
    {
        $wchat = D('wchat');
        if (IS_POST) {
            $nick_name = $_POST['nick_name'];
            $send_name = $_POST['send_name'];
            $act_name = $_POST['act_name'];
            $total_amount = $_POST['total_amount'];
            $wishing = $_POST['wishing'];
            $remark = $_POST['remark'];
            if (!$nick_name || !$send_name || !$act_name || !$total_amount || !$wishing || !$remark) {
                $this->error('缺少参数');
            }
            $id = intval(I('post.id'));
            $access_token = WchatController::access_token();
            $re_openid = $wchat->where(array('id'=>$id))->getField('openid');
            $appid = C("AppID");
            $ordernum = C("CHID").date("YmdHis");
            $nonceStr = nonceStr();
            $mch_id = C("CHID");
            $min_value = 100;
            $max_value = 100;
            $total_num = 1;
            $client_ip = '211.149.218.203';
            $logo_imgurl = "http://app.mattservice.com/2.png";
            $key = C("PAY_KEY");
            $array = array(
                'nonce_str'=>$nonceStr,
                'mch_billno'=>$ordernum,
                'mch_id'=>$mch_id,
                'wxappid'=>$appid,
                'nick_name'=>$nick_name,
                'send_name'=>$send_name,
                're_openid'=>$re_openid,
                'total_amount'=>$total_amount,
                'min_value'=>$min_value,
                'max_value'=>$max_value,
                'total_num'=>$total_num,
                'wishing'=>$wishing,
                'client_ip'=>$client_ip,
                'act_name'=>$act_name,
                'remark'=>$remark,
                'logo_imgurl'=>$logo_imgurl,
                'share_content'=>'给你发红包哦',
                'share_url'=>'https://xx/img/wxpaylogo.png',
                'share_imgurl'=>'http://app.mattservice.com/2.png',
                'act_id'=>1,
                'act_name'=>$act_name

            );

            ksort($array);
            $info = $this->formatQueryParaMap($array,false);
            $info = $info."&key=".$key;
            $sign = strtoupper(md5($info));
            $array['sign'] = $sign;
            $data = $this->arrayToXml($array);
            $row = $this->curl_post_ssl("https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack",$data);
            $return = simplexml_load_string($row,'SimpleXMLElement',LIBXML_NOCDATA);
            if ($return->return_code == 'FAIL') {
                $status = 0;
                $message = $return->return_msg;
            } elseif($return->return_code == 'SUCCESS') {
                $status = 1;
                $message = $return->return_msg;
            }
            //添加到数据库
            $add = array(
                'uid'=>$id,
                'nick_name'=>$nick_name,
                'send_name'=>$send_name,
                'act_name'=>$act_name,
                'total_amount'=>$total_amount,
                'wishing'=>$wishing,
                'remark'=>$remark,
                'mch_billno'=>$ordernum,
                'status'=>$status,
                'content'=>$row,
                'add_time'=>date("Y-m-d H:i:s"),
            );
            $send = D('send_red');
            $send->add($add);
            if ($status == 1) {
                $this->success($message);
            } else {
                $this->error($message);
            }

        }
    }


    //群发处理
    public function qunfa()
    {
        if (IS_POST) {
            $access_token = WchatController::access_token();
            //$type = "image";
            $file_path = "@/home/wwwroot/default/school".$_POST['img'];
            $shell = 'curl -F media='.$file_path.' "https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token='.$access_token.'"';
            //$shell = exec($shell);
            //$data = json_decode($shell,true);
            //$img_url = $data['url'];
            /*$news["articles"] = array(
                array(
                    'thumb_media_id'=>"PtpKcHwdt8L034Vk_3s-1yZtNWM98gN_jOxWhAX2C-tCXk2N3tPtOBOro3N9l4of",
                    'author'=>'ganggang',
                    'title'=>'邵博洋喜欢男人',
                    'content_source_url'=>'http://www.baidu.com',
                    'content'=>'方法不会返还话费和发动机和大家的飞机发动机开发的历史水水水水水水水是个毒素就会给分很多看似繁华街道上空返回多数据库粉红色空间的福鼎市尽快发货速度加快发货速度加快返回到数据库返回的是开发环境肯定是否讹误ioueiwhgfuidhgjkfdshjgfdgf回复国家刀快水果湖分阶段可更换瑞光胡日俄故热i',
                    'digest'=>'周超最丑',
                    'show_cover_pic'=>'1',
                ),
            );
            $news = json_encode($news);*/
            $news = '{
                       "articles": [
                             {
                                 "thumb_media_id":"PtpKcHwdt8L034Vk_3s-1yZtNWM98gN_jOxWhAX2C-tCXk2N3tPtOBOro3N9l4of",
                                 "author":"ganggang",
                                 "title":"邵博洋喜欢玩三国杀",
                                 "content_source_url":"www.qq.com",
                                 "content":"你们知道吗，邵博洋不仅喜欢男人，她还非常的喜欢玩三国杀和炉石传说，而且技术也很菜，非常非常非常的菜，就是一个菜鸡",
                                 "digest":"digest",
                                 "show_cover_pic":"1"
                             }
                       ]
                    }';
            //$row = WchatController::add_material("https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=".$access_token,$news);
            $send = array(
                "filter"=>array('is_to_all'=>false,'group_id'=>''),
                "mpnews"=>array('media_id'=>"eBYlwSLNXKIDzex5rWVBauEqoDHI2aTv6cWy7WxzXO40Ilq_O4EI-KpA10Az1Vv9"),
                "msgtype"=>"mpnews",
            );
            $send = json_encode($send);
            $row = WchatController::add_material("https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=".$access_token,$send);
            var_dump($row);exit;
        }
        $this->display();
    }
}
