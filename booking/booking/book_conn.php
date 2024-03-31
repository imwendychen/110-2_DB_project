<?php

class Model{
   private $server = "localhost";         # MySQL/MariaDB 伺服器
   private $dbuser = "root";       # 使用者帳號
   private $dbpassword = ""; # 使用者密碼
   private $dbname = "dbproject";

    public function connect(){
        $dsn = 'mysql:host='.$this->server.';dbname='.$this->dbname;
        $pdo = new PDO($dsn,$this->dbuser,$this->dbpassword);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    }

}


?>