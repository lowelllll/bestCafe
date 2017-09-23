<?php
include "../db_con.php";
session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인을 해주세요.');location.href='../login.php';</script>";
        exit;
    }
    if(!isset($_GET['curl'])||!isset($_GET['user'])){
        echo "<script>alert('잘못된 접근입니다.');history.back();</script>";
        exit;
    }
    $curl = $_GET['curl'];
    $user = $_GET['user'];
    $admin = $_SESSION['id'];
    $sql = "select * from cafe where curl = '{$curl}'";
    $go = $db -> prepare($sql);
    $go->execute();
    $re = $go -> fetch();
    if($admin!=$re['cadmin']){
           echo "<script>alert('카페 개설자만 사용가능합니다.');history.back();</script>";
           exit;
    }
    if($re['cadmin']==$user){
        echo "<script>alert('관리자는 탈퇴할 수 없습니다.');history.back();</script>";
           exit;
    }else {
        $sql = "delete from cafejoin where curl = '{$curl}' and user = '{$user}'";
        $go = $db -> prepare($sql);
        $go->execute();
    }

?>
<script>
    alert("탈퇴 완료");
    history.back();
</script>