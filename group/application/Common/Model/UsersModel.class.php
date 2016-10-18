<?php
namespace Common\Model;
use Common\Model\CommonModel;
class UsersModel extends CommonModel
{
	
	protected $_validate = array(
		//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
		array('user_login', 'require', '用户名称不能为空！', 1, 'regex', CommonModel:: MODEL_INSERT  ),
		array('user_pass', 'require', '密码不能为空！', 1, 'regex', CommonModel:: MODEL_INSERT ),
		array('user_login', 'require', '用户名称不能为空！', 0, 'regex', CommonModel:: MODEL_UPDATE  ),
		array('user_pass', 'require', '密码不能为空！', 0, 'regex', CommonModel:: MODEL_UPDATE  ),
		array('user_login','','用户名已经存在！',0,'unique',CommonModel:: MODEL_BOTH ), // 验证user_login字段是否唯一
		array('user_email','','邮箱帐号已经存在！',0,'unique',CommonModel:: MODEL_BOTH ), // 验证user_email字段是否唯一
		array('user_email','email','邮箱格式不正确！',0,'',CommonModel:: MODEL_BOTH ), // 验证user_email字段格式是否正确
	);
	
	protected $_auto = array(
	    array('create_time','mGetDate',CommonModel:: MODEL_INSERT,'callback'),
	    array('birthday','',CommonModel::MODEL_UPDATE,'ignore')
	);
	
	//用于获取时间，格式为2012-02-03 12:12:12,注意,方法不能为private
	function mGetDate() {
		return date('Y-m-d H:i:s');
	}
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
		
		if(!empty($data['user_pass']) && strlen($data['user_pass'])<25){
			$data['user_pass']=sp_password($data['user_pass']);
		}
	}

	//麦麦育儿机器人注册，连接matt_app数据库
	/*@param $phone 注册手机号
	 *@param $password 密码
	 *@param $nickname 昵称
	 *@param $relevance关系 1妈妈 2爸爸 3其他 4月嫂阿姨
	 *$param $pregnancy 我的状态 1在孕期中 0宝宝已出生 2备孕中
	 */
	public function register(int $phone,$password = '',$nickname = '',$relevance,$pregnancy,$uid,$ip,$pid,$day)
	{
		$this->db->startTrans();
		$pwd = md5($password);
		$row = $this->db->execute("INSERT INTO matt_app.users (Telephone,password,role,uuid,pid,is_active,is_locked,ip,first_time_login,registtime) VALUES ($phone,'$pwd','staff','$uid','$pid','YES','NO','$ip','NO',now())");
		if (!$row) {
			$this->db->rollback();
		}
		$result = $this->db->execute("INSERT INTO matt_app.M_Teacher (UserId,Telephone,CreateDate,Name,relevance,pregnancy,day) VALUES ($row,$phone,now(),'$nickname','$relevance','$pregnancy','$day')");

		//添加权限
		$purview = $this->db->execute("INSERT INTO matt_app.acl_user_role_country (user_id,role_id,country_id) VALUES ($row,1015,6)");
		if ($row && $result && $purview) {
			$this->db->commit();
			self::addOpenfireUsers($phone,$password1,'','');
			return true;
		} else {
			$this->db->rollback();
			return false;
		}
	}

	public function addOpenfireUsers($userid, $plainpwd, $uname, $email)
    {
        error_reporting(0);
        $url = "http://xmpp.mattservice.com:9090/plugins/userService/userservice?type=add&secret=pI5w95oM&username=" . $userid . "&password=3d3bae6a-729c-3649-7728-57439a6773cc&name=" . $uname . "&email=" . $email . "&groups='user'";

        //fastcgi_finish_request();
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        $output = curl_exec($ch);

        /*
        $curl = new curl_multi();
        $curl->setUrlList($url);
        $output=$curl->execute();
        */
        if (strstr($output, 'OK')) {
            return true;
        } else {
            return true;
        }
        fclose($f);

    }
	//验证手机号是否注册过
	public function checkPhone(int $phone)
	{
		$row = $this->db->query("SELECT ID FROM matt_app.M_Teacher WHERE Telephone = $phone");
		$result = $this->db->query("SELECT id FROM matt_app.users WHERE Telephone = $phone");
		if (!$row && !$result) {
			return true;
		} else {
			return false;
		}
	}

	//查询某个用户的聊天记录
}

