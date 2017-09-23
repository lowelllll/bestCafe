
<?php
include "../db_con.php";
session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인을 해주세요.');location.href='../login.php';</script>";
        exit;
    }
    if(!isset($_GET['curl'])){
        echo "<script>alert('잘못된 접근입니다.');history.back();</script>";
        exit;
    }

$curl = $_GET['curl'];
$cname = $_POST['name'];

 $sql = "select * from cafe where cname = '{$cname}'";

 $go = $db -> prepare($sql);
 $go -> execute();
 $re = $go -> fetch();


if($cname==NULL) {
    echo ("catecory 입력하세요");
    exit();
}

 $sql = "insert into catecory set curl='{$curl}',name='{$cname}'";
    $go = $db -> prepare($sql);
    $go->execute();
    echo "<script>alert('카테고리 생성 완료');location.href='./index.php?curl=$curl'</script>";

    
?>