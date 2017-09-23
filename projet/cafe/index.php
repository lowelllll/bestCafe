<?php
    include '../db_con.php';
    session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인을 해주세요.');location.href='../login.php';</script>";
        exit;
    }
    $curl = $_GET['curl'];

    //$sql = "select * from board where curl = '{$cname}'";
    //$go = $db -> prepare($sql);
    //$go->execute();
    //$re = $go -> fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div id="wrap">
        <header>
            <a href="./cafe_write.php?curl=<?=$curl?>"><button class="btn"><i class="large material-icons">edit</i></button></a>
            <?php
        
                $sql = "select * from cafe where curl = '{$curl}'";
                $go = $db -> prepare($sql);
                $go->execute();
                $re = $go -> fetch();
                         if($re['cadmin']==$_SESSION['id']){   

                        ?>
                           <a href="../admin/index.php?curl=<?=$curl?>"><button class="btn2" ><i class="large material-icons">settings</i></button></a> 
                        <?php
                        }
                        ?>
        </header>
        <section>
            <article class="board">
                <?php
                	$sql = "select * from board where curl = '{$curl}' order by idx desc"; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
          
	               $go = $db -> prepare($sql);
                    $go->execute();
                 while($row = $go -> fetch()){
?>
                    <table class="tb">
                        <tr>
                            <td align="left" colspan="2"></td>
                        </tr>
                       
                        <tr height="100">
                        
                            <td colspan="2">
                                  <a href="cafe_read.php?idx=<?=$row['idx']?>&curl=<?=$curl?>">
                                      <?=$row['title']?>
                                       </a>
                            </td>
                        
                        </tr>
                                
                        <tr>
                           <td align="left"><?php echo $row['date']?></td>
                            <td align="right">   <?php echo $row['name']?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><div id="hr"></div></td>
                        </tr>
                        <tr height="200" >
                            <td colspan="2"><pre><?php echo $row['content']?></pre></td>
                        </tr>
                    </table>
            
                
                    <?php
            }
?>
            </article>
        </section>
        <aside>
            <?php
                  

                $count = 0;
                $sql2 = "select * from cafejoin";
                //$sql2 = "select count(*) from cafejoin where curl = '$curl' and allow = '{1}'";
                //멤버수 구하고 싶다...
                $go2 = $db->query($sql2);
                $go2->setFetchMode(PDO::FETCH_ASSOC);   
                while($re2 = $go2->fetch()) {
                    if($re2['curl']==$curl && $re2['allow']=='1') {
                        $count +=1;
                    }
                }
                
            ?>
            <div class="cover">
                
               <img src="../cover/<?=$re['cbenner']?>" alt="cover">
              
                <p><?=$re['cname']?></p>
            </div>
            <?php

                    if($_SESSION['id']!=$re['cadmin']||($re2['user']==$_SESSION['id'] && $re2['allow']=='1')){
            ?>
            <a href="apply.php?curl=<?=$curl?>"><button>가입신청</button></a>
            <?php
                    }
            ?>
            <div class="info">
                <div>
                    <p><?=$re['cexp']?></p>
                </div>
                <div>
                    <p>멤버 <?=$count?>| 리더 <?=$re['cadmin']?> 
                        
                    </p><!--멤버수, 리더정보-->
                </div>
            </div>
            <div class="category">
                <?php
                   $sql2 = "select * from catecory where curl = '$curl'";
                    $go2 = $db -> prepare($sql2);
                    $go2 -> execute();
                   
                ?>
               <span>CATEGORY</span>
                <ul>
                    <li><a href="index.php?curl=<?=$curl?>">전체글 보기</a></li>
                    <?php
                        while($re2 = $go2 -> fetch()){
                            
                    ?>
                    <li><a href="category.php?category=<?=$re2['name']?>&curl=<?=$curl?>"><?=$re2['name']?></a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </aside>
        <footer>
            
        </footer>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="./js/index.js"></script>