<?php
    /**
     *   文章详情页面
     *   时间:2017年12月19日
     *   @王恒兵
     **/
    include '../init.php'; //加载项目配置文件
    include DIR_CORE.'DAOPDO.class.php';
    include DIR_CONFIG."config.php";
    $art_id = $_GET['art_id'];
    $dao = DAOPDO::getSingLenton();
    $sql_art = "select article.art_id,article.col_id ,art_cover,article.user_id,article.art_title,article.art_content ,article.aer_time,art_num,user.user_name,user.user_id,class.col_id,col_content from article,user,class WHERE article.col_id = class.col_id and article.user_id = user.user_id  and art_id = $art_id  ";
    $art_row = $dao->fetchRow($sql_art);
    //*************评论*********************
    $sql_dis = "select * from discuss where art_id = $art_id   ";
    $dis_rew = $dao->fetchAll($sql_dis);
    //****************查询本栏目的文章**************************
    $col_id = $art_row['col_id'];
    $art_tuijian = "select art_id,art_title from article where col_id = $col_id ORDER BY aer_time DESC LIMIT 0,6";
    $tuijian_rew = $dao->fetchAll($art_tuijian);
    //*****************文章阅读量************************
    $sql_update = "update article set art_num = art_num+1 where art_id = $art_id ";
    $dao->exec($sql_update);
    //*************查询网站设置****************
    $sql_setup = "select * from setup";
    $setup = $dao->fetchRow($sql_setup);
    include './model.php';
    include DIR_VIEW."article.html";//加载视图文件
?>