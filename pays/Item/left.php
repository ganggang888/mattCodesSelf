


<style type="text/css"> 
<!--
 
		body{
			margin-left:0px;
			margin-top:0px;
			margin-right:0px;
			margin-bottom:0px;
 
		}
 
.style8 {
	font-family: "宋体"; 
	font-size: 14px;
	color:#333333;
}
.style10 {
	font-family: "宋体";
	font-size: 18px;
	color: #c7000b; 
	font-style: italic;
	font-weight: bold;
}
.style12 {
	font-family: "宋体"; 
	font-size: 14px; 
	color: #c7000b; 
}
	.Box{ width:328px; margin:0px;overflow:auto;}
	.Header{ height:32px;}
	.Content{width:323px; height:320px; overflow-x:hidden;overflow-y:auto;}
	.Bottom{ height:15px; }
-->
</style>
</head>
 
<body bgcolor="transparent" style="overflow-x:hidden">
 <div id="divss" style="outline:none" hidefocus="true" tabindex="0"></div>
 <div class="Box">
  <div class="Header">
<table border="0" cellspacing="0" width="328">
	<tbody><tr>
		<td height="32" style="background:url(../ICBC/orderZone_01.png) no-repeat;border=0;margin=0;padding=0;">
			<table border="0" cellspacing="0">
			  <tbody><tr>
			    <td>&nbsp;
					
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
    <td height="320" align="center" valign="middle" style="background:url(../ICBC/orderZone_02.png) repeat-y;border=0;margin=0;padding=0;"> 
		<table width="300" border="0" style="table-layout:fixed;" cellspacing="1px" cellpadding="1px">
			 <tbody><tr>
				<td width="120" align="right"><span class="style12"><font color="#c7000b"><strong>商城名称：</strong></font></span></td>
				<td width="160" style="word-wrap:break-word;word-break:break-all;overflow:hidden;white-space:normal;"><span class="style12"><font color="#c7000b"><strong>中国银联</strong></font></span></td>
		  </tr>
		  
		  
	        <tr> 
	          <td width="120" align="right"><span class="style12"><font color="#c7000b"><strong>订单金额：</strong></font></span></td>
	          <td width="160">
								<table cellpadding="0px" cellspacing="0px">
								<tbody><tr> 
								 <td>
								  <span class="style12"><font color="#c7000b"><strong>RMB 50.00 </strong></font></span>
									</td>
									<td></td>
								</tr>	
								</tbody></table>
	          	</td>
	        </tr>   
	    		        
					     	             
	
	        <tr> 
	          <td width="120" align="right"><span class="style8">订单号：</span></td>
	          <td width="160" style="word-wrap:break-word;word-break:break-all;overflow:hidden;white-space:normal;"><span class="style8">
	          <?php
	          $info = mt_rand(0000000000,9999999999);
	          echo date("Y-m-d")."0000000000000".$info;
	          ?>
	          </span></td>
	        </tr>
	
 		
		  
		  <tr>
				<td width="120" align="right"><span class="style8">订单时间：</span></td>
             
				<td width="160"><span class="style8" id="tnow">
                <script type="text/javascript">
				var nowDate = new Date();
				var str = nowDate.getFullYear()+"-"+(nowDate.getMonth() + 1)+"-"+nowDate.getDate()+"  "+nowDate.getHours()+":"+nowDate.getMinutes()+":"+nowDate.getSeconds();
				document.write(str);
				</script>
                </span></td>
		  </tr>
 
 
	      
		  <tr>
			<td align="right" width="120"><span class="style8">商品编号：</span></td>
			<td width="160" style="word-wrap:break-word;word-break:break-all;overflow:hidden;white-space:normal;"><span class="style8">59057257</span></td>
		  </tr>
		
   		  
		  <tr>
			<td align="right" width="120"><span class="style8">商品名称：</span></td>
			<td width="160" style="word-wrap:break-word;word-break:break-all;overflow:hidden;white-space:normal;"><span class="style8">工本费用</span></td>
		  </tr>
		
 		  
		  <tr>
			<td align="right" width="120"><span class="style8">商品数量：</span></td>
			<td width="160" style="word-wrap:break-word;word-break:break-all;overflow:hidden;white-space:normal;"><span class="style8">1</span></td>
		  </tr>		  	  
		  <tr>
			<td width="120" align="right"><span class="style8">客户端IP：</span></td>
			<td width="160"><span class="style8">
            	<?php
echo $_SERVER["REMOTE_ADDR"];
            	?>
            </span></td>
		  </tr>	       
			<tr>
				<td height="17" colspan="2"><img src="../ICBC/orderZone_separator.png" width="284" height="17"></td>
		  </tr>
			  <tr>
				<td align="right" width="120"><span class="style8">商城提示：</span></td>
				<td width="160" style="word-wrap:break-word;word-break:break-all;overflow:hidden;white-space:normal;"><span class="style8">工本费用</span></td>
			  </tr> 
	</tbody></table>	</td>
  </tr>
</tbody></table>
</div> 
<div class="Bottom">
  <table border="0" cellspacing="0">
	<tbody><tr>
		<td width="613" height="15" style="background:url(../ICBC/orderZone_03.png) no-repeat;border=0;margin=0;padding=0;">
		</td>
	</tr>
  </tbody></table>
 </div>
 </div>


</body></html>