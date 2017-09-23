<?php
include_once"../db_con.php";
session_start();
$idx = $_GET['idx'];    
$curl=$_GET['curl'];
$res=$_POST;
    if(isset($_SESSION['id']) ){

 
    
    $sql = "delete from comment where idx = '{$idx}'";
     $go = $db -> prepare($sql);
            $go->execute();
        $row=$go->fetch();

echo "<script>alert('댓글이 삭제되었습니다');</script>";
        echo "<script>location.href='cafe_read.php?idx=$_SESSION[idx]&curl=$curl';</script>";


        

}else
{
echo"<script>alert('아이디나 비밀번호가다릅니다')</script>";

}
?>