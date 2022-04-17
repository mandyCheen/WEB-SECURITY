<?php

if(isset($_POST["submit"])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['passwordrepeat'];

    require_once('config.php');
    require_once('functions.inc.php');


    if(invalidUid($username) !== false){
        header("location: signup.php?error=invaliduid");
        exit();
    }

    if(pwdMatch($password, $passwordrepeat) !== false){
        header("location: signup.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($link, $username, $email) !== false){
        header("location: signup.php?error=usernametaken");
        exit();
    }

    createUser($link, $username, $password);

}
else{
    header("location: signup.php");
    exit();
}

