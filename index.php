<?php include('includes/header.php');

    session_start();
    if(!isset($_SESSION['username'])) {
        header('location: login.php');
    }
    /*if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}*/
?>
    
    <h2 id = pageHeading style="text-align: left; padding-top: 90px; padding-left:70px; padding-bottom:20px; color: silver;"></h2>
    <div class="gridViewContainer" style="text-align: center;">
    
    <?php
    /*$songQuery = mysqli_query($con, "SELECT songID FROM Listening_History ORDER BY dateListened desc Limit 7");
    if(!$songQuery)
    else{
    while($row = mysqli_fetch_array($albumQuery)) {
        
        echo "<div class='gridViewItem' 
        style=\"display: inline-block; margin-right: 20px; width: 29%; max-width: 200px; min-width: 150px; margin-bottom: 20px; \">
        <span role='link' tabindex='0'  onclick='location.href=\"album_song_view.php?album_id=".$row['id']. "\"'>
            <img src=\"assets/". $row['album_art_path'] ."\" style=\"width: 100%;\">
            <div class='gridViewInfo' 
            style=\"color: white; font-weight: 300; text-align: center; padding: 5px 0; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;\">"
                . $row['name'] .
            "</div>
          </span>
        </div>";
        }
    }*/
    echo "</div></div></div>";
    
    ?>
    </div>
<?php/* include('includes/footer.php'); 
 openPage(\"album_song_view.php?album_id=" . $row['id'] . "\") */ ?>