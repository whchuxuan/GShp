<?php
    /**
     *   关于我
     *   时间:2017年12月21日
     *   @王恒兵
     **/
    include '../init.php'; //加载项目配置文件
    include DIR_CORE.'DAOPDO.class.php';
    include DIR_CONFIG."config.php";
    $dao = DAOPDO::getSingLenton();
    //**************查询用户信息***********************
    $sql_user = "select * from user where  user_admin = 1";
    $user_rows = $dao->fetchRow($sql_user);
    //*************查询网站设置****************
    $sql_setup = "select * from setup";
    $setup = $dao->fetchRow($sql_setup);

    include DIR_VIEW."about.html";//加载视图文件

?>