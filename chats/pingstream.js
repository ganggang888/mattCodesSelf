var BOSH_SERVICE = 'https://192.168.1.20:7443/http-bind/';
var connection = null;
choose = "连接状态调试信息";

function log(msg) 
{
	

		if (choose == "连接状态调试信息") {
			$('#ct').append('<p class="mattself">' + msg + '</p>');

		}
		else {

			$('#ct').append('<p class="mattself" style="display:none;">' + msg + '</p>');

		}
		
		var nows = $('#us').children('.mattself').html();
		var a = parseInt(nows);
		var last = a + 1;
		$('#us').children('.mattself').html(last);
		$('#us').children('.mattself').addClass("redspan");

	
	
	scrollbottom();

}
function message(msg,userphone,chattype)
{


	if ($('.' + userphone).hasClass(userphone)) {


		
		var nows = $('#us').children('.' + userphone).html();
		var a = parseInt(nows);
		var last = a + 1;
		$('#us').children("." + userphone).html(last);
		$('#us').children("." + userphone).addClass("redspan");


		
		
		   
		if (choose == userphone) {

			$('#ct').append('<p class="' + userphone + '">' + msg + '</p>');
			
		}


		else {

			$('#ct').append('<p class="' + userphone + '" style="display:none;">' + msg + '</p>');

		}


	}

	else {

	    $('#us').append('<span style="float:right" class="' + userphone + '">1</span><p class="mattuserphone">' + userphone + '</p>');
	    $('#us').children("." + userphone).addClass("redspan");

		if (choose == userphone) {

			$('#ct').append('<p class="' + userphone + '">' + msg + '</p>');

		}


		else {

			$('#ct').append('<p class="' + userphone + '" style="display:none;">' + msg + '</p>');

		}

	}

	scrollbottom();



	$(function () {

		$(".mattuserphone").click(function () {

			$('#ct').children('p').attr("style", "display:none");

			$('#us').children('p').removeAttr('id');
			$(this).attr("id", "userchoose");



			var p_html = $(this).html();

			choose = p_html;




			if (p_html == "连接状态调试信息") {
				p_html = "mattself";
			}

			$('#ct').children("." + p_html).attr("style", "display:normal");
			$('#us').children("." + p_html).removeClass("redspan");

			scrollbottom();

		});
	})




}

/**
 * 连接绑定方法
 * @param status
 */
function onConnect(status)
{
	if (status == Strophe.Status.CONNECTING) {
	log('正在连接...');
	}else if (status == Strophe.Status.ATTACHED) {
	log('正在登录验证中...');
	}else if (status == Strophe.Status.AUTHFAIL) {
	    log('验证失败，请检查识别号和密码是否正确.');
	    $('#connect').get(0).value = '开始连接';
	}else if (status == Strophe.Status.CONNFAIL) {
	log('连接失败.');
	$('#connect').get(0).value = '开始连接';
	} else if (status == Strophe.Status.DISCONNECTING) {
	log('正在断开连接.');
	} else if (status == Strophe.Status.DISCONNECTED) {
	log('已断开连接.');
	$('#connect').get(0).value = '开始连接';
	} else if (status == Strophe.Status.CONNECTED) {
	log('已连接完成.');
	log('已连接上 ' + connection.jid + 
		' 【调试信息】');
	
	connection.addHandler(onMessage, null, 'message', null, null,  null); 
	connection.send($pres().tree());


	}
}

/**
 * 获取消息时的方法
 * @param msg
 * @returns {Boolean}
 */
function onMessage(msg) {
	var to = msg.getAttribute('to');
	var from = msg.getAttribute('from');
	var fromphone = from.substring(0,from.indexOf("@"));
	var type = msg.getAttribute('type');
	var chattype = msg.getAttribute('id');
	var elems = msg.getElementsByTagName('body');

	if (type == "chat" && elems.length > 0) {
	var body = elems[0];

	var nowtime = new Date();
	message('【' + fromphone + '】: ' + 
		Strophe.getText(body) + '<span style="font-size:x-small;color:orange;">&nbsp&nbsp&nbsp&nbsp(' + nowtime + ')</span>', fromphone, chattype);


	
/*	关闭echo机器的自动回复
	var reply = $msg({to: from, from: to, type: 'chat'})
			.cnode(Strophe.copyElement(body));
	connection.send(reply.tree());

	log('ECHOBOT: I sent ' + from + ': ' + Strophe.getText(body));*/
	
	
	}
	return true;
}

/**
 * 发信息
 * @param toId
 * @param fromId
 * @param msg
 */
function sendMsg(toIDphone,toId, fromId, msg,chatid) {


	var reply = $msg({to: toId, from:fromId , type: 'chat',id: chatid}).cnode(Strophe.xmlElement('body', '' ,msg));
	connection.send(reply.tree());
	message('我对 ' + toIDphone + ': ' + msg,toIDphone,chatid);

	
}

/**
 * 事件监听
 */
$(document).ready(function () {
	connection = new Strophe.Connection(BOSH_SERVICE);

	// Uncomment the following lines to spy on the wire traffic.
	connection.rawInput = function (data) { console.log('RECV: ' + data); };
	connection.rawOutput = function (data) { console.log('SEND: ' + data); };

	// Uncomment the following line to see all the debug output.
	//Strophe.log = function (level, msg) { log('LOG: ' + msg); };

	$('#connect').bind('click', function () {
	var button = $('#connect').get(0);
	if (button.value == '开始连接') {
		button.value = '断开连接';
		connection.connect($('#jid').get(0).value,
				   $('#pass').get(0).value,
				   onConnect);
	} else {
		button.value = '开始连接';
		connection.disconnect();
	}
	});
	
	$('#replay').bind('click', function () {
		toId = $('#tojid').val();
		fromId = $('#jid').val();
		msg=$('#msg').val();
		alert(msg);
		sendMsg(toId,fromId,msg);
	});
});

function scrollbottom() {
	var div = document.getElementById('ct');
	div.scrollTop = div.scrollHeight;
}

