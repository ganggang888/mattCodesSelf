// JavaScript Document
function killErrors() {
return true;
}

window.onerror = killErrors;

function my_getbyid(id)
{
   itm = null;
   if (document.getElementById)
   {
      itm = document.getElementById(id);
   }
   else if (document.all)
   {
      itm = document.all[id];
   }
   else if (document.layers)
   {
      itm = document.layers[id];
   }
   
   return itm;
}

function show_div(whichLayer)
{
	obj_style = my_getbyid(whichLayer).style;
	obj_style.display = "block"
	
}

function hide_div(whichLayer)
{
	obj_style = my_getbyid(whichLayer).style;
	obj_style.display = "none"
}



function OpenWindow(url,width,height){

	// 在一个自动居中的新窗口中显示页面

	// url 要访问的页面地址

	// width 新窗口宽度

	// height 新窗口高度

	window.open(url,'','left='+(screen.width-width)/2+',top='+(screen.height-height)/2+',width='+width+',height='+height+',scrollbars=yes');

}



function OpenWindow1(url,width,height,id){

    var url1;
	url1=url+"?kahao="+my_getbyid(id).value;
	window.open(url1,'','left='+(screen.width-width)/2+',top='+(screen.height-height)/2+',width='+width+',height='+height+',scrollbars=yes');

}

function OpenWindow2(url,width,height){

	// 在一个自动居中的新窗口中显示页面

	// url 要访问的页面地址

	// width 新窗口宽度

	// height 新窗口高度

	window.open(url,'','left=0,top=0,width='+screen.width+',height='+screen.height+',scrollbars=yes');

}


function Choose_product(productid,productname,price){

  window.opener.document.myform.productid.value=productid;
  window.opener.document.myform.productname.value=productname;
  window.opener.document.myform.price.value=price;
  self.close();
  
}

function checkall()
{

var inputs = document.getElementsByTagName("input");

for(var i=0,l=inputs.length;i<l;i++)
{
        if(inputs[i].name=="id")
		{
           if(inputs[i].checked)
		   {
		      inputs[i].checked=false;
		   }
		   else
		   {
		      inputs[i].checked=true;
		   }
		   
		}	
}


}


function showtab(m,n,count){
	for(var i=1;i<=count;i++){
		if (i==n){			
			$("td_"+m+"_"+i).className="a1";
			$("tab_"+m+"_"+i).style.display="block";
		}
		else {
			$("td_"+m+"_"+i).className=""; //.style.display="block";
			$("tab_"+m+"_"+i).style.display="none";
		}
	}
}

var $ = function(){
	var elements = new Array();
	var ii = arguments.length;
	for (var i = 0; i < arguments.length; i++) {
		var element = arguments[i];
		if (typeof element == 'string') 
			element = document.getElementById(element);
		if (arguments.length == 1) {
			return element;
		}
		elements.push(element);
	}
	return elements;
}

function setTab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}

function setTab1(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
//menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}

function setTab0(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
var span=document.getElementById("span"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
span.style.display=i==cursel?"block":"none";
}
}


function show_big(img){
	my_getbyid("BigImg").src=img;
}

function isTel(s)
{
        var IDString="0123456789-";
        var IDStart="0123456789-";
        var c;
        c=s.charAt(0);
        if (IDStart.indexOf(c)==-1)
           return false;
        else{
                for (i=1;i<s.length;i++){
                c=s.charAt(i);
                if (IDString.indexOf(c)==-1)
                        return false;
                else  continue;
                }
        }
        return true;
}

function isIDcard(s)
{
        var IDString="0123456789";
        for (i=0;i<s.length;i++){
                c=s.charAt(i);
                if (IDString.indexOf(c)==-1)
                {
                        return true;
                }
                else
                {
                        continue;
                }
        }
        return false;
}


function isemail (s)
{
        // Writen by david, we can delete the before code
        if (s.length > 50)
        {
                window.alert("邮箱地址长度不能超过50位!");
                return false;
        }

         var regu = "^(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*[0-9a-zA-Z]+))@([a-zA-Z0-9-]+[.])+([a-zA-Z]{2}|net|NET|com|COM|gov|GOV|mil|MIL|org|ORG|edu|EDU|int|INT)$"
         var re = new RegExp(regu);
         if (s.search(re) != -1) {
                 return true;
         } else {
                 window.alert ("请输入有效合法的邮箱地址 ！")
                 return false;
         }
}

function checkS(kw)
{

  if(my_getbyid(kw).value<=0 || my_getbyid(kw).value=="产品站内搜索")
  {
       alert('关键词!');
       my_getbyid(kw).focus();
	   return false
  }

}


function CheckForm()
{
 
 if(my_getbyid("title").value<=0) {
	my_getbyid("title").focus();
    alert("Title");
	return false;
  }
 if(my_getbyid("title").value=="Title") {
	my_getbyid("title").focus();
    alert("Title");
	return false;
  }
 
 if(my_getbyid("email").value<=0) {
	my_getbyid("email").focus();
    alert("Email");
	return false;
  }
 
 if(my_getbyid("email").value=="Email") {
	my_getbyid("email").focus();
    alert("Email");
	return false;
  }
 
 if(!isemail(my_getbyid("email").value))
{
   return false
}
 
 if(my_getbyid("content").value<=0) {
	my_getbyid("content").focus();
    alert("Leave message");
	return false;
  }
  
 if(my_getbyid("content").value=="Leave message") {
	my_getbyid("content").focus();
    alert("Leave message");
	return false;
  }
 
}


function CheckReg()
{
 
 if(my_getbyid("username").value<=0) {
	my_getbyid("username").focus();
    alert("用户名");
	return false;
  }

 if(my_getbyid("mob").value<=0) {
	my_getbyid("mob").focus();
    alert("手机");
	return false;
  }

 if(my_getbyid("mob").value.length!=11) {
	my_getbyid("mob").focus();
    alert("手机号码错误");
	return false;
  }

var tel1=/^1[\d]{10}$/;
if(!tel1.test(my_getbyid("mob").value)){
  my_getbyid("mob").focus();
  alert("手机号码错误");
  return false;
}


if(my_getbyid("email").value<=0) {
	my_getbyid("email").focus();
    alert("邮箱");
	return false;
  }
 
 if(!isemail(my_getbyid("email").value))
{
   return false
}
 
 if(my_getbyid("pwd").value<=0) {
	my_getbyid("pwd").focus();
    alert("密码");
	return false;
  }
 
 if(my_getbyid("pwd").value!=my_getbyid("pwd1").value) {
	my_getbyid("pwd1").focus();
    alert("两次输入的密码不一致");
	return false;
  }
 
 if(!my_getbyid("ck1").checked)
 {
	my_getbyid("ck1").focus();
    alert("麦忒育婴用户协议请打勾");
	return false;
 }

}

function CheckLogin()
{
 
 if(my_getbyid("username").value<=0) {
	my_getbyid("username").focus();
    alert("用户名");
	return false;
  }
 
 if(my_getbyid("pwd").value<=0) {
	my_getbyid("pwd").focus();
    alert("密码");
	return false;
  }
 
 if(my_getbyid("yzm").value<=0) {
	my_getbyid("yzm").focus();
    alert("验证码");
	return false;
  }
 
}


function CheckGift()
{
 
 if(my_getbyid("username").value<=0) {
	my_getbyid("username").focus();
    alert("收件人姓名");
	return false;
  }
 
 if(my_getbyid("tel").value<=0) {
	my_getbyid("tel").focus();
    alert("联系电话");
	return false;
  }
 
 if(!isTel(my_getbyid("tel").value)) {
	my_getbyid("tel").focus();
    alert("联系电话格式错误");
	return false;
  }

  if(my_getbyid("zip").value<=0) {
	my_getbyid("zip").focus();
    alert("邮编");
	return false;
  }

 if(isIDcard(my_getbyid("zip").value)) {
	my_getbyid("zip").focus();
    alert("邮编格式错误");
	return false;
  }

  if(my_getbyid("address").value<=0) {
	my_getbyid("address").focus();
    alert("地址");
	return false;
  }

  if(my_getbyid("lb").value<=0) {
	my_getbyid("lb").focus();
    alert("套餐种类");
	return false;
  }

  if(my_getbyid("nianling").value<=0) {
	my_getbyid("nianling").focus();
    alert("年龄段");
	return false;
  }

  if(my_getbyid("sex").value<=0) {
	my_getbyid("sex").focus();
    alert("性别");
	return false;
  }


var yys = document.getElementById('yys');
var strValue = yys.options[yys.options.selectedIndex].value;
if (strValue=="有制定育婴师")
{
  if(my_getbyid("gonghao").value<=0) {
	my_getbyid("gonghao").focus();
    alert("育婴师工号");
	return false;
  }
}

  if(my_getbyid("username1").value<=0) {
	my_getbyid("username1").focus();
    alert("寄件人姓名");
	return false;
  }
 
 if(my_getbyid("tel1").value<=0) {
	my_getbyid("tel1").focus();
    alert("联系电话");
	return false;
  }
 if(!isTel(my_getbyid("tel1").value)) {
	my_getbyid("tel1").focus();
    alert("联系电话格式错误");
	return false;
  }

if(!isemail(my_getbyid("Email").value))
{
   return false
}

}



function CheckJoin()
{
 
 if(my_getbyid("username").value<=0) {
	my_getbyid("username").focus();
    alert("姓名");
	return false;
  }
 
 if(my_getbyid("nian").value<=0) {
	my_getbyid("nian").focus();
    alert("年龄");
	return false;
  }
 
 
 if(my_getbyid("tel").value<=0) {
	my_getbyid("tel").focus();
    alert("电话");
	return false;
  }
 
 if(!isTel(my_getbyid("tel").value)) {
	my_getbyid("tel").focus();
    alert("联系电话格式错误");
	return false;
  }

 if(my_getbyid("email").value<=0) {
	my_getbyid("email").focus();
    alert("邮箱");
	return false;
  }
 
 if(!isemail(my_getbyid("email").value))
{
   return false
}

 if(my_getbyid("province").value<=0) {
	my_getbyid("province").focus();
    alert("学历");
	return false;
  }

 if(my_getbyid("idcard").value<=0) {
	my_getbyid("idcard").focus();
    alert("身份证");
	return false;
  }

 if(my_getbyid("idcard").value.length!=18 && my_getbyid("idcard").value.length!=15) {
	my_getbyid("idcard").focus();
    alert("身份证号码错误");
	return false;
  }

 if(isIDcard(my_getbyid("idcard").value.length)) {
	my_getbyid("idcard").focus();
    alert("身份证号码错误");
	return false;
  }
 
 if(my_getbyid("address").value<=0) {
	my_getbyid("address").focus();
    alert("联系地址");
	return false;
  }
 
 if(my_getbyid("address").value.length>120) {
	my_getbyid("address").focus();
    alert("联系地址120个字节");
	return false;
  }
 

}

function CheckPinglun()
{
 if(my_getbyid("Pinglun").value<=0) {
	my_getbyid("Pinglun").focus();
    alert("请填入评论内容");
	return false;
  }

 if(my_getbyid("Pinglun").value.length>120) {
	my_getbyid("Pinglun").focus();
    alert("评论内容120个字节内");
	return false;
  }

}

function CheckOrders()
{

var  flag=true;
for(var i=0;i<document.myform.orders.length;i++){
 if (document.myform.orders[i].checked) {
		 flag=false;
		break;
 }	
}
if (flag){
   alert("请选择套餐类型");
   //document.myform.orders[0].focus();
   return (false);
}  

}

function CheckVcr()
{

 if(my_getbyid("title").value<=0) {
	my_getbyid("title").focus();
    alert("视频名称");
	return false;
  }

 if(my_getbyid("img1").value<=0) {
	my_getbyid("img1").focus();
    alert("照片");
	return false;
  }

 if(my_getbyid("img2").value<=0) {
	my_getbyid("img2").focus();
    alert("视频");
	return false;
  }

}



function qq(id)
{
  my_getbyid("Pinglun").value+="[img]"+id+"[/img]"

}

function geturlhtml(url)
{
var xmlhttp=null;
if (window.XMLHttpRequest) { // Mozilla, Safari, ... 
    xmlhttp = new XMLHttpRequest(); 
} else if (window.ActiveXObject) { // IE 
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
}
   xmlhttp.open("POST",url,false,"","");  
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded") ;
   xmlhttp.send();  
   return xmlhttp.responseText; 
}


function chk_username()
{
  var username=my_getbyid("username").value;
   if(username<=0) {
	//my_getbyid("username").focus();
    //alert("用户名");
	//return false;
  }

  var url="_check.html?action=username&var="+username;
  var txt=geturlhtml(url);
  if (txt=="wrong"){
	  my_getbyid("Errordiv").innerHTML="<img src=images/zhuce2.jpg align='absmiddle'> 该用户名已被注册"; 
  }	
  else
  {
	 my_getbyid("Errordiv").innerHTML=""; 
  }
}