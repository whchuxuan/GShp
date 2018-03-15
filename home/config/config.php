<?php
    /**
      * 公共函数
      * 时间:2017年12月15日
      * @王恒兵
      * */

    function input ($date){
        $date = trim($date);
        $date = stripslashes($date);
        $date = htmlspecialchars($date);
        return $date;
    }
    function login($url){
        if(!isset($_SESSION['id']) || !isset(  $_SESSION['admin'])){
            echo "<script>alert('没有登陆')</script>";
            echo "<script>location = '$url'</script>";
            exit;
        }
    }
    function secsToStr($secs) {
        if($secs>=86400){$days=floor($secs/86400);$secs=$secs%86400;$r=$days.' day';if($days<>1){$r.='s';}if($secs>0){$r.=', ';}}
        if($secs>=3600){$hours=floor($secs/3600);$secs=$secs%3600;$r.=$hours.' hour';if($hours<>1){$r.='s';}if($secs>0){$r.=', ';}}
        if($secs>=60){$minutes=floor($secs/60);$secs=$secs%60;$r.=$minutes.' minute';if($minutes<>1){$r.='s';}if($secs>0){$r.=', ';}}
        $r.=$secs.' second';if($secs<>1){$r.='s';}
        return $r;
    }
?>