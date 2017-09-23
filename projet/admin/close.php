<?php
    include "../db_con.php";
    session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인을 해주세요.');location.href='../login.php';</script>";
        exit;
    }
    $curl = $_GET['curl'];
    $user = $_GET['id'];


if(isset($curl)) {
   $sql = "DELETE FROM cafe where curl='{$curl}'";
    $go = $db -> prepare($sql);
    $go->execute();
    
echo "<script>alert('삭제완료');location.href='../index.php'</script>";
}
?>
