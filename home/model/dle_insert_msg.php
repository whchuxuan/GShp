<?php
    /**
     *   留言入库
     *   时间:2017年12月19日
     *   @王恒兵
     **/
    include '../init.php'; //加载项目配置文件
    include DIR_CORE.'DAOPDO.class.php';
    include DIR_CONFIG."config.php";
    $dao = DAOPDO::getSingLenton();
    $name = input($_POST['name']);
    $content = input($_POST['content']);
    $time = time();
    $insert_msg = "insert into message values(null,'$name','$content','暂无','$time')";
    if($dao->exec($insert_msg)){
        echo "<script>location ='./message.php'</script>";
    }
?>