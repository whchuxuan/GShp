<?php
    $dao = DAOPDO::getSingLenton();
    //************查询最新文章 取前几个********************
    $sql_new_art = "select art_id,art_title from article ORDER BY aer_time DESC LIMIT 0,9";
    $new_art_rew = $dao->fetchAll($sql_new_art);
    //************查询分类*******************************
    $sql_class = "select * from class";
    $class_rew = $dao->fetchAll($sql_class);
?>