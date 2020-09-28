<?php include('mysqlConnection.php'); 
    
    if(isset($_SESSION['user']) && isset($_SESSION['PlaylistId']) ) {
        echo "<script> console.log(".$_SESSION['user']."); </script>";
    }
    else {
        $_SESSION['user']=1;
        $q = mysqli_query($con, "SELECT playlist.id FROM playlist WHERE playlist.owner =". $_SESSION['user']." AND
         playlist.name = 'Liked Song'");
        $_SESSION['PlaylistId']= mysqli_fetch_array($q, MYSQLI_ASSOC)['id'];
        console.log($_SESSION['PlaylistId']);
        }
?>