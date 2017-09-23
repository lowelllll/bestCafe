<?php
    include "../db_con.php";
    session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인을 해주세요.');location.href='../login.php';</script>";
        exit;
    }
    if(!isset($_GET['curl'])){
        echo "<script>alert('잘못된 접근입니다.');history.back();</script>";
        exit;
    }
    $curl = $_GET['curl'];
    $user = $_SESSION['id'];
    $sql = "select * from cafe where curl = '{$curl}'";
    $go = $db -> prepare($sql);
    $go->execute();
    $re = $go -> fetch();
    if($_SESSION['id']!=$re['cadmin']){
           echo "<script>alert('카페 개설자만 사용가능합니다.');history.back();</script>";
           exit;
    }else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="wrap">
        <header>
            <h1><?=$re['cname']?> admin page</h1>
            <button class="out"><i class="large material-icons ">close</i></button>
        </header>
        <section>
            <div class="menu">
                <ul>
                    <li class="focusList">MEMBER</li>
                    <li>ALLOW</li>
                    
                    <li>CATEGORY</li>
                    <li>CLOSE</li>
                    
                </ul>
            </div>
            <div class="member">
                <div class="scrollbind">
                    <table class="list">
                        <?php
                            $allow = 1;
                             $sql = "select * from cafejoin where curl = '{$curl}' and allow = '1'";
                            $go = $db -> prepare($sql);
                            $go->execute();
                            while($re=$go->fetch()){
?>
                            <tr>
                                <td ><img src="http://via.placeholder.com/66x66" alt="profile"></td><td><?=$re['user']?></td><td><a href="walkout.php?curl=<?=$curl?>&user=<?=$re['user']?>"><button class="btn">탈퇴</button></a></td>
                            </tr>
                            <?php
                            }
?>
                           
                        </table>
                    
                </div>
            </div>
            <div class="allow">
                <!--그사람 얼굴,이름 승락하기 안하기-->
                 <div class="scrollbind">
                     <table class="list">
                         <?php
                            $not = 0;
                             $sql = "select * from cafejoin where curl = '{$curl}' and allow = '{$not}'";
                            $go = $db -> prepare($sql);
                            $go->execute();

                            while($re = $go -> fetch()){
                            
?>

                        <tr>
                            <td><img src="http://via.placeholder.com/66x66" alt="profile"></td><td><?=$re['user']?></td><td><a href="apply.php?curl=<?=$curl?>&user=<?=$re['user']?>"><button class="btn">승락</button></a></td>
                        </tr>
                       <?php
                            }
                       ?>
                    </table>
                </div>
            </div>
            <div class="design">
                <!--메인/배너 꾸미기 -->
                <h1>Cover</h1>
                <span>사이즈는 블라블라</span>
                
            </div>
            <div class="category">
                <!--메인/배너 꾸미기 -->
                <h2>카테고리 설정</h2>
                <p> 추가할 카테고리를 입력해주세요.</p>
                <form action="category.php?curl=<?=$curl?>" method="POST">
                    <input type="text" name="name" required> 
                    <button><i class=" material-icons">check</i></button>
                </form>
                
            </div>
            <div class="close">
                <!--폐쇄하기-->
                <h2>카페를 폐쇄하시겠습니까?</h2>
                <p>카페 폐쇄를 하게되면 카페를 가입한 멤버들은 자동으로 탈퇴되며,<br>
                    카페를 복구할 수 없습니다.
                </p>
                <a href="close.php?curl=<?=$curl?>"><button>폐쇄하기</button></a>
            </div>
        </section>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="./js/index.js"></script>
<?php
    }
?>