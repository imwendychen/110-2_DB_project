<?php
$server = "localhost";         # MySQL/MariaDB 伺服器
$dbuser = "root";       # 使用者帳號
$dbpassword = ""; # 使用者密碼
$dbname = "dbproject";

$link = mysqli_connect($server, $dbuser, $dbpassword, $dbname);
mysqli_query($link, 'SET NAMES utf8');

if($link === false){
    die("錯誤 : 無法連結資料庫" . mysqli_connect_error());
}
else{
    return $link;
}
?>
