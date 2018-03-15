<?php
    /**
     *   前台入口文件
     *   时间:2017年12月19日
     *   @王恒兵
     **/
    include './home/init.php'; //加载项目配置文件
    include DIR_CORE.'DAOPDO.class.php';
    include DIR_CORE.'pages.class.php';
    include DIR_CONFIG."config.php";
    $dao = DAOPDO::getSingLenton();
    //-------------分页代码模块-----------------------------------------
    //3、查询总记录数
    $sql = "select  count(*) as sum from  article";
    $row = $dao->fetchColumn($sql);
    $page = new Page();
    //当前是第几页
    $page -> now_page = isset($_GET['page'])?$_GET['page']:1;
    //每页显示几条记录
    $page -> pagesize = 10;
    //总的记录数
    $page -> total_pages = $row;
    $offset = ($page -> now_page - 1)*$page->pagesize;
    $size = $page -> pagesize;
    // ----------------------------------------分页代码结束-------------------------------------------

    //*************查询网站设置****************
    $sql_setup = "select * from setup";
    $setup = $dao->fetchRow($sql_setup);
    //*************查询用户********************
    $sql_user = "select * from user";
    $user = $dao->fetchRow($sql_user);
    $pic = $user['user_pic'];
    //*************查询文章********************
    $sql_art = "select article.art_id,article.col_id ,art_cover,article.user_id,article.art_title,article.art_content ,article.aer_time, user.user_name,user.user_id,class.col_id,col_content from article,user,class WHERE article.col_id = class.col_id and article.user_id = user.user_id ORDER BY aer_time DESC limit $offset, $size  ";
    $art_rew = $dao->fetchAll($sql_art);
    //************访问量********************
    if(!isset($_SESSION['state'])){
        $_SESSION['state'] = 1;
        $insert_fwl = "update  setup set amount = amount+1";
        $dao->exec($insert_fwl);
    }
    include './home/model/model.php';
    include DIR_VIEW."index.html";//加载视图文件

?>