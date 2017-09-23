<?php
include_once"../db_con.php";
session_start();
$curl = $_POST['curl'];
$res=$_POST;
    if(isset($_SESSION['id']) ){

 
    
    $sql = "UPDATE board  SET title='$res[title]',content='$res[content]' where idx = '$_SESSION[idx]'";
     $go = $db -> prepare($sql);
            $go->execute();
        $row=$go->fetch();

echo "<script>alert('수정이 완료되었습니다');</script>";
         echo "<script>location.href='index.php?idx=$_SESSION[idx]&curl=$curl';</script>";


        

}else
{
echo"<script>alert('아이디나 비밀번호가다릅니다')</script>";

}
?>