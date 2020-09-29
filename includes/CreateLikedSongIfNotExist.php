<?php
    $user = $_POST['user'];
	$con = mysqli_connect("localhost", "root", "", "artistifia");
    $q = mysqli_query($con, "SELECT id FROM playlist WHERE owner =".$user." AND name = 'Liked Song'" );
    if($q == false){
    mysqli_query($con, "INSERT INTO playlist (name, owner) VALUES (\"Liked song\", ".$user.")");
    }
    $q = mysqli_query($con, "SELECT id FROM playlist WHERE owner =".$user." AND name = 'Liked Song'" );
    if($q == false) echo "failed";
    else echo "success".mysqli_fetch_assoc($q)['id'];
    
    
	
?>