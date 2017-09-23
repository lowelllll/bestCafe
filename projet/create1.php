<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo '<script>
        alert("로그인을 하십시오.");</script>';
        echo "<script>location.href='index.php'</script>";
        exit(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create cafe</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="./css/common.css">
     <link rel="stylesheet" href="./css/cafe_create.css">    
</head>
<body>
  <div id="wrap">
        <header>
            <h1>Cafe Create</h1>
            <button class="out"><i class="large material-icons ">close</i></button>
        </header>
        <section>
            <article>
                
                <form action="create.php" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr height="100">
                            <td><label for="cname">카페명</label></td>
                            <td align="right"><input type="text" id="cname" name="cname" required></td>
                        </tr>
                        <tr>
                            <td><label for="cexp">카페 설명</label></td>
                            <td  align="right"><textarea style="resize:none" name="cexp" id="cexp" cols="30" rows="10" required></textarea></td>
                        </tr>
                        <tr height="100">
                            <td><label for="curl">카페 주소</label></td>
                            <td align="right"> <input type="text" name="curl" id="curl" required></td>
                        </tr>
                        <tr>
                           <td><label for="file">카페 커버</label></td>
                           <td align="right"><input type="file" id="file" name="file" required></td>
                        </tr>
                    </table>
                    
            </article>
        </section>
        <footer>
                  <button type="submit"><i class=" material-icons">check</i></button>
                  </form>
        </footer>
  </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="./js/common.js"></script>
