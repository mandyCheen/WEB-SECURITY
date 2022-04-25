<?php

require_once('config.php');

if(isset($_POST["submit"])){
    $title = htmlspecialchars($_POST['title']);
    $sql = "UPDATE admin SET title = '$title' WHERE id = 1;";
    $result = mysqli_query($link, $sql);
    header("location: index.php");
}