<?php
$ourdata=include("config.php");
session_start();
$id = $_GET['ID'];

$sql = "DELETE FROM member WHERE ID=$id";
    mysqli_query($ourdata,$sql);
    delete_success("刪除成功");
    
    function delete_success($message)
{
    echo "<script>alert('$message');
     window.location.href='usercenter.php';
    </script>";
}
?>