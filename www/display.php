<?php
$name = $_GET['name'];
$id = $_GET['id'];
$userid = $_GET['userid'];
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <?php
$query = "SELECT * FROM board WHERE  id=" . $id; //選出該位使用者所留下的所有留言
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $sqlImg = "SELECT * FROM profileimg WHERE userid = '$userid'";
    $resultImg = mysqli_query($link, $sqlImg);
    while($rowImg = mysqli_fetch_assoc($resultImg)){
        echo "<div class = 'user-container'>";
            if($rowImg['status'] == 0){
                echo "<img src='uploads(profile)/profile".$userid.".jpg?".mt_rand()."'>";
            }else{
                echo "<img src='uploads(profile)/profiledefault.png'>";
            }
            echo "<br>NAME: ". $row['username'];
            echo "<br>CONTENT: ". $row['content'] . "<br>";
            echo "TIME: ".$row['time'] . "<br>";
            if($row['file']!=NULL){
                echo '<a href="download.php?filename=uploads(file)/'.$row['file'].'"> 下載檔案 </a><br>';
            }
            if($name == $row['username']){
                //編輯&刪除
            echo ' <a href=" edit.php?id=' . $row['id'] . '&name=' . $name . '"> Edit </a> &nbsp|&nbsp 
            <a href="delete.php?id=' . $row['id'] . '">Delete</a><br>';
            }
            echo "<a href='index.php'>Home page</a>";
        echo"</div>";
        }

}

?>
</body>
</html>