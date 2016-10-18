<body class="J_scroll_fixed"><div style="display: none; position: absolute;" class=""><div class="aui_outer"><table class="aui_border"><tbody><tr><td class="aui_nw"></td><td class="aui_n"></td><td class="aui_ne"></td></tr><tr><td class="aui_w"></td><td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move;"></div><a class="aui_close" href="javascript:/*artDialog*/;">×</a></div></td></tr><tr><td class="aui_icon" style="display: none;"><div class="aui_iconBg" style="background-image: none; background-position: initial initial; background-repeat: initial initial;"></div></td><td class="aui_main" style="width: auto; height: auto;"><div class="aui_content" style="padding: 20px 25px;"></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons" style="display: none;"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se" style="cursor: se-resize;"></td></tr></tbody></table></div></div>
<div class="wrap J_check_wrap">
<ul class="nav nav-tabs">
    <li class="active"><a href="/matt/index.php?g=Admin&amp;m=menu&amp;a=index">后台菜单</a></li>
    <li><a href="/matt/index.php?g=Admin&amp;m=menu&amp;a=add">添加菜单</a></li>
    <li><a href="/matt/index.php?g=Admin&amp;m=menu&amp;a=spmy_import_menu">导入菜单</a></li>
    <li><a href="/matt/index.php?g=Admin&amp;m=menu&amp;a=lists">所有菜单</a></li>
    <li><a href="/matt/index.php?g=Admin&amp;m=menu&amp;a=spmy_export_menu">备份菜单</a></li>		</ul>
<form class="J_ajaxForm" action="/matt/index.php?g=Admin&amp;m=Menu&amp;a=listorders" method="post">
<div class="table-actions">
    <button class="btn btn_submit btn-primary btn-small J_ajax_submit_btn" type="submit">排序</button>
</div>
<table class="table table-hover table-bordered table-list treeTable" id="menus-table">
<thead>
<tr>
    <th width="80">排序</th>
    <th width="50">ID</th>
    <th>应用</th>
    <th>菜单名称</th>
    <th width="80">状态</th>
    <th width="150">管理操作</th>
</tr>
</thead>
<tbody>
<tr id="node-109" class="initialized parent collapsed">
    <td style="padding-left:20px;"><span style="padding-left: 20px" class="expander"></span><input name="listorders[109]" type="text" size="3" value="0" class="input input-order"></td>
    <td>109</td>
    <td>Admin/Setting/default</td>
    <td>设置</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=109&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=109&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=109&amp;menuid=100">删除</a> </td>
</tr><tr id="node-110" class="child-of-node-109" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[110]" type="text" size="3" value="0" class="input input-order"></td>
    <td>110</td>
    <td>Admin/Setting/userdefault</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 个人信息</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=110&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=110&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=110&amp;menuid=100">删除</a> </td>
</tr><tr id="node-111" class="child-of-node-110" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[111]" type="text" size="3" value="0" class="input input-order"></td>
    <td>111</td>
    <td>Admin/User/userinfo</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 修改信息</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=111&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=111&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=111&amp;menuid=100">删除</a> </td>
</tr><tr id="node-112" class="child-of-node-111" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[112]" type="text" size="3" value="0" class="input input-order"></td>
    <td>112</td>
    <td>Admin/User/userinfo_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 修改信息提交</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=112&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=112&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=112&amp;menuid=100">删除</a> </td>
</tr><tr id="node-113" class="child-of-node-110" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[113]" type="text" size="3" value="0" class="input input-order"></td>
    <td>113</td>
    <td>Admin/Setting/password</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 修改密码</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=113&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=113&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=113&amp;menuid=100">删除</a> </td>
</tr><tr id="node-114" class="child-of-node-113" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[114]" type="text" size="3" value="0" class="input input-order"></td>
    <td>114</td>
    <td>Admin/Setting/password_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交修改</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=114&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=114&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=114&amp;menuid=100">删除</a> </td>
</tr><tr id="node-115" class="child-of-node-109" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[115]" type="text" size="3" value="0" class="input input-order"></td>
    <td>115</td>
    <td>Admin/Setting/site</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 网站信息</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=115&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=115&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=115&amp;menuid=100">删除</a> </td>
</tr><tr id="node-116" class="child-of-node-115" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[116]" type="text" size="3" value="0" class="input input-order"></td>
    <td>116</td>
    <td>Admin/Setting/site_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 提交修改</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=116&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=116&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=116&amp;menuid=100">删除</a> </td>
</tr><tr id="node-117" class="child-of-node-115" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[117]" type="text" size="3" value="0" class="input input-order"></td>
    <td>117</td>
    <td>Admin/Route/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 路由列表</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=117&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=117&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=117&amp;menuid=100">删除</a> </td>
</tr><tr id="node-118" class="child-of-node-115" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[118]" type="text" size="3" value="0" class="input input-order"></td>
    <td>118</td>
    <td>Admin/Route/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 路由添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=118&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=118&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=118&amp;menuid=100">删除</a> </td>
</tr><tr id="node-119" class="child-of-node-118" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[119]" type="text" size="3" value="0" class="input input-order"></td>
    <td>119</td>
    <td>Admin/Route/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 路由添加提交</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=119&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=119&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=119&amp;menuid=100">删除</a> </td>
</tr><tr id="node-120" class="child-of-node-115" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[120]" type="text" size="3" value="0" class="input input-order"></td>
    <td>120</td>
    <td>Admin/Route/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 路由编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=120&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=120&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=120&amp;menuid=100">删除</a> </td>
</tr><tr id="node-121" class="child-of-node-120" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[121]" type="text" size="3" value="0" class="input input-order"></td>
    <td>121</td>
    <td>Admin/Route/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 路由编辑提交</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=121&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=121&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=121&amp;menuid=100">删除</a> </td>
</tr><tr id="node-122" class="child-of-node-115" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[122]" type="text" size="3" value="0" class="input input-order"></td>
    <td>122</td>
    <td>Admin/Route/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 路由删除</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=122&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=122&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=122&amp;menuid=100">删除</a> </td>
</tr><tr id="node-123" class="child-of-node-115" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[123]" type="text" size="3" value="0" class="input input-order"></td>
    <td>123</td>
    <td>Admin/Route/ban</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 路由禁止</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=123&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=123&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=123&amp;menuid=100">删除</a> </td>
</tr><tr id="node-124" class="child-of-node-115" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[124]" type="text" size="3" value="0" class="input input-order"></td>
    <td>124</td>
    <td>Admin/Route/open</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 路由启用</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=124&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=124&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=124&amp;menuid=100">删除</a> </td>
</tr><tr id="node-125" class="child-of-node-115" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[125]" type="text" size="3" value="0" class="input input-order"></td>
    <td>125</td>
    <td>Admin/Route/listorders</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 路由排序</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=125&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=125&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=125&amp;menuid=100">删除</a> </td>
</tr><tr id="node-126" class="child-of-node-109" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[126]" type="text" size="3" value="0" class="input input-order"></td>
    <td>126</td>
    <td>Admin/Mailer/default</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 邮箱配置</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=126&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=126&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=126&amp;menuid=100">删除</a> </td>
</tr><tr id="node-127" class="child-of-node-126" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[127]" type="text" size="3" value="0" class="input input-order"></td>
    <td>127</td>
    <td>Admin/Mailer/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ SMTP配置</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=127&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=127&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=127&amp;menuid=100">删除</a> </td>
</tr><tr id="node-128" class="child-of-node-127" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[128]" type="text" size="3" value="0" class="input input-order"></td>
    <td>128</td>
    <td>Admin/Mailer/index_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交配置</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=128&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=128&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=128&amp;menuid=100">删除</a> </td>
</tr><tr id="node-129" class="child-of-node-126" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[129]" type="text" size="3" value="0" class="input input-order"></td>
    <td>129</td>
    <td>Admin/Mailer/active</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 邮件模板</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=129&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=129&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=129&amp;menuid=100">删除</a> </td>
</tr><tr id="node-130" class="child-of-node-129" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[130]" type="text" size="3" value="0" class="input input-order"></td>
    <td>130</td>
    <td>Admin/Mailer/active_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交模板</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=130&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=130&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=130&amp;menuid=100">删除</a> </td>
</tr><tr id="node-131" class="child-of-node-109" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[131]" type="text" size="3" value="1" class="input input-order"></td>
    <td>131</td>
    <td>Admin/Setting/clearcache</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 清除缓存</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=131&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=131&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=131&amp;menuid=100">删除</a> </td>
</tr><tr id="node-132" class="initialized parent collapsed">
    <td style="padding-left:20px;"><span style="padding-left: 20px" class="expander"></span><input name="listorders[132]" type="text" size="3" value="10" class="input input-order"></td>
    <td>132</td>
    <td>User/Indexadmin/default</td>
    <td>用户管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=132&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=132&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=132&amp;menuid=100">删除</a> </td>
</tr><tr id="node-133" class="child-of-node-132" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[133]" type="text" size="3" value="0" class="input input-order"></td>
    <td>133</td>
    <td>User/Indexadmin/default1</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 用户组</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=133&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=133&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=133&amp;menuid=100">删除</a> </td>
</tr><tr id="node-134" class="child-of-node-133" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[134]" type="text" size="3" value="0" class="input input-order"></td>
    <td>134</td>
    <td>User/Indexadmin/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 本站用户</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=134&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=134&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=134&amp;menuid=100">删除</a> </td>
</tr><tr id="node-135" class="child-of-node-134" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[135]" type="text" size="3" value="0" class="input input-order"></td>
    <td>135</td>
    <td>User/Indexadmin/ban</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 拉黑会员</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=135&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=135&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=135&amp;menuid=100">删除</a> </td>
</tr><tr id="node-136" class="child-of-node-134" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[136]" type="text" size="3" value="0" class="input input-order"></td>
    <td>136</td>
    <td>User/Indexadmin/cancelban</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 启用会员</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=136&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=136&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=136&amp;menuid=100">删除</a> </td>
</tr><tr id="node-137" class="child-of-node-133" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[137]" type="text" size="3" value="0" class="input input-order"></td>
    <td>137</td>
    <td>User/Oauthadmin/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 第三方用户</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=137&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=137&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=137&amp;menuid=100">删除</a> </td>
</tr><tr id="node-138" class="child-of-node-137" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[138]" type="text" size="3" value="0" class="input input-order"></td>
    <td>138</td>
    <td>User/Oauthadmin/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 第三方用户解绑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=138&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=138&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=138&amp;menuid=100">删除</a> </td>
</tr><tr id="node-139" class="child-of-node-132" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[139]" type="text" size="3" value="0" class="input input-order"></td>
    <td>139</td>
    <td>User/Indexadmin/default3</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 管理组</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=139&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=139&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=139&amp;menuid=100">删除</a> </td>
</tr><tr id="node-140" class="child-of-node-139" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[140]" type="text" size="3" value="0" class="input input-order"></td>
    <td>140</td>
    <td>Admin/Rbac/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 角色管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=140&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=140&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=140&amp;menuid=100">删除</a> </td>
</tr><tr id="node-141" class="child-of-node-140" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[141]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>141</td>
    <td>Admin/Rbac/member</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 成员管理</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=141&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=141&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=141&amp;menuid=100">删除</a> </td>
</tr><tr id="node-142" class="child-of-node-140" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[142]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>142</td>
    <td>Admin/Rbac/authorize</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 权限设置</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=142&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=142&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=142&amp;menuid=100">删除</a> </td>
</tr><tr id="node-143" class="child-of-node-142" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[143]" type="text" size="3" value="0" class="input input-order"></td>
    <td>143</td>
    <td>Admin/Rbac/authorize_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交设置</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=143&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=143&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=143&amp;menuid=100">删除</a> </td>
</tr><tr id="node-144" class="child-of-node-140" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[144]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>144</td>
    <td>Admin/Rbac/roleedit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑角色</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=144&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=144&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=144&amp;menuid=100">删除</a> </td>
</tr><tr id="node-145" class="child-of-node-144" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[145]" type="text" size="3" value="0" class="input input-order"></td>
    <td>145</td>
    <td>Admin/Rbac/roleedit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=145&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=145&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=145&amp;menuid=100">删除</a> </td>
</tr><tr id="node-146" class="child-of-node-140" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[146]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>146</td>
    <td>Admin/Rbac/roledelete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除角色</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=146&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=146&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=146&amp;menuid=100">删除</a> </td>
</tr><tr id="node-147" class="child-of-node-140" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[147]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>147</td>
    <td>Admin/Rbac/roleadd</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加角色</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=147&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=147&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=147&amp;menuid=100">删除</a> </td>
</tr><tr id="node-148" class="child-of-node-147" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[148]" type="text" size="3" value="0" class="input input-order"></td>
    <td>148</td>
    <td>Admin/Rbac/roleadd_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=148&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=148&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=148&amp;menuid=100">删除</a> </td>
</tr><tr id="node-149" class="child-of-node-139" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[149]" type="text" size="3" value="0" class="input input-order"></td>
    <td>149</td>
    <td>Admin/User/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 管理员</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=149&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=149&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=149&amp;menuid=100">删除</a> </td>
</tr><tr id="node-160" class="child-of-node-149" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[160]" type="text" size="3" value="0" class="input input-order"></td>
    <td>160</td>
    <td>Admin/User/ban</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 禁用管理员</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=160&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=160&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=160&amp;menuid=100">删除</a> </td>
</tr><tr id="node-161" class="child-of-node-149" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[161]" type="text" size="3" value="0" class="input input-order"></td>
    <td>161</td>
    <td>Admin/User/cancelban</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 启用管理员</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=161&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=161&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=161&amp;menuid=100">删除</a> </td>
</tr><tr id="node-150" class="child-of-node-149" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[150]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>150</td>
    <td>Admin/User/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除管理员</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=150&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=150&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=150&amp;menuid=100">删除</a> </td>
</tr><tr id="node-151" class="child-of-node-149" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[151]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>151</td>
    <td>Admin/User/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 管理员编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=151&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=151&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=151&amp;menuid=100">删除</a> </td>
</tr><tr id="node-152" class="child-of-node-151" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[152]" type="text" size="3" value="0" class="input input-order"></td>
    <td>152</td>
    <td>Admin/User/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 编辑提交</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=152&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=152&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=152&amp;menuid=100">删除</a> </td>
</tr><tr id="node-153" class="child-of-node-149" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[153]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>153</td>
    <td>Admin/User/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 管理员添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=153&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=153&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=153&amp;menuid=100">删除</a> </td>
</tr><tr id="node-154" class="child-of-node-153" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[154]" type="text" size="3" value="0" class="input input-order"></td>
    <td>154</td>
    <td>Admin/User/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加提交</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=154&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=154&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=154&amp;menuid=100">删除</a> </td>
</tr><tr id="node-85" class="initialized parent collapsed">
    <td style="padding-left:20px;"><span style="padding-left: 20px" class="expander"></span><input name="listorders[85]" type="text" size="3" value="20" class="input input-order"></td>
    <td>85</td>
    <td>Admin/Menu/default</td>
    <td>菜单管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=85&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=85&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=85&amp;menuid=100">删除</a> </td>
</tr><tr id="node-86" class="child-of-node-85" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[86]" type="text" size="3" value="0" class="input input-order"></td>
    <td>86</td>
    <td>Admin/Navcat/default1</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 前台菜单</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=86&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=86&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=86&amp;menuid=100">删除</a> </td>
</tr><tr id="node-87" class="child-of-node-86" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[87]" type="text" size="3" value="0" class="input input-order"></td>
    <td>87</td>
    <td>Admin/Nav/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 菜单管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=87&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=87&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=87&amp;menuid=100">删除</a> </td>
</tr><tr id="node-88" class="child-of-node-87" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[88]" type="text" size="3" value="0" class="input input-order"></td>
    <td>88</td>
    <td>Admin/Nav/listorders</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 前台导航排序</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=88&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=88&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=88&amp;menuid=100">删除</a> </td>
</tr><tr id="node-89" class="child-of-node-87" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[89]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>89</td>
    <td>Admin/Nav/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除菜单</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=89&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=89&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=89&amp;menuid=100">删除</a> </td>
</tr><tr id="node-90" class="child-of-node-87" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[90]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>90</td>
    <td>Admin/Nav/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑菜单</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=90&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=90&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=90&amp;menuid=100">删除</a> </td>
</tr><tr id="node-91" class="child-of-node-90" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[91]" type="text" size="3" value="0" class="input input-order"></td>
    <td>91</td>
    <td>Admin/Nav/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=91&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=91&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=91&amp;menuid=100">删除</a> </td>
</tr><tr id="node-92" class="child-of-node-87" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[92]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>92</td>
    <td>Admin/Nav/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加菜单</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=92&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=92&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=92&amp;menuid=100">删除</a> </td>
</tr><tr id="node-93" class="child-of-node-92" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[93]" type="text" size="3" value="0" class="input input-order"></td>
    <td>93</td>
    <td>Admin/Nav/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=93&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=93&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=93&amp;menuid=100">删除</a> </td>
</tr><tr id="node-94" class="child-of-node-86" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[94]" type="text" size="3" value="0" class="input input-order"></td>
    <td>94</td>
    <td>Admin/Navcat/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 菜单分类</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=94&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=94&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=94&amp;menuid=100">删除</a> </td>
</tr><tr id="node-95" class="child-of-node-94" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[95]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>95</td>
    <td>Admin/Navcat/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=95&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=95&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=95&amp;menuid=100">删除</a> </td>
</tr><tr id="node-96" class="child-of-node-94" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[96]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>96</td>
    <td>Admin/Navcat/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=96&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=96&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=96&amp;menuid=100">删除</a> </td>
</tr><tr id="node-97" class="child-of-node-96" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[97]" type="text" size="3" value="0" class="input input-order"></td>
    <td>97</td>
    <td>Admin/Navcat/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=97&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=97&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=97&amp;menuid=100">删除</a> </td>
</tr><tr id="node-98" class="child-of-node-94" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[98]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>98</td>
    <td>Admin/Navcat/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=98&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=98&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=98&amp;menuid=100">删除</a> </td>
</tr><tr id="node-99" class="child-of-node-98" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[99]" type="text" size="3" value="0" class="input input-order"></td>
    <td>99</td>
    <td>Admin/Navcat/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=99&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=99&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=99&amp;menuid=100">删除</a> </td>
</tr><tr id="node-100" class="child-of-node-85" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[100]" type="text" size="3" value="0" class="input input-order"></td>
    <td>100</td>
    <td>Admin/Menu/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 后台菜单</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=100&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=100&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=100&amp;menuid=100">删除</a> </td>
</tr><tr id="node-101" class="child-of-node-100" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[101]" type="text" size="3" value="0" class="input input-order"></td>
    <td>101</td>
    <td>Admin/Menu/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 添加菜单</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=101&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=101&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=101&amp;menuid=100">删除</a> </td>
</tr><tr id="node-102" class="child-of-node-101" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[102]" type="text" size="3" value="0" class="input input-order"></td>
    <td>102</td>
    <td>Admin/Menu/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=102&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=102&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=102&amp;menuid=100">删除</a> </td>
</tr><tr id="node-103" class="child-of-node-100" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[103]" type="text" size="3" value="0" class="input input-order"></td>
    <td>103</td>
    <td>Admin/Menu/listorders</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 后台菜单排序</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=103&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=103&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=103&amp;menuid=100">删除</a> </td>
</tr><tr id="node-104" class="child-of-node-100" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[104]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>104</td>
    <td>Admin/Menu/export_menu</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 菜单备份</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=104&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=104&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=104&amp;menuid=100">删除</a> </td>
</tr><tr id="node-105" class="child-of-node-100" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[105]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>105</td>
    <td>Admin/Menu/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑菜单</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=105&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=105&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=105&amp;menuid=100">删除</a> </td>
</tr><tr id="node-106" class="child-of-node-105" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[106]" type="text" size="3" value="0" class="input input-order"></td>
    <td>106</td>
    <td>Admin/Menu/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=106&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=106&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=106&amp;menuid=100">删除</a> </td>
</tr><tr id="node-107" class="child-of-node-100" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[107]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>107</td>
    <td>Admin/Menu/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除菜单</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=107&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=107&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=107&amp;menuid=100">删除</a> </td>
</tr><tr id="node-108" class="child-of-node-100" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[108]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>108</td>
    <td>Admin/Menu/lists</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 所有菜单</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=108&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=108&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=108&amp;menuid=100">删除</a> </td>
</tr><tr id="node-1" class="initialized parent collapsed">
    <td style="padding-left:20px;"><span style="padding-left: 20px" class="expander"></span><input name="listorders[1]" type="text" size="3" value="30" class="input input-order"></td>
    <td>1</td>
    <td>Admin/Content/default</td>
    <td>内容管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=1&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=1&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=1&amp;menuid=100">删除</a> </td>
</tr><tr id="node-2" class="child-of-node-1" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[2]" type="text" size="3" value="0" class="input input-order"></td>
    <td>2</td>
    <td>Api/Guestbookadmin/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 所有留言</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=2&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=2&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=2&amp;menuid=100">删除</a> </td>
</tr><tr id="node-3" class="child-of-node-2" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[3]" type="text" size="3" value="0" class="input input-order"></td>
    <td>3</td>
    <td>Api/Guestbookadmin/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 删除网站留言</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=3&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=3&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=3&amp;menuid=100">删除</a> </td>
</tr><tr id="node-4" class="child-of-node-1" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[4]" type="text" size="3" value="0" class="input input-order"></td>
    <td>4</td>
    <td>Comment/Commentadmin/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 评论管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=4&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=4&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=4&amp;menuid=100">删除</a> </td>
</tr><tr id="node-5" class="child-of-node-4" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[5]" type="text" size="3" value="0" class="input input-order"></td>
    <td>5</td>
    <td>Comment/Commentadmin/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除评论</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=5&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=5&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=5&amp;menuid=100">删除</a> </td>
</tr><tr id="node-6" class="child-of-node-4" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[6]" type="text" size="3" value="0" class="input input-order"></td>
    <td>6</td>
    <td>Comment/Commentadmin/check</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 评论审核</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=6&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=6&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=6&amp;menuid=100">删除</a> </td>
</tr><tr id="node-7" class="child-of-node-1" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[7]" type="text" size="3" value="1" class="input input-order"></td>
    <td>7</td>
    <td>Portal/AdminPost/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文章管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=7&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=7&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=7&amp;menuid=100">删除</a> </td>
</tr><tr id="node-8" class="child-of-node-7" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[8]" type="text" size="3" value="0" class="input input-order"></td>
    <td>8</td>
    <td>Portal/AdminPost/listorders</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文章排序</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=8&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=8&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=8&amp;menuid=100">删除</a> </td>
</tr><tr id="node-9" class="child-of-node-7" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[9]" type="text" size="3" value="0" class="input input-order"></td>
    <td>9</td>
    <td>Portal/AdminPost/top</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文章置顶</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=9&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=9&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=9&amp;menuid=100">删除</a> </td>
</tr><tr id="node-10" class="child-of-node-7" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[10]" type="text" size="3" value="0" class="input input-order"></td>
    <td>10</td>
    <td>Portal/AdminPost/recommend</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文章推荐</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=10&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=10&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=10&amp;menuid=100">删除</a> </td>
</tr><tr id="node-11" class="child-of-node-7" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[11]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>11</td>
    <td>Portal/AdminPost/move</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 批量移动</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=11&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=11&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=11&amp;menuid=100">删除</a> </td>
</tr><tr id="node-12" class="child-of-node-7" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[12]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>12</td>
    <td>Portal/AdminPost/check</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文章审核</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=12&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=12&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=12&amp;menuid=100">删除</a> </td>
</tr><tr id="node-13" class="child-of-node-7" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[13]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>13</td>
    <td>Portal/AdminPost/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除文章</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=13&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=13&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=13&amp;menuid=100">删除</a> </td>
</tr><tr id="node-14" class="child-of-node-7" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[14]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>14</td>
    <td>Portal/AdminPost/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑文章</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=14&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=14&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=14&amp;menuid=100">删除</a> </td>
</tr><tr id="node-15" class="child-of-node-14" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[15]" type="text" size="3" value="0" class="input input-order"></td>
    <td>15</td>
    <td>Portal/AdminPost/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=15&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=15&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=15&amp;menuid=100">删除</a> </td>
</tr><tr id="node-16" class="child-of-node-7" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[16]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>16</td>
    <td>Portal/AdminPost/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加文章</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=16&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=16&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=16&amp;menuid=100">删除</a> </td>
</tr><tr id="node-17" class="child-of-node-16" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[17]" type="text" size="3" value="0" class="input input-order"></td>
    <td>17</td>
    <td>Portal/AdminPost/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=17&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=17&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=17&amp;menuid=100">删除</a> </td>
</tr><tr id="node-18" class="child-of-node-1" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[18]" type="text" size="3" value="2" class="input input-order"></td>
    <td>18</td>
    <td>Portal/AdminTerm/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 分类管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=18&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=18&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=18&amp;menuid=100">删除</a> </td>
</tr><tr id="node-19" class="child-of-node-18" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[19]" type="text" size="3" value="0" class="input input-order"></td>
    <td>19</td>
    <td>Portal/AdminTerm/listorders</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文章分类排序</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=19&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=19&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=19&amp;menuid=100">删除</a> </td>
</tr><tr id="node-20" class="child-of-node-18" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[20]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>20</td>
    <td>Portal/AdminTerm/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=20&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=20&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=20&amp;menuid=100">删除</a> </td>
</tr><tr id="node-21" class="child-of-node-18" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[21]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>21</td>
    <td>Portal/AdminTerm/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=21&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=21&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=21&amp;menuid=100">删除</a> </td>
</tr><tr id="node-22" class="child-of-node-21" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[22]" type="text" size="3" value="0" class="input input-order"></td>
    <td>22</td>
    <td>Portal/AdminTerm/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=22&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=22&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=22&amp;menuid=100">删除</a> </td>
</tr><tr id="node-23" class="child-of-node-18" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[23]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>23</td>
    <td>Portal/AdminTerm/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=23&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=23&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=23&amp;menuid=100">删除</a> </td>
</tr><tr id="node-24" class="child-of-node-23" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[24]" type="text" size="3" value="0" class="input input-order"></td>
    <td>24</td>
    <td>Portal/AdminTerm/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=24&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=24&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=24&amp;menuid=100">删除</a> </td>
</tr><tr id="node-25" class="child-of-node-1" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[25]" type="text" size="3" value="3" class="input input-order"></td>
    <td>25</td>
    <td>Portal/AdminPage/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 页面管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=25&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=25&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=25&amp;menuid=100">删除</a> </td>
</tr><tr id="node-26" class="child-of-node-25" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[26]" type="text" size="3" value="0" class="input input-order"></td>
    <td>26</td>
    <td>Portal/AdminPage/listorders</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 页面排序</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=26&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=26&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=26&amp;menuid=100">删除</a> </td>
</tr><tr id="node-27" class="child-of-node-25" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[27]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>27</td>
    <td>Portal/AdminPage/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除页面</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=27&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=27&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=27&amp;menuid=100">删除</a> </td>
</tr><tr id="node-28" class="child-of-node-25" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[28]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>28</td>
    <td>Portal/AdminPage/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑页面</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=28&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=28&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=28&amp;menuid=100">删除</a> </td>
</tr><tr id="node-29" class="child-of-node-28" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[29]" type="text" size="3" value="0" class="input input-order"></td>
    <td>29</td>
    <td>Portal/AdminPage/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=29&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=29&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=29&amp;menuid=100">删除</a> </td>
</tr><tr id="node-30" class="child-of-node-25" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[30]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>30</td>
    <td>Portal/AdminPage/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加页面</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=30&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=30&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=30&amp;menuid=100">删除</a> </td>
</tr><tr id="node-31" class="child-of-node-30" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[31]" type="text" size="3" value="0" class="input input-order"></td>
    <td>31</td>
    <td>Portal/AdminPage/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=31&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=31&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=31&amp;menuid=100">删除</a> </td>
</tr><tr id="node-32" class="child-of-node-1" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[32]" type="text" size="3" value="4" class="input input-order"></td>
    <td>32</td>
    <td>Admin/Recycle/default</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 回收站</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=32&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=32&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=32&amp;menuid=100">删除</a> </td>
</tr><tr id="node-33" class="child-of-node-32" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[33]" type="text" size="3" value="0" class="input input-order"></td>
    <td>33</td>
    <td>Portal/AdminPost/recyclebin</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文章回收</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=33&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=33&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=33&amp;menuid=100">删除</a> </td>
</tr><tr id="node-34" class="child-of-node-33" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[34]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>34</td>
    <td>Portal/AdminPost/restore</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文章还原</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=34&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=34&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=34&amp;menuid=100">删除</a> </td>
</tr><tr id="node-35" class="child-of-node-33" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[35]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>35</td>
    <td>Portal/AdminPost/clean</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 彻底删除</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=35&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=35&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=35&amp;menuid=100">删除</a> </td>
</tr><tr id="node-36" class="child-of-node-32" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[36]" type="text" size="3" value="1" class="input input-order"></td>
    <td>36</td>
    <td>Portal/AdminPage/recyclebin</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 页面回收</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=36&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=36&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=36&amp;menuid=100">删除</a> </td>
</tr><tr id="node-37" class="child-of-node-36" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[37]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>37</td>
    <td>Portal/AdminPage/clean</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 彻底删除</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=37&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=37&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=37&amp;menuid=100">删除</a> </td>
</tr><tr id="node-38" class="child-of-node-36" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[38]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>38</td>
    <td>Portal/AdminPage/restore</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 页面还原</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=38&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=38&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=38&amp;menuid=100">删除</a> </td>
</tr><tr id="node-39" class="initialized parent collapsed">
    <td style="padding-left:20px;"><span style="padding-left: 20px" class="expander"></span><input name="listorders[39]" type="text" size="3" value="40" class="input input-order"></td>
    <td>39</td>
    <td>Admin/Extension/default</td>
    <td>扩展工具</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=39&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=39&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=39&amp;menuid=100">删除</a> </td>
</tr><tr id="node-40" class="child-of-node-39" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[40]" type="text" size="3" value="0" class="input input-order"></td>
    <td>40</td>
    <td>Admin/Backup/default</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 备份管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=40&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=40&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=40&amp;menuid=100">删除</a> </td>
</tr><tr id="node-41" class="child-of-node-40" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[41]" type="text" size="3" value="0" class="input input-order"></td>
    <td>41</td>
    <td>Admin/Backup/restore</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 数据还原</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=41&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=41&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=41&amp;menuid=100">删除</a> </td>
</tr><tr id="node-42" class="child-of-node-40" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[42]" type="text" size="3" value="0" class="input input-order"></td>
    <td>42</td>
    <td>Admin/Backup/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 数据备份</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=42&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=42&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=42&amp;menuid=100">删除</a> </td>
</tr><tr id="node-43" class="child-of-node-42" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[43]" type="text" size="3" value="0" class="input input-order"></td>
    <td>43</td>
    <td>Admin/Backup/index_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交数据备份</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=43&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=43&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=43&amp;menuid=100">删除</a> </td>
</tr><tr id="node-44" class="child-of-node-40" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[44]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>44</td>
    <td>Admin/Backup/download</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 下载备份</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=44&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=44&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=44&amp;menuid=100">删除</a> </td>
</tr><tr id="node-45" class="child-of-node-40" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[45]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>45</td>
    <td>Admin/Backup/del_backup</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除备份</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=45&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=45&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=45&amp;menuid=100">删除</a> </td>
</tr><tr id="node-46" class="child-of-node-40" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[46]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>46</td>
    <td>Admin/Backup/import</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 数据备份导入</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=46&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=46&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=46&amp;menuid=100">删除</a> </td>
</tr><tr id="node-47" class="child-of-node-39" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[47]" type="text" size="3" value="0" class="input input-order"></td>
    <td>47</td>
    <td>Admin/Plugin/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 插件管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=47&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=47&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=47&amp;menuid=100">删除</a> </td>
</tr><tr id="node-48" class="child-of-node-47" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[48]" type="text" size="3" value="0" class="input input-order"></td>
    <td>48</td>
    <td>Admin/Plugin/toggle</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 插件启用切换</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=48&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=48&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=48&amp;menuid=100">删除</a> </td>
</tr><tr id="node-49" class="child-of-node-47" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[49]" type="text" size="3" value="0" class="input input-order"></td>
    <td>49</td>
    <td>Admin/Plugin/setting</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 插件设置</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=49&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=49&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=49&amp;menuid=100">删除</a> </td>
</tr><tr id="node-50" class="child-of-node-49" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[50]" type="text" size="3" value="0" class="input input-order"></td>
    <td>50</td>
    <td>Admin/Plugin/setting_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 插件设置提交</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=50&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=50&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=50&amp;menuid=100">删除</a> </td>
</tr><tr id="node-51" class="child-of-node-47" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[51]" type="text" size="3" value="0" class="input input-order"></td>
    <td>51</td>
    <td>Admin/Plugin/install</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 插件安装</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=51&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=51&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=51&amp;menuid=100">删除</a> </td>
</tr><tr id="node-52" class="child-of-node-47" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[52]" type="text" size="3" value="0" class="input input-order"></td>
    <td>52</td>
    <td>Admin/Plugin/uninstall</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 插件卸载</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=52&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=52&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=52&amp;menuid=100">删除</a> </td>
</tr><tr id="node-155" class="child-of-node-47" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[155]" type="text" size="3" value="0" class="input input-order"></td>
    <td>155</td>
    <td>Admin/Plugin/update</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 插件更新</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=155&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=155&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=155&amp;menuid=100">删除</a> </td>
</tr><tr id="node-156" class="child-of-node-39" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[156]" type="text" size="3" value="0" class="input input-order"></td>
    <td>156</td>
    <td>Admin/Storage/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 文件存储</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=156&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=156&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=156&amp;menuid=100">删除</a> </td>
</tr><tr id="node-157" class="child-of-node-156" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[157]" type="text" size="3" value="0" class="input input-order"></td>
    <td>157</td>
    <td>Admin/Storage/setting_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 文件存储设置提交</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=157&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=157&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=157&amp;menuid=100">删除</a> </td>
</tr><tr id="node-53" class="child-of-node-39" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[53]" type="text" size="3" value="1" class="input input-order"></td>
    <td>53</td>
    <td>Admin/Slide/default</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 幻灯片</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=53&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=53&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=53&amp;menuid=100">删除</a> </td>
</tr><tr id="node-54" class="child-of-node-53" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[54]" type="text" size="3" value="0" class="input input-order"></td>
    <td>54</td>
    <td>Admin/Slide/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 幻灯片管理</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=54&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=54&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=54&amp;menuid=100">删除</a> </td>
</tr><tr id="node-55" class="child-of-node-54" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[55]" type="text" size="3" value="0" class="input input-order"></td>
    <td>55</td>
    <td>Admin/Slide/listorders</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 幻灯片排序</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=55&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=55&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=55&amp;menuid=100">删除</a> </td>
</tr><tr id="node-56" class="child-of-node-54" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[56]" type="text" size="3" value="0" class="input input-order"></td>
    <td>56</td>
    <td>Admin/Slide/toggle</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 幻灯片显示切换</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=56&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=56&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=56&amp;menuid=100">删除</a> </td>
</tr><tr id="node-158" class="child-of-node-54" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[158]" type="text" size="3" value="0" class="input input-order"></td>
    <td>158</td>
    <td>Admin/Slide/ban</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 禁用幻灯片</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=158&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=158&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=158&amp;menuid=100">删除</a> </td>
</tr><tr id="node-159" class="child-of-node-54" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[159]" type="text" size="3" value="0" class="input input-order"></td>
    <td>159</td>
    <td>Admin/Slide/cancelban</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 启用幻灯片</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=159&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=159&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=159&amp;menuid=100">删除</a> </td>
</tr><tr id="node-57" class="child-of-node-54" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[57]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>57</td>
    <td>Admin/Slide/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除幻灯片</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=57&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=57&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=57&amp;menuid=100">删除</a> </td>
</tr><tr id="node-58" class="child-of-node-54" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[58]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>58</td>
    <td>Admin/Slide/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑幻灯片</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=58&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=58&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=58&amp;menuid=100">删除</a> </td>
</tr><tr id="node-59" class="child-of-node-58" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[59]" type="text" size="3" value="0" class="input input-order"></td>
    <td>59</td>
    <td>Admin/Slide/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=59&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=59&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=59&amp;menuid=100">删除</a> </td>
</tr><tr id="node-60" class="child-of-node-54" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[60]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>60</td>
    <td>Admin/Slide/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加幻灯片</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=60&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=60&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=60&amp;menuid=100">删除</a> </td>
</tr><tr id="node-61" class="child-of-node-60" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[61]" type="text" size="3" value="0" class="input input-order"></td>
    <td>61</td>
    <td>Admin/Slide/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=61&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=61&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=61&amp;menuid=100">删除</a> </td>
</tr><tr id="node-62" class="child-of-node-53" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[62]" type="text" size="3" value="0" class="input input-order"></td>
    <td>62</td>
    <td>Admin/Slidecat/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 幻灯片分类</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=62&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=62&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=62&amp;menuid=100">删除</a> </td>
</tr><tr id="node-63" class="child-of-node-62" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[63]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>63</td>
    <td>Admin/Slidecat/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=63&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=63&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=63&amp;menuid=100">删除</a> </td>
</tr><tr id="node-64" class="child-of-node-62" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[64]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>64</td>
    <td>Admin/Slidecat/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=64&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=64&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=64&amp;menuid=100">删除</a> </td>
</tr><tr id="node-65" class="child-of-node-64" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[65]" type="text" size="3" value="0" class="input input-order"></td>
    <td>65</td>
    <td>Admin/Slidecat/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=65&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=65&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=65&amp;menuid=100">删除</a> </td>
</tr><tr id="node-66" class="child-of-node-62" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[66]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>66</td>
    <td>Admin/Slidecat/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加分类</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=66&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=66&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=66&amp;menuid=100">删除</a> </td>
</tr><tr id="node-67" class="child-of-node-66" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[67]" type="text" size="3" value="0" class="input input-order"></td>
    <td>67</td>
    <td>Admin/Slidecat/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=67&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=67&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=67&amp;menuid=100">删除</a> </td>
</tr><tr id="node-68" class="child-of-node-39" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[68]" type="text" size="3" value="2" class="input input-order"></td>
    <td>68</td>
    <td>Admin/Ad/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 网站广告</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=68&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=68&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=68&amp;menuid=100">删除</a> </td>
</tr><tr id="node-69" class="child-of-node-68" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[69]" type="text" size="3" value="0" class="input input-order"></td>
    <td>69</td>
    <td>Admin/Ad/toggle</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 广告显示切换</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=69&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=69&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=69&amp;menuid=100">删除</a> </td>
</tr><tr id="node-70" class="child-of-node-68" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[70]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>70</td>
    <td>Admin/Ad/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除广告</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=70&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=70&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=70&amp;menuid=100">删除</a> </td>
</tr><tr id="node-71" class="child-of-node-68" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[71]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>71</td>
    <td>Admin/Ad/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑广告</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=71&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=71&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=71&amp;menuid=100">删除</a> </td>
</tr><tr id="node-72" class="child-of-node-71" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[72]" type="text" size="3" value="0" class="input input-order"></td>
    <td>72</td>
    <td>Admin/Ad/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=72&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=72&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=72&amp;menuid=100">删除</a> </td>
</tr><tr id="node-73" class="child-of-node-68" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[73]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>73</td>
    <td>Admin/Ad/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加广告</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=73&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=73&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=73&amp;menuid=100">删除</a> </td>
</tr><tr id="node-74" class="child-of-node-73" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[74]" type="text" size="3" value="0" class="input input-order"></td>
    <td>74</td>
    <td>Admin/Ad/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=74&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=74&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=74&amp;menuid=100">删除</a> </td>
</tr><tr id="node-75" class="child-of-node-39" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[75]" type="text" size="3" value="3" class="input input-order"></td>
    <td>75</td>
    <td>Admin/Link/index</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 友情链接</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=75&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=75&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=75&amp;menuid=100">删除</a> </td>
</tr><tr id="node-76" class="child-of-node-75" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[76]" type="text" size="3" value="0" class="input input-order"></td>
    <td>76</td>
    <td>Admin/Link/listorders</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 友情链接排序</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=76&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=76&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=76&amp;menuid=100">删除</a> </td>
</tr><tr id="node-77" class="child-of-node-75" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[77]" type="text" size="3" value="0" class="input input-order"></td>
    <td>77</td>
    <td>Admin/Link/toggle</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 友链显示切换</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=77&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=77&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=77&amp;menuid=100">删除</a> </td>
</tr><tr id="node-78" class="child-of-node-75" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[78]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>78</td>
    <td>Admin/Link/delete</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 删除友情链接</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=78&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=78&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=78&amp;menuid=100">删除</a> </td>
</tr><tr id="node-79" class="child-of-node-75" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[79]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>79</td>
    <td>Admin/Link/edit</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ 编辑友情链接</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=79&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=79&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=79&amp;menuid=100">删除</a> </td>
</tr><tr id="node-80" class="child-of-node-79" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[80]" type="text" size="3" value="0" class="input input-order"></td>
    <td>80</td>
    <td>Admin/Link/edit_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交编辑</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=80&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=80&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=80&amp;menuid=100">删除</a> </td>
</tr><tr id="node-81" class="child-of-node-75" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[81]" type="text" size="3" value="1000" class="input input-order"></td>
    <td>81</td>
    <td>Admin/Link/add</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 添加友情链接</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=81&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=81&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=81&amp;menuid=100">删除</a> </td>
</tr><tr id="node-82" class="child-of-node-81" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[82]" type="text" size="3" value="0" class="input input-order"></td>
    <td>82</td>
    <td>Admin/Link/add_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交添加</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=82&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=82&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=82&amp;menuid=100">删除</a> </td>
</tr><tr id="node-83" class="child-of-node-39" style="display: none;">
    <td style="padding-left: 40px;"><input name="listorders[83]" type="text" size="3" value="4" class="input input-order"></td>
    <td>83</td>
    <td>Api/Oauthadmin/setting</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 第三方登陆</td>
    <td>显示</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=83&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=83&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=83&amp;menuid=100">删除</a> </td>
</tr><tr id="node-84" class="child-of-node-83" style="display: none;">
    <td style="padding-left:20px;"><input name="listorders[84]" type="text" size="3" value="0" class="input input-order"></td>
    <td>84</td>
    <td>Api/Oauthadmin/setting_post</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ 提交设置</td>
    <td>隐藏</td>
    <td><a href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=add&amp;parentid=84&amp;menuid=100">添加子菜单</a> | <a target="_blank" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=edit&amp;id=84&amp;menuid=100">修改</a> | <a class="J_ajax_del" href="/matt/index.php?g=Admin&amp;m=Menu&amp;a=delete&amp;id=84&amp;menuid=100">删除</a> </td>
</tr>				</tbody>
<tfoot>
<tr>
    <th width="80">排序</th>
    <th width="50">ID</th>
    <th>应用</th>
    <th>菜单名称</th>
    <th width="80">状态</th>
    <th width="150">管理操作</th>
</tr>
</tfoot>
</table>
<div class="table-actions">
    <button class="btn btn_submit btn-primary btn-small J_ajax_submit_btn" type="submit">排序</button>
</div>
</form>
</div>
<script src="/matt/statics/js/common.js"></script>
<script>
    $(document).ready(function() {
        Wind.css('treeTable');
        Wind.use('treeTable', function() {
            $("#menus-table").treeTable({
                indent : 20
            });
        });
    });

    setInterval(function() {
        var refersh_time = getCookie('refersh_time_admin_menu_index');
        if (refersh_time == 1) {
            reloadPage(window);
        }
    }, 1000);
    setCookie('refersh_time_admin_menu_index', 0);
</script>

<div id="think_page_trace" style="position: fixed;bottom:0;right:0;font-size:14px;width:100%;z-index: 999999;color: #000;text-align:left;font-family:'微软雅黑';">
    <div id="think_page_trace_tab" style="display: none;background:white;margin:0;height: 250px;">
        <div id="think_page_trace_tab_tit" style="height:30px;padding: 6px 12px 0;border-bottom:1px solid #ececec;border-top:1px solid #ececec;font-size:16px">
            <span style="color: rgb(0, 0, 0); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">基本</span>
            <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">文件</span>
            <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">流程</span>
            <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">错误</span>
            <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">SQL</span>
            <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">调试</span>
        </div>
        <div id="think_page_trace_tab_cont" style="overflow:auto;height:212px;padding: 0; line-height: 24px">
            <div style="display: block;">
                <ol style="padding: 0; margin:0">
                    <li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2015-07-10 11:11:24 HTTP/1.1 GET : /matt/index.php?g=Admin&amp;m=Menu&amp;a=index&amp;menuid=100</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.5370s ( Load:0.0570s Init:0.0380s Exec:0.3130s Template:0.1290s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 1.86req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 2,947.34 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 5 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 57</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 1 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 151</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=9s2o0732216vimpsm29ltfrc21</li>    </ol>
            </div>
            <div style="display: none;">
                <ol style="padding: 0; margin:0">
                    <li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\index.php ( 1.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\api\uc_client\config.inc.php ( 0.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\ThinkPHP.php ( 4.71 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Think.class.php ( 12.32 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Storage.class.php ( 1.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Storage\Driver\File.class.php ( 3.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Mode\common.php ( 2.82 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Common\functions.php ( 52.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Common\function.php ( 42.86 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Hook.class.php ( 4.22 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\App.class.php ( 13.46 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Dispatcher.class.php ( 15.08 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Route.class.php ( 13.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Controller.class.php ( 10.95 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\View.class.php ( 7.96 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Behavior\BuildLiteBehavior.class.php ( 3.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Behavior\ParseTemplateBehavior.class.php ( 3.89 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Behavior\ContentReplaceBehavior.class.php ( 1.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Conf\convention.php ( 11.25 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Conf\config.php ( 4.32 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\data\conf\db.php ( 0.33 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Conf\alias.php ( 1.28 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Conf\tags.php ( 0.25 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Lang\zh-cn.php ( 2.57 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Conf\debug.php ( 1.51 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Conf\debug.php ( 0.25 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Behavior\InitHookBehavior.class.php ( 1.39 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Behavior.class.php ( 0.88 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Cache.class.php ( 3.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Cache\Driver\File.class.php ( 5.90 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Common\extend.php ( 29.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Admin\Conf\config.php ( 0.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Admin\Common\function.php ( 0.99 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Behavior\ReadHtmlCacheBehavior.class.php ( 5.75 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Behavior\CheckLangBehavior.class.php ( 2.96 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Lang\zh-cn.php ( 0.45 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Admin\Lang\zh-cn.php ( 0.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Admin\Controller\MenuController.class.php ( 14.13 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Controller\AdminbaseController.class.php ( 5.85 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Controller\AppframeController.class.php ( 5.29 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Model.class.php ( 66.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Db.class.php ( 5.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Db\Driver\Mysql.class.php ( 6.96 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Db\Driver.class.php ( 41.26 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Model\MenuModel.class.php ( 7.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Model\CommonModel.class.php ( 1.68 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Log.class.php ( 3.87 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Lib\Util\Tree.class.php ( 13.28 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Template.class.php ( 30.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Template\TagLib\Cx.class.php ( 22.62 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Think\Template\TagLib.class.php ( 9.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Lib\Taglib\TagLibSpadmin.class.php ( 1.98 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Lib\Taglib\TagLibHome.class.php ( 2.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\data\runtime\Cache\Admin\238744e0bc073502f8eee8d7f1ccb911.php ( 3.85 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Behavior\WriteHtmlCacheBehavior.class.php ( 1.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\application\Common\Behavior\TmplStripSpaceBehavior.class.php ( 1.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\upupw\htdocs\matt\simplewind\Core\Library\Behavior\ShowPageTraceBehavior.class.php ( 5.27 KB )</li>    </ol>
            </div>
            <div style="display: none;">
                <ol style="padding: 0; margin:0">
                    <li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\BuildLiteBehavior [ RunTime:0.000000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Common\Behavior\InitHookBehavior [ RunTime:0.011000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.013000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ReadHtmlCacheBehavior [ RunTime:0.003000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\CheckLangBehavior [ RunTime:0.008001s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.012001s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ContentReplaceBehavior [ RunTime:0.000000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.001000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ParseTemplateBehavior [ RunTime:0.042002s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.042002s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\WriteHtmlCacheBehavior [ RunTime:0.004000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Common\Behavior\TmplStripSpaceBehavior [ RunTime:0.005001s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.009001s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
            </div>
            <div style="display: none;">
                <ol style="padding: 0; margin:0">
                </ol>
            </div>
            <div style="display: none;">
                <ol style="padding: 0; margin:0">
                    <li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mt_users` [ RunTime:0.0030s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mt_users` WHERE ( id=1 ) LIMIT 1   [ RunTime:0.0000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mt_menu` [ RunTime:0.0050s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mt_auth_rule` [ RunTime:0.0030s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mt_menu` ORDER BY `listorder` ASC  [ RunTime:0.0020s ]</li>    </ol>
            </div>
            <div style="display: none;">
                <ol style="padding: 0; margin:0">
                </ol>
            </div>
        </div>
    </div>
    <div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw=="></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.5370s </div><img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/9+69+8xuNtkHJAFCSIAkhMgjCCJQUi0GtEIVbP8Qq9LH2No6TmfaztjO2OnUdvqHFMfOVFTqIK0vUEEeqUBARCsEeYQkEPJoEvIiELLvvc9z+p27u2F3s5tsBB1OZiebu5dzf7/v/L7f952zMM8cWIwY+Mk2ulCp92Fnq3XvnzArr2NZnYNldDp0Gw+/OEQ4+obQn5D+4Ubb22+YOGsWi/Todh8AHglKEGkEsnHBQ162511GZFgW6ZCBM9/W4H3iNSQqIe09O196dLKX7d1O39OViP/wthtkND62if/wj/DbMpph8BY/m9xy8BoBmQk+mHqZQGNy4JYRwCoRbwa8l4JXw6M+orJxpU0U6ToKy/5bQsAiTeokGKkTx46RRxxEUgrwGgF4MWNNEJCGgYTvpgnY1IJWg5RzfqLgvcIgktX0i8dmMlFA8qCQ5L0Z/WObPLUxT1i4lWSYDISoEfBYGvM+LlMQQdkLHoWRRZ8zYQI62Thswe5WTORGwNXDcGjqeOA9AF7B8rhzsxMBEoJ8oJKaqPu4hblHMCMPwl9XeNWyb8xkB/DDGYKfMAE6aFL7xesZ389JlgG3XHEMI6UPDOP6JHHu67T2pwNPI69mCP4rEaBDUAJaKc/AOuXiwH07VCS3w5+UQMAuF/WqGI+yFIwVNBwemBD4r0wgQiKoFZa00sEYTwss32lA1tPwVxtc8jQ5/gWCwmGCyUD8vRT0sHBFW4GJDvZmrJFWRY1EkrGA6ZB8/10fOZSSj0E6F+BSP7xidiIzhBmKB09lEwHPkG+UQIyEN44EBiT5vrv2uJXyPQqSqO930fxvcvwbR/+JAkD9EfASgI9EHlp6YiHO4W+cAB20SnrFqxBbNljiXf1Pl1K2S0HCWfiog3YlAD5RGwwxK6oUjTweuVigLjyB0mX410mAFnMoVK1lvvUvgt8fUJH0JVyjuvcmg4dE5mUiFtD24AZ4qBVELxXKS+pMxN43kSdzNwudJ+bQbLlmnxvPOQoCugSap1GnSRoG8KOiKbH+rIA0lEeSAg3y6eeQ6XI2nrYnrPM89bUTgI0Pdqvl50vlNbtZxDUBcLBK0kPd5jPziyLdojJIN0pq5/mdzwL4UVvVInV5ncQEPNOUxa9d0TU+CW5l+FoI0GSDKHVVSOs+0KOsZoxwOzSZNFGv0mQ9avyLCh2Hpm+70Y0YJoJVgmQv822wnDC8Miq6VjJ5IFed0QD1YiAbT+nQE8v/RMZfmgmcCRHIIu7Bmcp39oM9fqEychcA747KxQ/AEyqQonl7hATtJmnhO2XYtgcia01aSbVMenAXrIomPcLgEBA4liGBzFZAT8zBYqW6brI67wg8sFVhxBhwLwBP2+tqBQqqK7VJKGh/BRrfTr6nWL7nYBaZdBJHqrX3kPEPap56xwE/GvjJTRMADeMCdcGpGXL1Xh4ZL8BDOlWkUpegfi0CeDzeA5YITzEnddv+IXL+UYCmqIvqC9UlUC/ki9FipwVjunL3yX7dOTLeXmVMAhbsGporPfyOBTm/BJ23gTVehsvXRnSewagUfpBXF3p5pygKS7OceqTjb7h2vjr/XKm0ZofKSI2Q/J102wHzatZkJPYQ5JoKsuK+EoHJakVzubzuLQDepCKllTZi9AG0DYg9ZLxhFaZsOu7bvlmVI5oPXJMQJcHxHClSln1apFTvAimeg48u0RWFeZW4lVcjbQWZuIQK1KozZfIDO6CSQmQQXdpBaiKZyEWThVK1uEc6v7V7uK0ysduExPZx4vysDR+4SelhBYm0R6LBuR4PXts8MYMcJPsINo4YZCDLj0sgB0/vLpPXvA2Tn42Cv5rsLulGubzW0sEd3d4W/mJt2Kck+DzDMijfPLOjyrDhXSh852B+OvflqAkoyXO1cYfujtc/i3jJSAwhgfFlp20laMLOku/bC7prgqW7lCn4auE5NhcXPd3M7x70+IceSgZvNljCd9k3fLjYsPElqLR14PXQZqD2ZNkkrAB79UeJUebFQmXpf8ZcAQt2XrMQdyNUVBqZoUzAFyp3V3xi/MubUA/mCT4Fhf038PC8XplhWnCmnK/ZzyC2BSTRSqKVOuY2kB8Jia0lvvRIVoP+vVWJbYarf6p655E2/nANBMCWkgD49DA0VAMyI1OLFMYCXiU9bmzi9/y5i/vsaTpHPHidTofzLbM65vMPva9HlovgXp0AvjtaqYMfDD0/4mAsYE92pxa+9k1QgCnRVObCpojpzsKTPvayPetTEgBdwnssjuc0kOBFX+q3HwRQxdrOLAqeYRjkMk/trTSu2Z9Lik7CfF0AvjtqAhS4NHobGXUnB5DQs8hG8p/wMX1r4+8xkmyvQ50JVq72TVeXbz3HvpWaQJi57hJYTw4kGbtS+C2TigQUtZUX+X27QQq2ePBZBru/0lxTm8fOOQ5yaZOZMAV+he4FqIMB+LQB0UgMSajANX29j+vbmly8ipRvHeSQoQOkM5iFXcPQCVwDMs5RBCQmaPOyvbNd6uwvQJ183BZQG3Zc+Eiv7vQOKu8YeDmMcJlt2ckyftVeMIGLBCmdMHl/tFILYwGPjXWO3zOfSq/+om+oa7Mlh2fpSsRGLp7RAW3FUVjNHgiMhyE6zBFjM2BdkdJGO7nP1kJXWAtBuBpPIAu7f+hhu7bFXIuC5xWrf0X2xreykOsUyKkF2gwadbrXDcXrfKxR43zGcSj4t/cCgr+a1iy6EjE5GYktUCl9fwfMeylyooGF48bN2IGLTw8x7StS7sj8TF9FmPGWQhm3rRR+o9lhvjJvSYAdfDUevI1M6bnX/OwWaDMOQ8RPgKRo0eulBTdT8AW2kl8e9L7UHghHwMfLiZPNoSpx0yugpQZaFqKWqxVSM3a2pN1SAhC2jf94I7ybBI7EL5A2Wvu5ht3xsoEt4+Ay/abXgCQAxyOeDsDlTCQzy75ohcGgv9Tra9uiymRUYTLrswOLlCdfAQf7HPDQQ4ErAH5EDXB9cMxWYpjtXApRncojS0sbV/cCgHTHwGNBJy+1PQE2x56FpaVR7wfQGZ37V+V+19EiHNvR6q1fRUjqvbjbMq1/qfHxbTrE10ePY2gPFk48D2CVMTf1AF4PXvyYR9dV6Wf7H413m3xTWQvYGhQ7mfYwA5mAX+18Vue05v/8jG/fZX/IW5MKPKtjSYlt0ellxh+/BOCPAwYaeVr0QofZFxJWVWC8znG70au6llVmktsF0bfHF6k8fvZ5esZJbwHwwnjg59tXz6sL/P0NUZDuSNu1mnJ8Vab17+cy005A9wtOpp3i0bZdpJLUil00semAwN45LgEViZYe3amNye0B6A9chviSlzXVsFtyN5/1H3gaNmMpn8Fz0GpYFp6Zw615H/LpUuRQQDMCL82n5DpBSawkvzIdN2ypiT8nSLth8Pk9jnjwdFzH3W4XW6KMBfwB569NdcGX93mC16tTflcArcYUc/mFuYbV+8zY0SAjAVoNErNgWjtwumJ3wbn/HlBFYdxHvSkJJEc+Ngal9opSwyo9YlITX2C/P/+gf8sxURSLR+mcZUmeqaS9wrh6vxW5zxFCOqFi90RbDWq/YwZmnu1+a6OvdpvRqkNxxe44lyl4OobEnpKA6Uox5EfH9xzPs/HRKrTPWdIQrK1VZDU7ETiD3Obpl+8wPPCRBbkbwNtpW9AbBe5L1SMlj3tdTxk/9W47JUmqS5HU+JzYymUKXjtWVmT9RenIhgXc+nroWLyxXJhmL112OdB8GCsk4f8oZJucnvmmtR85mBn10GZ0EKSCMUSAR3ukcXd5s7LvLD3me61WkuTCpJzYAyRurMB44EdEJzTfU271lUJC03YjXJXzYOGZwN4D8eB5jlfLrdWfzGRW7icMPfiSO6Oe7s20bmhdgLX4Z23B+s3JgQESzUDiMboSzDMHFpNMwccGePauhfwjzwnI2wu9zKGgEFg80jcZ7MHllk07s1H+5yojtUQTlH4nFdLKTGwDmPbIklOb1L1zO4T6N8NCuDLFLS/C63c0eNRimZ++s5BMBHxU11jHchI9oFVUxRh/eMDzHEzGYu0Lg8gJ7oS/tFCwoic44fyUtix0n/46vP4bf+//BRgAYwDDar4ncHIAAAAASUVORK5CYII="></div>
<script type="text/javascript">
    (function(){
        var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
        var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
        var open     = document.getElementById('think_page_trace_open');
        var close    = document.getElementById('think_page_trace_close').childNodes[0];
        var trace    = document.getElementById('think_page_trace_tab');
        var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
        var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
        open.onclick = function(){
            trace.style.display = 'block';
            this.style.display = 'none';
            close.parentNode.style.display = 'block';
            history[0] = 1;
            document.cookie = 'thinkphp_show_page_trace='+history.join('|')
        }
        close.onclick = function(){
            trace.style.display = 'none';
            this.parentNode.style.display = 'none';
            open.style.display = 'block';
            history[0] = 0;
            document.cookie = 'thinkphp_show_page_trace='+history.join('|')
        }
        for(var i = 0; i < tab_tit.length; i++){
            tab_tit[i].onclick = (function(i){
                return function(){
                    for(var j = 0; j < tab_cont.length; j++){
                        tab_cont[j].style.display = 'none';
                        tab_tit[j].style.color = '#999';
                    }
                    tab_cont[i].style.display = 'block';
                    tab_tit[i].style.color = '#000';
                    history[1] = i;
                    document.cookie = 'thinkphp_show_page_trace='+history.join('|')
                }
            })(i)
        }
        parseInt(history[0]) && open.click();
        (tab_tit[history[1]] || tab_tit[0]).click();
    })();
</script>
</body>