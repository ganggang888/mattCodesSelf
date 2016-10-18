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
$z[4]=Array("include","",863,903);
$z[4][4]['filename']="head_hxcp.htm";
$z[5]=Array("type","[field:ID /]",998,1033);
$z[6]=Array("list","   \r\n      	<li><a href=\"[field:arcurl/]\"><img src=\"[field:picname/]\"><span>[field:title/]</span><p>[field:description function='cn_substr(@me,150)'/]...</p>\r\n        <p>[field:pubdate function=\"MyDate('Y-m-d',@me)\"/] </p></a></li>\r\n      	",1113,1403);
$z[6][4]['pagesize']="10";
$z[6][4]['titlelen']="80";
$z[7]=Array("pagelist","",1462,1528);
$z[7][4]['listitem']="index,end,pre,next,pageno";
$z[7][4]['listsize']="5";
$z[8]=Array("channel"," \r\n <li><a href='[field:typelink/]'>[field:typename/]</a> </li> \r\n    ",1580,1771);
$z[8][4]['type']="son";
$z[8][4]['row']="6";
$z[8][4]['currentstyle']="<li class='on'><a href='~typelink~' >~typename~</a> </li>";
$z[9]=Array("include","",1790,1827);
$z[9][4]['filename']="bottom.htm";

?>