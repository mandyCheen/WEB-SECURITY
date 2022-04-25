<?php
session_start();
ini_set('date.timezone','Asia/Taipei');

if(isset($_POST["submit"])){
    $content = $_POST['content'];
    $patterns = array();
    $replacements = array();
    $patterns[0] = '/(\[b\])(.*?)(\[\/b\])/';
    $patterns[1] = '/(\[i\])(.*?)(\[\/i\])/';
    $patterns[2] = '/(\[u\])(.*?)(\[\/u\])/';
    $patterns[3] = '~\[img\](https?://[^"><]*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s';
    $patterns[4] = '/\[color=(.*?)\](.*?)\[\/color\]/is';
    $replacements[4] = '<b>$2</b>';
    $replacements[3] = '<i>$2</i>';
    $replacements[2] = '<u>$2</u>';
    $replacements[1] = '<img src="$1" alt="" />';
    $replacements[0] = '<span style="color:$1;">$2</span>';
    $content = preg_replace($patterns, $replacements, $content);
    $file = $_FILES['file'];
    $fileName = htmlspecialchars($_FILES['file']['name']);
    $fileTmpName=$_FILES['file']['tmp_name'];
    $username = $_SESSION["usernameid"];
    $id = $_SESSION['id'];
    require_once('config.php');
    move_uploaded_file($fileTmpName,'uploads(file)/'.$fileName);
    $sql = "INSERT INTO board (username, userid, content,file, time) VALUES ('$username', '$id', '$content','$fileName',now() + INTERVAL 8 HOUR)";
    if(!mysqli_query($link, $sql)){
        die(mysqli_error());
    }
    else{
        header("location: index.php");
    }

}