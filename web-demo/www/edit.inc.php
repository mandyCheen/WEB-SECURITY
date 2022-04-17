<?php

require_once('config.php');

if (isset($_POST['submit'])) {

	$id = $_POST['id'];
	$name = $_POST['name'];
	$content = $_POST['content'];

	$sql_ = "update board set content='$content' where id='$id'";
	if (!mysqli_query($link, $sql_)) {
		die(mysqli_error());
	} else {
		header("location: index.php");
	}
}
?>