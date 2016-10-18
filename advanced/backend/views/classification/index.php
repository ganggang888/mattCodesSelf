<?php
use yii\helpers\Url;
?>
<body class="J_scroll_fixed">
	<div class="wrap jj">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;">分类管理</a></li>
			<li><a href="<?=Url::to(['classification/create']);?>">添加分类</a></li>
		</ul>
		<form method="post" class="J_ajaxForm" action="">
			
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="50">ID</th>
						<th>分类名称</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?=$taxonomys?>
				</tbody>
				<tfoot>
					<tr>
						<th width="50">ID</th>
						<th>分类名称</th>
						<th>操作</th>
					</tr>
				</tfoot>
			</table>
			
		</form>
	</div>
</body>