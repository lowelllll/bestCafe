<?php
include_once"../db_con.php";

$curl = $_GET['curl'];
$idx = $_GET['idx'];
session_start();
$res=$_POST;

    if(isset($_SESSION['id']) ){

 
    
    $sql = "delete from board where idx = '{$idx}'";
   

echo "<script>alert('게시글이 삭제되었습니다');</script>";
       echo "<script>location.href='index.php?curl=$curl';</script>";

  $go = $db -> prepare($sql);
            $go->execute();
        $row=$go->fetch();
        

}else
{
echo"<script>alert('아이디나 비밀번호가다릅니다')</script>";

}
?>