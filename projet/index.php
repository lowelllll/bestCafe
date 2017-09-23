<?php
    include "db_con.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bast Cafe</title>
     <link href="logo.png" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
   
        <?php
            if(!isset($_SESSION['id'])){
        ?>
         <div id="wrap2">
             <video autoplay loop>
                <source src="Beach.mp4" type="video/mp4" />
            </video>
        <div class="main">
            <h1 class="logo">
                <img src="logo.png" alt="logo">
            </h1>
            <form action="login.php" method="post">
                <input type="text" name="id"  id="id" value="Id" required ><br>
                <input type="password" name="pw" value="PWww" id="pw" required>
                <button type="submit" > <i class="large material-icons">check</i></button><br>
                <a href="signup.html" class="signa">SIGN UP</a>
                <a href="found.html" class="founda">FOUND</a>
                <a href="pw_change.html" class="founda">PW_CHANGE</a>
            </form>
        </div>
         </div>

     <?php
            }else{
                $sql = "select * from cafe order by idx desc";
                $go = $db -> prepare($sql);
                $go -> execute();
                
        ?>
    <div id="wrap">
        <div class="cafe_list">
            <div class="scrollbind">
                <ul>
                    <?php

                        while($re = $go -> fetch()){
                            
                                
                    ?>
                    
                    <li>
                        <div class="benner"><img src="./cover/<?=$re['cbenner']?>"
                         alt="cafe_benner"></div>
                        <div class="cafe_info"><p><a href="./cafe/index.php?curl=<?=$re['curl']?>"><?=$re['cname']?></a></p><p><a href="./cafe/index.php?curl=<?=$re['curl']?>"><?=$re['cexp']?></a></p></div>
                    </li>
                <?php
                        }
                        
                    
                ?>
                </ul>
                <!--<p class="c_none">카페 목록이 없습니다.</p>-->
            </div>
        </div>
        <div class="info">
            <h1 class="face">
                <?php
                    $sql = "select * from user where id = '{$_SESSION['id']}'";
                    $go = $db -> prepare($sql);
                    $go -> execute();
                    $re = $go -> fetch();
                ?>
                <img src="./profile/<?=$re['profile']?>" alt="profile">
            </h1>
            <p><?=$_SESSION['name']?></p>
            <div class="my_list">
                <div class="scrollbind scrollbindW ">
                    <ul>
                        <?php
                            $sql = "select * from cafejoin where user = '{$_SESSION['id']}' and allow = 1";
                            $go = $db -> prepare($sql);
                            $go -> execute();
                            while($re = $go -> fetch()){
                                $ccurl=$re['curl'];
                                $sql="select * from cafe where curl='{$ccurl}'";
                                $ggo=$db->prepare($sql);
                                $ggo->execute();
                                $rre=$ggo->fetch();
                        ?>
                        <a href="./cafe/index.php?curl=<?=$re['curl']?>"><li> - <?=$rre['cname']?> </li></a>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="btn">
                <a href="logout.php"><button>로그아웃</button></a>
                <a href="create1.php"><button>카페 개설</button></a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="./js/index.js"></script>