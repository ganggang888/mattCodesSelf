<?php
/*
 +-------------------------------
 *    @socket�����ƶ�EMPP
 +-------------------------------
 *    By:Walk Mop
 *    QQ:724300270
 +--------------------------------
 */
/*if ($_GET['keys'] != md5(date("Y-m-d")."ZySWbXnXXXVxMDhLl9ZcWbIinFXkIq")) {
	echo "GET OUT!!!";exit;
}*/
error_reporting(E_ALL);
set_time_limit(0);
$port = 9981;
$ip = "211.136.163.68";
//���͵��ֻ��ż�����
$mobile = 18816978523;
//$content = iconv("utf-8","gbk",$_POST['info']);
$content = "����֧��0.01Ԫ����л������Ӥ�׶��ɳ���ʦ����߯��Ʒ�γ̣�������Я�����֤��У������ѧ�����������κ����ʣ����µ�021-50122333";

//ƽ̨�ʺ�����
$accountId = '10657109084120';
$password = "Mattkaroro71";

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket < 0) {
    echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
}

$result = socket_connect($socket, $ip, $port);
if ($result < 0) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
}

$Timestamp = date("mdHis");

//��Ϣͷ
$Command_Id = pack("N",1);
$Sequence_Id = pack("N",1);
//��Ϣ��
$account = $accountId.pack("C*",0,0,0,0,0,0,0);	//�Ӷ����Ƶ�0��ȫ��21λ
$accountMD5 = $accountId.pack("C*",0,0,0,0,0,0,0,0,0);	//��9�������Ƶ�0

$AuthenticatorSource = md5($accountMD5.$password.$Timestamp,true);
$Version = pack("H",'1.0');
$Timestamp = pack("N",$Timestamp);

$Message = $Command_Id.$Sequence_Id.$account.$AuthenticatorSource.$Version.$Timestamp;
$Total_Length = pack("N",strlen($Message)+4);

$out = '';
$in = $Total_Length.$Message;

if(!socket_write($socket, $in, strlen($Message)+4)) {
    echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
}
//--------------------------�����ƶ�������Ϣ-----------------------------------------
$out = socket_read($socket,37);
$arryResult = unpack("C*",$out);
foreach($arryResult as $key=>$value){
	//��Ϣ��Ҫ�Ļ��Լ�����
}

/* 
	û����Ĵ˴�������Ҫд������룬Ҳ����ȥƽ̨�����ʺ�
*/

//===========================���ŷ���=================================================

//��Ϣͷ
$Command_Id = pack("N",4);
$Sequence_Id = pack("N",0);
//��Ϣ��,�����ֶ�ȫΪ0
$Msg_Id = pack("C*",0,0,0,0,0,0,0,0,0,0);
$Pk_total = pack("h",1);
$Pk_number = pack("h",1);
$Registered_Delivery = pack("h",1); //����״̬
$Msg_Fmt = pack("C",15); //��GB���ָ�ʽ
$ValId_Time = pack("C*",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$At_Time = pack("C*",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); //��ʱ����
$DestUsr_tl = pack("N",1);
$moblieAscii = '';
for($i=0;$i<strlen($mobile);$i++){
	$moblieAscii .= pack("C",ord(substr($mobile,$i,1)));
}
$Dest_terminal_Id = $moblieAscii.pack("C*",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); //�ֻ��Ų�ȫ��32�ֽ�
$Msg_Length = pack("C",strlen($content));
$contentAscii = '';
for($i=0;$i<strlen($content);$i++){
	$contentAscii .= pack("C",ord(substr($content,$i,1)));
}
$Msg_Content = $contentAscii;
$Msg_src = pack("C*",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); //�����ֶΣ�Ĭ��ץ������
$Src_Id = $account; //�ʺ�ȡ�����21λ
$Service_Id = pack("C*",48,0,0,0,0,0,0,0,0,0);
//==========���±����ֶ�===============
$LinkID = pack("C*",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$Msg_level = pack("C",1);
$Fee_UserType = pack("C",2);
$Fee_terminal_Id = pack("C*",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$Fee_terminal_type = pack("C",0);
$TP_pId = pack("C",0);
$TP_udhi = pack("C",0);
$FeeType = pack("CC",48,49);
$FeeCode = pack("C*",48,0,0,0,0,0);
$Dest_terminal_type = pack("C",0);

$Message = $Command_Id.$Sequence_Id.$Msg_Id.$Pk_total.$Pk_number.$Registered_Delivery.$Msg_Fmt.$ValId_Time.$At_Time.$DestUsr_tl.$Dest_terminal_Id.$Msg_Length.$Msg_Content.$Msg_src.$Src_Id.$Service_Id.$LinkID.$Msg_level.$Fee_UserType.$Fee_terminal_Id.$Fee_terminal_type.$TP_pId.$TP_udhi.$FeeType.$FeeCode.$Dest_terminal_type;
$Total_Length = pack("N",strlen($Message)+4);

$in = $Total_Length.$Message;

if(!socket_write($socket, $in, strlen($Message)+4)) {
    echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
}

//������Խ��ܷ��ͷ��ص�״̬
var_dump($in);
echo "�ر�SOCKET...\n";
socket_close($socket);
echo "�ر�OK\n";
?>