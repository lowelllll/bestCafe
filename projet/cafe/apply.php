<?php
     include '../db_con.php';
    session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인을 해주세요.');location.href='../login.php';</script>";
        exit;
    }
    $curl = $_GET['curl'];
    $allow = 0;
    $not = 1;
    $sql =  "select * from cafejoin where curl = '{$curl}'";
    $go = $db -> prepare($sql);
    $go->execute();
    $re = $go -> fetch();

    if($re['user']==$_SESSION['id']&&$re['allow']==1){
        echo "<script>alert('카페 회원은 가입할 수 없습니다.');history.back();</script>";
        exit;
    }else if($re['user']==$_SESSION['id']&&$re['allow']==0){
        echo "<script>alert('이미 가입신청을 했습니다.');history.back();</script>";
        exit;
    }



     $sql =  "insert into cafejoin set curl='{$curl}',user = '{$_SESSION['id']}',allow = '{$allow}'";
    $go = $db -> prepare($sql);
    $go->execute();

?>
<script>
    alert('가입신청을 했습니다.');
    history.back();
</script>