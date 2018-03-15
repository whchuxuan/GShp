<?php
    /**
     *   栏目分类
     *   时间:2017年12月20日
     *   @王恒兵
     **/
    include '../init.php'; //加载项目配置文件
    include DIR_CORE.'DAOPDO.class.php';
    include DIR_CORE.'pages.class.php';
    include DIR_CONFIG."config.php";
    $dao = DAOPDO::getSingLenton();
    $art_clo = $_GET['art_clo'];
    //************查询栏目名称
    $sql_class = "select col_content from class where col_id = $art_clo ";
    $class_name = $dao->fetchColumn($sql_class);
    //*************查询网站设置****************
    $sql_setup = "select * from setup";
    $setup = $dao->fetchRow($sql_setup);
    //*************查询用户********************
    $sql_user = "select * from user";
    $user = $dao->fetchRow($sql_user);
    $pic = $user['user_pic'];
    //************查询文章
    $sql_art = "select article.art_id,article.col_id ,art_cover,article.user_id,article.art_title,article.art_content ,article.aer_time, user.user_name,user.user_id,class.col_id,col_content from article,user,class WHERE article.col_id = class.col_id and article.user_id = user.user_id and article.col_id=$art_clo ";
    $art_rew = $dao->fetchAll($sql_art);
    include './model.php';
    include DIR_VIEW."class.html";//加载视图文件
?>w