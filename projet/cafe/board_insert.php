<?php
include_once "../db_con.php";
$curl = $_GET['curl'];
	session_start();
$category = $_POST['category'];
$res=$_POST;

     $sql="INSERT INTO board(id,pw,title,content,date,name,curl,category) VALUES ('$_SESSION[id]','$_SESSION[pw]','$res[title]','$res[content]',now(),'$_SESSION[name]','$curl','$category')";

        $go = $db -> prepare($sql);
            $go->execute();
       
 
 echo "<script>alert('게시글이 등록되었습니다');</script>";
        echo "<script>location.href='index.php?curl=$curl';</script>";
?>
