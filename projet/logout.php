<?php
include('db_con.php');

session_start();

if(empty($_SESSION['id'])) {
    echo "<script>alert('로그인을 하십시오.');</script>";
    echo "<script>location.href='index.php';</script>";
    exit();
}
session_unset();
session_destroy();
echo "<script>alert('로그아웃 완료');</script>";

?>
<script>
location.href="index.php";
</script>