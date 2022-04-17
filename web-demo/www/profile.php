<?php
    session_start();
    include_once 'config.php';
    if(isset($_GET["uploadsuccess"])){
        echo "<p>上傳成功</p>";
    }
    else if(isset($_GET["uploadfail"])){
        if($_GET["uploadfail"] == "1"){
            echo "<p>上傳檔案過大，無法上傳</p>";
        }
        else if($_GET["uploadfail"] == "2"){
            echo "<p>上傳時發生錯誤</p>";
        }
        else if($_GET["uploadfail"] == "3"){
            echo "<p>無法上傳此類型檔案</p>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($link, $sql);
            $id = $_SESSION["id"];
            $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
            $resultImg = mysqli_query($link, $sqlImg);
            while($rowImg = mysqli_fetch_assoc($resultImg)){
            echo "<div class = 'user-container'>";
                if($rowImg['status'] == 0){
                    echo "<img src='uploads(profile)/profile".$id.".jpg?'".mt_rand().">";
                }else{
                    echo "<img src='uploads(profile)/profiledefault.png'>";
                }
                echo "<p>".$_SESSION["usernameid"]."</p>";
            echo"</div>";
            }
 ?>
    <p>選擇圖片上傳頭像(jpg)</p>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <br>
        <button type="submit" name="submit">上傳</button>
        <br>
    </form>
    <a href='index.php'>Home page</a>
</body>
</html>