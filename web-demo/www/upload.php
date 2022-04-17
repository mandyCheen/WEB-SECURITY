<?php
//  chmod 777 uploads\(profile\)/
session_start();
include_once 'config.php';
$id = $_SESSION['id'];

if(isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = "profile".$id.".".$fileActualExt;
                $fileDestination = 'uploads(profile)/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "UPDATE profileimg SET status = 0 WHERE userid = '$id';";
                $result = mysqli_query($link, $sql);
                header("Location: profile.php?uploadsuccess");
            }else{
                header("Location: profile.php?uploadfail=1");
                echo "上傳檔案過大，無法上傳";
            }
        }else{
            header("Location: profile.php?uploadfail=2");
            echo "上傳時發生錯誤";
        }
    }else{
        header("Location: profile.php?uploadfail=3");
        echo "無法上傳此類型檔案";
    }
}