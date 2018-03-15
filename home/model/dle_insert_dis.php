<?php
    /**
     *   评论入库
     *   时间:2017年12月19日
     *   @王恒兵
     **/
    include '../init.php'; //加载项目配置文件
    include DIR_CORE.'DAOPDO.class.php';
    include DIR_CONFIG."config.php";
    $dao = DAOPDO::getSingLenton();
    $art_id = input($_POST['art_id']);
    $name = input($_POST['name']);
    $content = input($_POST['content']);
    $time = time();
    $insert_dis = "insert into discuss (art_id,dis_name,dis_content,dis_tiem) values ('$art_id','$name','$content','$time')";
    if($dao->exec($insert_dis)){
        echo "<script>location ='./article.php?art_id=$art_id'</script>";
    }
?>