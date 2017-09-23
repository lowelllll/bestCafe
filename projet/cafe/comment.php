<?php
include_once"../db_con.php";

session_start();
$curl = $_POST['curl'];
$res=$_POST;
    



   
      
    if(isset($_SESSION['id'])){
    $sql="insert into comment(id,name,content,number) values
    ('$_SESSION[id]','$_SESSION[name]','$res[comment]','$_SESSION[idx]')";
  echo "<script>alert('댓글이 입력되었습니다');</script>";
        echo "<script>location.href='cafe_read.php?idx=$_SESSION[idx]&curl=$curl';</script>";

    

   
$go = $db -> prepare($sql);
                    $go->execute();
        $row=$go->fetch();  
    
    
    
}else{
    echo"    <br>";
    echo"아이디나 비밀번호가 다릅니다";
}

?>