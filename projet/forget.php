<?php
include('db_con.php');


$email = $_POST['email'];
$name = $_POST['name'];

$name = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $name);



if(isset($_POST['submit_id'])) {
if(empty($email)||empty($name)) {
	echo "입력 좀 하고사시죠? ^^";
}
else {
$query = "SELECT * from user";
$last = $db->query($query);
$last->setFetchMode(PDO::FETCH_ASSOC);
while($row= $last->fetch()){    
    if($row['name']==$name && $row['email']==$email) {
        //$search_engine = "SELECT * from user WHERE email=='$email' && name=='$name'";
        //$db->exec($search_engine);
        echo "<script>alert('임시번호는 ". $row['id'] . "입니다.');</script>";
        echo "<script>location.href='index.php';</script>";
        exit;
    }
}
     echo "<script>alert('일치하는 아이디가 없습니다.');</script>";
     echo "<script>history.back();</script>"; 
    }
}

  

else {
$id = $_POST['id'];
if(empty($email)||empty($name) || empty($id)) {
	 echo "<script>alert('모두 입력해주세요.');</script>";
    echo "<script>history.back();</script>";
	exit;
}
    $id = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $id);

$query = "SELECT * from user";
$last = $db->query($query);
$last->setFetchMode(PDO::FETCH_ASSOC);
while($row= $last->fetch()){
	if($row['id']==$id && $row['email']==$email && $row['name']==$name) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 15; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
        $hash_randDDI = hash('sha512',$randomString);
		$modify_query = "UPDATE user SET pw = '$hash_randDDI' WHERE id='$id'";
		$db->exec($modify_query);
         echo "<script>alert('임시번호는 $randomString 입니다.');</script>";
        echo "<script>location.href='index.php';</script>";
        exit();
		break;
		
	}
}

}









?>
