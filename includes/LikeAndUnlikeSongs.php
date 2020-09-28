<?php

include('userInSession.php');

if($_POST['fun']=="like"){
    $max = mysqli_query($con, "SELECT MAX(inOrder) AS max FROM playlist_songs WHERE pid =".$_SESSION['PlaylistId']);
    $max = mysqli_fetch_array($max, MYSQLI_ASSOC)['max'];
    $q = mysqli_query($con, "INSERT INTO playlist_songs(pid, sid, inOrder) VALUES (".$_SESSION['PlaylistId'].", ".$_POST['songId'].", ".$max.")");
    
    }

 else {
    $q = mysqli_query($con, "DELETE FROM playlist_songs WHERE pid=".$_SESSION['PlaylistId']." AND sid=".$_POST['songId']);
    
 }

?>