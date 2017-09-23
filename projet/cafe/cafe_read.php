<?php
include "../db_con.php";
    session_start();
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인을 해주세요.');location.href='../login.php';</script>";
        exit;
    }
    $curl = $_GET['curl'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/read.css">
</head>
<body>
    <div id="wrap">
        <header>
            <h1 class="logo"></h1>
        </header>
        <section>
            <article class="board">
                <table class="tb">
                     <?php

                 
        $sql = 'select * from board where idx = '.$_REQUEST['idx'];
						
                     $go = $db -> prepare($sql);
                    $go->execute();
      $_SESSION['idx']=$_REQUEST['idx'];
                
            
                 
        
						while($row=$go->fetch()){
                
        ?>
                    <tr>
                        <td align="left" colspan="2"><?=$row['category']?></td>
                    </tr>
                    <tr height="100">
                        <td colspan="2">  <?php echo $row['title']?></td>
                    </tr>
                    <tr>
                       <td align="left">  <?php echo $row['date']?></td>
                        
                        <?php
            if($_SESSION['id']==$row['id']){
                
            
            ?>
                       
                        <td align="right"><a href="cafe_edit.php?idx=<?=$row['idx']?>&curl=<?=$curl?>">수정</a>
                       <a href="cafe_delect.php?idx=<?=$row['idx']?>&curl=<?=$curl?>">삭제</a> </td>
                        <?php
            }else{
                
            
                ?>
                        <td align="right">  <?php echo $row['name']?> </td>
                        <?php
            }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2"><div id="hr"></div></td>
                    </tr>
                    <tr height="300" >
                        <td colspan="2"><pre>  <?php echo $row['content']?></pre></td>
                    </tr>
                     <?php
        }
        ?>
                </table>
                <form action="comment.php" method="post">
                    <table class="comment">
                       
                       <tr>
                           <td align="center"><?php echo $_SESSION['id']?></td>
                           
                           <td align="center">
                           <input type="hidden" name="curl" value="<?=$curl?>">
                           <input type="text" name="comment" id="comment"></td>
                           <td align="right"><button type="submit"> 
                               <i class="large material-icons">check</i></button><br></td>
                       </tr>
                         <?php
            
            $res=$_POST;
           $sql = 'select * from comment where number='.$_SESSION['idx'];
                        $go = $db -> prepare($sql);
                    $go->execute();

            
		
            while($row=$go->fetch()){
               $sql = "select * from user where id = '{$row['id']}'";
                        $goo = $db -> prepare($sql);
                    $goo->execute();
                    $re2 = $goo->fetch();
                ?>
                        <tr>
                            <td rowspan="2" align="center"><div class="profileimg"><img src="../profile/<?=$re2['profile']?>" alt="profile"></div></td>
                            <td> <?php echo $row['name']?> </td>
                             <?php
                if($_SESSION['id']==$row['id']){
                    ?>

                      
                        
                   
                  
                            <td align="right">
                            
                                <a href="delect_.php?idx=<?=$row['idx']?>&curl=<?=$curl?>"> 삭제</a>
                            </td>
                             <?php
                }
                    ?>   
                        </tr>
                        <tr>
                            <td colspan="3" align="left">
                                <?php echo $row['content']?>
                                
                                 
               
                    
                        </tr>
                             <?php
            }
                ?>
                    </table>
                </form>
            </article>
        </section>
        <aside>
            <?php
                 $sql = "select * from cafe where curl = '{$curl}'";
                $go = $db -> prepare($sql);
                $go->execute();
                $re = $go -> fetch();

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