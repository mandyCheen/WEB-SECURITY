<?php
session_start();
ini_set('date.timezone','Asia/Taipei');
require_once('config.php');

$tsql = "SELECT * FROM admin WHERE id = 1";
$tresult = mysqli_query($link, $tsql);
while($row = mysqli_fetch_assoc($tresult)){
    $title = $row['title'];
}
echo "<h1>".$title."</h1>";

if($_GET["error"] == "none"){
    echo "<p>完成註冊</p>";
}


if(isset($_SESSION["usernameid"])){
echo 'Hello, ';
echo $_SESSION["usernameid"];
echo "<br>";

ini_set('date.timezone','Asia/Taipei');
echo htmlspecialchars(date('G:i'));
echo "<br>";

if($_SESSION["usernameid"] == "test" ){
    echo "<a href='admin.php'>更改標題</a><br>";
}

echo "<a href='profile.php'>Profile page</a><br>";
echo "<a href='logout.inc.php'>Log out</a>";
?>
<link rel="stylesheet" type="text/css" href="style.css">
<form action="board.inc.php" method="post" enctype="multipart/form-data">
    <input id="content" type="text" name="content" placeholder="寫下你想說的話...">
    <br>
    <input type = "file" name ="file">
    <button type="submit" name="submit">送出</button> 
</form>

<h2>留言板</h2>
<?php

$sql = "SELECT * from board";
$name = $_SESSION["usernameid"];
$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_assoc($result)){
    $id = $row['userid'];
    $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
    $resultImg = mysqli_query($link, $sqlImg);
    while($rowImg = mysqli_fetch_assoc($resultImg)){
        echo "<div class = 'user-container'>";
            if($rowImg['status'] == 0){
                echo "<img src='uploads(profile)/profile".$id.".jpg?".mt_rand()."'>";
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
            echo ' <a href=" display.php?id=' . $row['id'] . '&name=' . $name . '&userid='.$id.'"> 顯示留言 </a><br>';
        echo"</div>";
        }

}


}
else{
    
echo '登入查看留言板 <br>';
echo htmlspecialchars(date('G:i'));
echo "<br>";
echo "<a href='signup.php'>Sign up</a><br>";
echo "<a href='login.php'>Log in</a>";
}





