<?php
class DAOPDO {
    //保存实例化对象
    private static $instance;
    private $pdo;

    private function __construct(){
        $dbms='mysql';     //数据库类型
        $host='localhost'; //数据库主机名
        $dbName='blog';    //使用的数据库
        $user='root';      //数据库连接用户名
        $pass='root';          //对应的密码
        $dsn="$dbms:host=$host;dbname=$dbName";
        try{
            $this->pdo = new PDO($dsn, $user, $pass); //初始化一个PDO对象
            $this->pdo->exec("SET NAMES utf8");  //设置字符集编码
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    private function __clone(){
    }
    public  static function getSingLenton(){  //生成单列对象
        if(!self::$instance instanceof self){
            self::$instance =  new self();
        }
      return  self::$instance;
    }
    // 查询一条记录的方法
    public function fetchRow($sql){
        $pdo_sratement = $this->pdo->query($sql);
        if($pdo_sratement == false){
            $error = $this->pdo->errorInfo();
            echo "SQL 语句错误:<br> ".$error[2];
            return false;
        }
        $result =  $pdo_sratement->fetch(PDO::FETCH_ASSOC);
        $pdo_sratement->closeCursor();
        return $result;
    }
    //查询所以记录的方法
    public function fetchAll($sql){
        $pdo_sratement = $this->pdo->query($sql);
        if($pdo_sratement == false){
            $error = $this->pdo->errorInfo();
            echo "SQL 语句错误:<br> ".$error[2];
            return false;
        }
        $result = $pdo_sratement->fetchAll(PDO::FETCH_ASSOC);
        $pdo_sratement->closeCursor();
        return $result;
    }
    //查询一个字段的方法
    public function fetchColumn($sql){
        $pdo_sratement = $this->pdo->query($sql);
        if($pdo_sratement == false){
            $error = $this->pdo->errorInfo();
            echo "SQL 语句错误:<br> ".$error[2];
            return false;
        }
        $result = $pdo_sratement->fetchColumn();
        $pdo_sratement->closeCursor();
        return $result;
    }
    //执行dml语句的方法
    public function exec($sql){
        $result=$this->pdo->exec($sql);
       if($result=== false){
           $error = $this->pdo->errorInfo();
           echo "SQL 语句错误:<br> ".$error[2];
           return false;
       }
       return $result;
    }
    //引号转义包裹的方法
    public function quote($data){
        return $this->pdo->quote($data);
    }
    //查询刚刚插入的主键的之
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }
}

?>