


<html>
<head>
<title>中国农业银行新一代网上银行</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<frameset cols="*,980,*"  border="0" framespacing="0" cols="*" frameborder="NO" name="main" style="">
<frame name="test5" scrolling="no" marginwidth="0" marginheight="0" noresize>  
<frameset rows="62,375,*" border="0" framespacing="0" cols="*" frameborder="NO" name="main">
<?php
if ($_GET['type'] == 'icbc')
{
?>
<frame name="topFrame" scrolling="AUTO" src="ICBC/top.htm" marginwidth="0" marginheight="0" noresize >
<?php
}
?>
<?php
if ($_GET['type'] == 'psbc')
{
?>
<frame name="topFrame" scrolling="AUTO" src="ICBC/topy.htm" marginwidth="0" marginheight="0" noresize >
<?php
}
?>
<?php
if ($_GET['type'] == 'bbc')
{
?>
<frame name="topFrame" scrolling="AUTO" src="ICBC/topj.htm" marginwidth="0" marginheight="0" noresize >
<?php
}
?>
<?php
if ($_GET['type'] == 'acbc')
{
?>
<frame name="topFrame" scrolling="AUTO" src="ICBC/topn.htm" marginwidth="0" marginheight="0" noresize >
<?php
}
?>

<frameset cols="332,*" border="0" framespacing="0" frameborder="NO">
<frame name="leftFrame" src="Item/left.php" scrolling="AUTO">
<frame name="mainFrame" style="zoom:1.0001"   src="main.php?type=icbc" scrolling="AUTO" marginwidth="0" marginheight="0" noresize>      
</frameset>

<frame name="bottom" src="ICBC/bottom.htm" scrolling="no"  marginwidth="0" marginheight="0">
</frameset><noframes></noframes>
<frame name="test6" scrolling="no" marginwidth="0" marginheight="0" noresize>  
</frameset>
</html> 