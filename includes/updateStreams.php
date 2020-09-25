<?php
include("mysqlConnection.php");

if(isset($_POST['songId'])) {
	$songId = $_POST['songId'];

	$query = mysqli_query($con, "UPDATE songs SET streams = streams + 1 WHERE id='$songId'");

	$songQuery = mysqli_query($con, "SELECT streams FROM songs WHERE id='$songId'");
	
	echo mysqli_fetch_array ($songQuery,  MYSQLI_ASSOC)['streams'];
}
?>