<?php include('mysqlConnection.php'); 
    
    // = "Hani";
    if(isset($_SESSION['username'])) {
        $artistifia_username = $_SESSION['username'];
        $q = mysqli_query($con, "SELECT id FROM users WHERE username =\"". $_SESSION['username']."\"");
        if(!isset($_SESSION['userId'])){
          $_SESSION['userId'] = mysqli_fetch_array($q, MYSQLI_ASSOC)['id'];  
          $artistifia_userID = $_SESSION['userId'];
        }
        
        //$q = mysqli_query($con, "SELECT id FROM playlist WHERE owner =". $_SESSION['userId']." AND
            //name = 'Liked Song'");
        //$_SESSION['PlaylistId']= mysqli_fetch_array($q, MYSQLI_ASSOC)['id'];
        //echo "<script> console.log(".$_SESSION['PlaylistId']."); </script>";
        //echo "<script> console.log(".$_SESSION['userId']."); </script>";
    }
    else {
            header('location: login.php');
        }
?>


