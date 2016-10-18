<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聊天</title>
</head>
<style>
td{ padding:5px!important}
</style>
<body>
<table width="100%" border="1">
  <tr>
    <td>发送者</td>
    <td>接收者</td>
    <td width="800">内容</td>
    <td width="180">时间</td>
  </tr>
  <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
    <td><?php echo ($vo["fromjid"]); if(strstr($vo['fromjid'],'zhuanjia')): ?>(专家)
    <?php else: ?>
    （用户）<?php endif; ?>
    </td>
    <td><?php echo ($vo["tojid"]); if(strstr($vo['tojid'],'zhuanjia')): ?>(专家)
    <?php else: ?>
    （用户）<?php endif; ?></td>
    <td style="width:800px"><?php echo base64_decode($vo['body']);?></td>
    <td><?php echo date("Y-m-d H:i:s",substr($vo[sentdate], 0, strlen($sentdate) - 3));?></td>
  </tr><?php endforeach; endif; ?>
</table>
<?php echo ($page); ?>
</body>
</html>