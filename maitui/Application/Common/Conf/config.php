<?php
return array(
	'DB_TYPE'   => 'mysql',             // 数据库类型
    'DB_HOST'   => '127.0.0.1',         // 服务器地址
    'DB_NAME'   => 'maitui',            // 数据库名
    'DB_USER'   => 'root',              // 用户名
    'DB_PWD'    => 'root',              // 密码
    'DB_PORT'   => '3306',              // 端口
    'DB_PREFIX' => 'zzp_',              // 数据库表前缀
	
	
    /* 路由配置 */
    'DEFAULT_MODULE'    => 'Home',       // 默认模块
    'URL_MODEL'         => '1',          // URL模式2
    'URL_ROUTER_ON'     => true,         //开启路由
    'MODULE_ALLOW_LIST' => array('Home','Zhou'),
    
    
    /* 调试配置 */
    /*
    'APP_DEBUG'       => true,    // 调试模式开关
    'SHOW_RUN_TIME'   => true,    // 运行时间显示
    'SHOW_ADV_TIME'   => true,    // 显示详细的运行时间
    'SHOW_DB_TIMES'   => true,    // 显示数据库的操作次数
    'SHOW_CACHE_TIMES'=> true,    // 显示缓存操作次数
    'SHOW_USE_MEM'    => true,    // 显示内存开销
    'SHOW_PAGE_TRACE' => true,    // 显示页面Trace信息
    */
    
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__H-UI__'    => __ROOT__ . '/Public/H-UI',
        '__UED__'     => __ROOT__ . '/Public/Ueditor1.4.3',
        '__VEDIOJS__' => __ROOT__ . '/Public/Video-js',
        '__HOME__'    => __ROOT__ . '/Public/Home',
    ),

    /* 路由规则 */
    'URL_ROUTE_RULES' => array(
        'huli'     => 'Index/huli',
		'research' => 'Index/research',
		'about'    => 'Index/about',
		'mamashouce'    => 'Index/mamashouce',
		'baobeichengzhang'    => 'Index/baobeichengzhang',
		'fuwu'     => 'Index/fuwu',
		
        
    ),

);