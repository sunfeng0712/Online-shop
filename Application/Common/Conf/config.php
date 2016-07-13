<?php
return array(
	//'配置项'=>'配置值'
    'AUTH_CODE'=>'sf_shop',//后台登录密码
    'DEFAULT_MODULE'        =>  'Admin',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Admin', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login', // 默认操作名称
    'URL_MODEL'          => '0', //URL模式
    'SESSION_AUTO_START' => true, //是否开启session
    //数据库配置
    'DB_TYPE' => 'mysql', //数据库类型
    'DB_HOST' => 'localhost', //数据库主机
    'DB_NAME' => 'shop', //数据库名称
    'DB_USER' => 'root', //数据库用户名
    'DB_PWD' => 'root', //数据库密码
    'DB_PORT' => '3306', //数据库端口
    'DB_PREFIX' => 'sf_', //数据库前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  => '', // 数据库调试模式 开启后可以记录SQL日志
);