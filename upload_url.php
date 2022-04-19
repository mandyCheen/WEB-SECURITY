<?php
//  chmod 777 uploads\(profile\)/
session_start();
ini_set('allow_url_fopen','true');
include_once 'config.php';
$id = $_SESSION['id'];

if(!isset($_POST['submit'])){
    header("Location: profile.php");
}

function GrabImage($url,$save_dir='',$filename=''){
    $ext = strrchr($url, ".");
    if($ext !=".jpg"):return false;
endif;
    if(trim($url)==''){
    return false;
    }
    $img = $save_dir.$filename;
    file_put_contents($img, file_get_contents($url));
}


if(isset($_POST['submit'])){
   $url = htmlspecialchars($_POST['url']);
   if(!GrabImage($url,'uploads(profile)/',"profile".$id."."."jpg")){
    header("Location: profile.php?uploadfail=3");
   }
   header("Location: profile.php?uploadsuccess");
}