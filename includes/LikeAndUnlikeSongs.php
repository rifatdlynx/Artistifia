<?php

if($_POST['fun']=="like"){
      $pid = mysqli_query($con, "SELECT id FROM playlist WHERE owner ="
      . $_POST['userId']." AND name = 'Liked Song'");
      if($pid == false) echo "fail";
    $max = mysqli_query($con, "SELECT MAX(inOrder) AS max FROM playlist_songs WHERE pid = ".$pid);
    $max = mysqli_fetch_array($max, MYSQLI_ASSOC)['max']);
    $q = mysqli_query($con, "INSERT INTO playlist_songs(pid, sid, inOrder) VALUES (".$pid.", ".$_POST['songId'].", ".$max.")");
    
    }

 else {
    $q = mysqli_query($con, "DELETE FROM playlist_songs WHERE pid=".$pid." AND sid=".$_POST['songId']);
    
 }

?>