<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo '<script>
        alert("로그인을 하십시오.");</script>';
        echo "<script>location.href='index.php'</script>";
        exit(); 
    }
?>
<?php
include "db_con.php";

$cname = $_POST['cname'];
$cexp = $_POST['cexp'];
$curl = $_POST['curl'];
$cadmin = $_SESSION['id'];


 $sql = "select * from cafe where cname = '{$cname}'";
 $go = $db -> prepare($sql);
 $go -> execute();
 $re = $go -> fetch();
if($cname==NULL) {
    echo ("이름 입력하세요");
    exit();
} elseif($re['cname']==$cname){
     echo '<script>
        alert("똑같은 이름이 있습니다.");</script>';
        echo "<script>history.back();</script>";
    exit;
}


 $sql = "select * from cafe where curl = '{$curl}'";
 $go = $db -> prepare($sql);
 $go -> execute();
 $re = $go -> fetch();
if($curl==NULL) {
     echo "<script>alert('url을 입력해주세요.');</script>";
    echo "<script>history.back();</script>";
    exit();
}

elseif($re['curl']==$curl){
        echo '<script>
        alert("똑같은 url 주소가 있습니다.");</script>';
        echo "<script>history.back();</script>";
        exit;
    }

  $target_dir="cover/";
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
    
   $sql = "insert into cafe set cname='{$_POST['cname']}', curl='{$curl}',cexp='{$cexp}',cadmin='{$cadmin}',cbenner = '{$file_name}'";
    $go = $db -> prepare($sql);
    $go->execute();

    $sql =  "insert into cafejoin set curl='{$curl}',user = '{$_SESSION['id']}',allow = 1";
    $go = $db -> prepare($sql);
    $go->execute();

    echo "<script>alert('생성완료');location.href='./index.php'</script>";
?>