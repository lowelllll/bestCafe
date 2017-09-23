<?php
include('db_con.php');

$pw = $_POST['now_pw'];
$id = $_POST['id'];
$email = $_POST['email'];
$change_pw = $_POST['pw'];

if(empty($pw)||empty($id)||empty($change_pw)) {
echo "error<br>";
}

$pw = hash('sha512',$pw);
$hash_change = hash('sha512',$change_pw);

if($pw==$hash_change) {
echo "<script>alert('같은 비밀번호로 바꿀 수 없습니다.');</script>";
    echo "<script>history.back();</script>";
    exit();

}

$query = "SELECT * from user";
$last = $db->query($query);
$last->setFetchMode(PDO::FETCH_ASSOC);
while($row=$last->fetch()){    
    if($row['id']==$id && $row['email']==$email && $row['pw']==$pw) {
      $change_query = "UPDATE user SET pw='$hash_change' WHERE id='$id' AND pw='$pw' ";
      $db->exec($change_query);
      echo "<script>alert('비밀번호 변경 완료');
    location.href = 'index.php';</script>";
   exit;
    
   }
}

?>
<script>    
    alert('일치하는 정보가 없습니다.');
    history.back();
</script>