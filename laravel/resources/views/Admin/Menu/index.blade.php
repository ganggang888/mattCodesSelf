@include('Admin.header')
</head>
<body class="J_scroll_fixed">
	<div class="wrap J_check_wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="/Admin/Menu/index">后台菜单</a></li>
			<li><a href="/Admin/Menu/add/0">添加菜单</a></li>
			</if>
		</ul>
		<form class="J_ajaxForm" action="{:U('Menu/listorders')}" method="post">
			<div class="table-actions">
				<button class="btn btn_submit btn-primary btn-small J_ajax_submit_btn" type="submit">排序</button>
			</div>
			<table class="table table-hover table-bordered table-list" id="menus-table">
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
					<?=$array;?>
				</tbody>
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
	<script src="/statics/js/common.js"></script>
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
</body>
</html>