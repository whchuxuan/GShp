<?php
    /**
     *   后台入口文件
     *   时间:2017年12月15日
     *   @王恒兵
     **/
    include './init.php'; //加载项目配置文件
    include DIR_CORE.'DAOPDO.class.php';
    include DIR_CONFIG."config.php";
    login('./model/login.php');
    $user_id = $_SESSION['id'];
    $dao = DAOPDO::getSingLenton();  //实例化PDO对象
    //**********查询网站设置*****************
    $sql_setup = "select * from setup ";
    $setup_row = $dao->fetchRow($sql_setup);
    //**************************************
    //**********查询用户********************
    $sql_user = "select * from user WHERE user_id = '$user_id'";
    $user_row = $dao->fetchRow($sql_user);
    //**********查询文章总数*********************
    $sql_art = "select count(*) as ar_num from article ";
    $art_num = $dao->fetchRow($sql_art);
    $art_num = $art_num['ar_num'];
    //***********查询评论总数**********************
    $sql_dis = "select count(*) as dis_num from discuss ";
    $dis_num = $dao->fetchRow($sql_dis);
    $dis_num = $dis_num['dis_num'];
    //*********查询栏目信息************************
    $class_sql = "select * from class";
    $class_row = $dao->fetchAll($class_sql);

    $_SESSION['name'] = $user_row['user_name'];
    $ip = $_SERVER['REMOTE_ADDR'];  //获取ip
    //获取网站运行时间
    $time = time() - $setup_row['web_time'];
//    $str_time = secsToStr($time);
    include DIR_VIEW."index.html";//加载视图文件
	//mail test@qq.com password:@Qonl.!!poo
?>