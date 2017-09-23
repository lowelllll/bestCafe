<?php
$dsn = "mysql:host=localhost;port=3306;dbname=project;charset=utf8";
try {
    $db = new PDO($dsn,"root",""); //db 연결
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //db기능 실행못할때 실행할수있게 해줌
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //에러를 처리해줌
    
}
    
    
catch(PDOException $e) {
    echo "<script>alert(\"데이터베이스 연결실패 ㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋ\");</script>";
    exit;
}
global $mysqli;

$mysqli=mysqli_connect('localhost','root','','project');
if(mysqli_connect_errno()){
    echo"fail".mysqli_connect_errno();
}else{

}
?>
