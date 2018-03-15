<?php
    /**
     *   留言页面
     *   时间:2017年12月21日
     *   @王恒兵
     **/
    include '../init.php'; //加载项目配置文件
    include DIR_CORE.'DAOPDO.class.php';
    include DIR_CONFIG."config.php";
    $dao = DAOPDO::getSingLenton();
    //************查询网站留言********************
    $sql_message = "select * from message ORDER BY me_time";
    $mes_rews = $dao->fetchAll($sql_message);
    //*************查询网站设置****************
    $sql_setup = "select * from setup";
    $setup = $dao->fetchRow($sql_setup);
    include DIR_VIEW."message.html";//加载视图文件
?>