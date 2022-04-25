<?php

if(isset($_POST["submit"])){

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $passwordrepeat = htmlspecialchars($_POST['passwordrepeat']);

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

