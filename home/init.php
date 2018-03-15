<?php
    /**
     * 项目初始化文件
     * 时间:2017年12月15日
     * @王恒兵
     * */
    session_start();  //开启session
    date_default_timezone_set('PRC');//设置相应头编码
    header('Content-Type:text/html;charset=utf-8');  //设置字符编码
    define("DIR_ROOT",str_replace('\\','/',__DIR__).'/');//定义根目录常量
    define("DIR_CORE",DIR_ROOT."core/");  //定义核心文件目录常量
    define("DIR_CONFIG",DIR_ROOT."config/");
    define("DIR_MODEL",DIR_ROOT."model/"); //定义业务逻辑文件目录常量
    define("DIR_VIEW",DIR_ROOT."view/");//定义模板文件目录常量
    define("DIR_PUBLIC",'/public'); //定义公共文件目录常量
    define("DIR_ADMIN",DIR_VIEW."admin/");  //定义后台文件目录
    define("DIR_HOME",DIR_VIEW."home/");  //定义前台文件目录
?>