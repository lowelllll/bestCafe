<?php
include('db_con.php');
$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$re_pw = $_POST['re_pw'];
$email = $_POST['email'];
$id = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $id);
$pw = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $pw);
$name = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $name);
$re_pw = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $re_pw);
if(empty($id) || empty($pw)||empty($name)||empty($re_pw) || empty($email)) {
    echo "<script>alert('모두 입력해주세요.');</script>";
    echo "<script>history.back();</script>";
	exit;
}
else if( $pw!=$re_pw ) {
	 echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    echo "<script>history.back();</script>";
	exit;
}
else {
$query = "SELECT * from user";
$last = $db->query($query);
$last->setFetchMode(PDO::FETCH_ASSOC);
while($row= $last->fetch()){
    if($id==$row['id'] || $email==$row['email']) {
	 echo "<script>alert('똑같은 아이디나 이메일이 존재합니다..');</script>";
    echo "<script>history.back();</script>";
	exit;
   }
 }
}
$hash_pw = hash('sha512',$pw);
//$query = "INSERT into user(id,pw,email,name) VALUES('admin','admin','admin@naver.com','admin')";

$target_dir="profile/";
    $target_file=$target_dir . basename($_FILES['file']['name']);
    $file_name=basename($_FILES['file']['name']);
    //target_file 파일이 업로드될 경로
    $uploadok=1;
    $type=pathinfo($target_file,PATHINFO_EXTENSION);
    //파일의 확장자 얻음
    
    if(isset($_POST['submit'])){
        $check = getimagesize($_FILES['file']['tmp_name']);
        if($check !==false){
              $uploadok=1;
        }else{
            echo "<script>alert('이파일은 사진이 아닙니다');history.back();</script>";
            exit;
            $uploadok=0;
        }
    }
    if(file_exists($target_file)){
        $uploadok=0;
    }
    
    
    if($_FILES['file']['size']>500000){
        echo "<script>alert('사진은 500kb가 넘으면 안됩니다.');history.back();</script>";
        exit;
        $uploadok=0;
    }

    if($uploadok==1){
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
            
        }else{
             echo "<script>alert('사진 업로드 실패.');history.back();</script>";
        exit;
        }
    }



$query = "INSERT INTO user(id,pw,email,name,profile) VALUES('$id','$hash_pw','$email','$name','$file_name')";
$signup = $db->exec($query);
 echo "<script>alert('회원가입 완료.');</script>";
echo "<script>location.href='index.php';</script>";
?>