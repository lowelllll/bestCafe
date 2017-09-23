<?php
     include '../db_con.php';
    session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인을 해주세요.');location.href='../login.php';</script>";
        exit;
    }
     $curl = $_GET['curl'];
    $admin = $_SESSION['id'];
    $sql = "select * from cafe where curl = '{$curl}' and cadmin = '{$admin}'";
    $go = $db -> prepare($sql);
    $go->execute();
    $re = $go -> fetch();
    if($admin!=$re['cadmin']){
           echo "<script>alert('카페 개설자만 사용가능합니다.');history.back();</script>";
           exit;
    }

    $user = $_GET['user'];

    $sql = "UPDATE cafejoin SET allow='1' WHERE curl='{$curl}' AND user='{$user}' ";
    $go = $db -> prepare($sql);
    $go->execute();

?>
<script>
     alert('승락 완료.');
    history.back();
</script>