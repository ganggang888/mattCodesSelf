<?php
$z[0]=Array("field","",292,311);
$z[0][4]['name']="title";
$z[1]=Array("global","",312,338);
$z[1][4]['name']="cfg_webname";
$z[2]=Array("field","",379,408);
$z[2][4]['name']="keywords";
$z[3]=Array("field","",448,506);
$z[3][4]['name']="description";
$z[3][4]['function']="html2text(@me)";
$z[4]=Array("include","",863,898);
$z[4][4]['filename']="head.htm";
$z[5]=Array("type","[field:ID /]",993,1028);
$z[6]=Array("list"," \r\n      <li><a href=\"[field:arcurl/]\">\r\n        <div class=\"doc-pic\"><img src=\"[field:picname/]\" alt=\"[field:fulltitle/]\"></div>\r\n        <div class=\"doc-ms\"><span class=\"doc-bt\">[field:title/]</span>[field:description function='cn_substr(@me,130)'/]...\r\n        <p>[field:pubdate function=\"MyDate('Y-m-d',@me)\"/] </p>\r\n        </div>\r\n        \r\n        \r\n        </a></li>\r\n 	",1157,1585);
$z[6][4]['pagesize']="10";
$z[6][4]['titlelen']="80";
$z[7]=Array("pagelist","",1710,1776);
$z[7][4]['listitem']="index,end,pre,next,pageno";
$z[7][4]['listsize']="5";
$z[8]=Array("include","",1800,1837);
$z[8][4]['filename']="footer.htm";
$z[9]=Array("include","",1847,1884);
$z[9][4]['filename']="bottom.htm";

?>