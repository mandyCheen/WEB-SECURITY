<?php
session_start();
ini_set('date.timezone','Asia/Taipei');

if(isset($_POST["submit"])){
    $content = htmlspecialchars($_POST['content']);
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