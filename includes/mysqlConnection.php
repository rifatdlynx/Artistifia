<?php
	ob_start();
	session_start();

	$con = mysqli_connect("localhost", "root", "", "Artistifia");
	
	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
    }
?>