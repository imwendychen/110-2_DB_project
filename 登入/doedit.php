<?php
$ourdata=include("config.php");
session_start();
$id = $_POST['ID'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$cellphone = $_POST['cellphone'];

$sql = "UPDATE member
    SET password = '$password',
    nickname = '$nickname',
    birthday = '$birthday',
    gender = '$gender',
    address = '$address',
    cellphone = '$cellphone'
    WHERE ID = '$id' ";
    mysqli_query($ourdata,$sql);
    edit_success("修改成功");

    function edit_success($message)
{
    echo "<script>alert('$message');
     window.location.href='usercenter.php';
    </script>";
}
?>

