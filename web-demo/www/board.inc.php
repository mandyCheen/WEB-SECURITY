<?php
session_start();
ini_set('date.timezone','Asia/Taipei');

if(isset($_POST["submit"])){
    $content = $_POST['content'];
    $username = $_SESSION["usernameid"];
    $id = $_SESSION['id'];
    require_once('config.php');
    $sql = "INSERT INTO board (username, userid, content, time) VALUES ('$username', '$id', '$content',now() + INTERVAL 8 HOUR)";
    if(!mysqli_query($link, $sql)){
        die(mysqli_error());
    }
    else{
        header("location: index.php");
    }

}