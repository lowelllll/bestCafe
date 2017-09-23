<?php
include('db_con.php');
$good_login = 0;
$id = $_POST['id'];
$pw = $_POST['pw'];
if(empty($id) || empty($pw)) {
    echo "아이디나 비밀번호를 치세요<br>";
    exit;
}
$id = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $id);
$pw = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $pw);
$id=addslashes($id);
$pw=addslashes($pw);
$hash_pw = hash('sha512',$pw);
$query = "SELECT * from user";
//$query = "SELECT * from login WHERE id==$id and pw==$pw";
$last = $db->query($query);
$last->setFetchMode(PDO::FETCH_ASSOC);
while($row= $last->fetch()){

if($id == $row['id'] && $hash_pw == $row['pw']) {

	$good_login =1;
	break;
	}
}
if($good_login) {
	echo "<script>alert('로그인 완료');</script>";
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $row['name'];
    $_SESSION['pw'] = $hash_pw;
    echo "<script>location.href='index.php'</script>";
    exit;
}
else {
	echo "<script>alert('아이디 혹은 비밀번호를 확인해주세요');</script>";
    echo "<script>location.href='index.php'</script>";
	exit;
}
?>