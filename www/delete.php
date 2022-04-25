<?php
include "config.php";
session_start();
$id = $_GET['id'];
$sql = "delete from board where id='$id'";
$name = $_SESSION['name'];
mysqli_query($link, $sql);
if (!mysqli_query($link, $sql)) {
	die(mysqli_error());
} else {
	header("location: index.php");
}
