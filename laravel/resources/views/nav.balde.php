<?php
$array = array(
	array(
		'name'=>'用户中心',
		'icon'=>'cogs',
		'son'=>array(
			array('name'=>'会员管理','url'=>'http://www.baidu.com'),
			array('name'=>'登录日志','url'=>'http://www.baidu.com'),
		),
	),
	array(
		'name'=>'用户中心',
		'icon'=>'cogs',
		'son'=>array(
			array('name'=>'会员管理','url'=>'http://www.baidu.com'),
			array('name'=>'登录日志','url'=>'http://www.baidu.com'),
		),
	),
);
var_dump($array);
?>
<ul class="page-sidebar-menu">
      <li> 
        
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        
        <div class="sidebar-toggler hidden-phone"></div>
        
        <!-- BEGIN SIDEBAR TOGGLER BUTTON --> 
        
      </li>
      <li> 
        
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        
        <form class="sidebar-search">
          <div class="input-box"> <a href="javascript:;" class="remove"></a>
            <input type="text" placeholder="Search..." />
            <input type="button" class="submit" value=" " />
          </div>
        </form>
        
        <!-- END RESPONSIVE QUICK SEARCH FORM --> 
        
      </li>
      <li class="start active "> <a href="index.html"> <i class="icon-home"></i> <span class="title">Dashboard</span> <span class="selected"></span> </a> </li>
      @foreach ($array as $vo)
      <li class=""> <a href="javascript:;"> <i class="icon-<?=$vo['icon']?>"></i> <span class="title"><?=$vo['name']?></span> <span class="arrow "></span> </a>
      
        <ul class="sub-menu">
        @foreach ($vo['son'] as $v)
        <li > <a href="<?=$v['url']?>"><?=$v['name']?></a> </li>
        @endforeach
        </ul>
      </li>
      @endforeach
    
    </ul>