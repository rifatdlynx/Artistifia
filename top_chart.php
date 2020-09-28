<link rel="stylesheet" href="assets/css/top_chart.css">

<?php include('includes/header.php') ?>
    
    <h2 class="body_header" style="padding-left:90px; padding-top:110px; padding-bottom:20px;">Top 20 Most Popular Song</h2>
    
    <div class="tracklistContainer">
	<ul class="tracklist">
    
    <?php
        $top_song_query = mysqli_query($con , "SELECT songs.id As songId, songs.title, albums.name AS                                            album, artists.name AS artist,
                                               album_art_path, duration, file_path FROM songs INNER JOIN albums ON songs.album = albums.id 
                                               INNER JOIN artists ON albums.artist = artists. id 
                                               ORDER BY streams DESC LIMIT 20");
            
            
        if(mysqli_num_rows($top_song_query) == 0) {
            echo "<span class='noResults'>No songs found</span>";
        }
            
            else if(mysqli_num_rows($top_song_query) > 0) {
                
                echo "
                    <div class=\"tracklistContainer\" style=\"padding: 0px 0px 5px 70px\" >      
                        <ul class=\"tracklist\" style=\" background-color: #2b2b2b\">
                            <li class='tracklistRow' style=\"margin-bottom: 0px; border-top: 0px solid #a0a0a0; border-bottom: 2px solid #a0a0a0;\">
					           <div class='trackCount'>
				                  <span class='trackNumber' style=\"padding: 0px 0px 0px 20px; font-size: 17px; font-weight: 600; letter-spacing:0.5px;\" >Play</span>                                 
                               </div>                   
				                <div class='trackInfo' style =\"margin: 0 0px 5px 10px; padding-left: 30px;\">        
				                <span class='trackName'style=\"padding: 0px 0px 0px 10px; font-size: 17px; font-weight: 600; letter-spacing:0.5px;\"> Track Name </span>
					           </div>
					           <div class='trackDuration'>
				                    <span class='duration' style='font-size: 17px; font-weight: 600; letter-spacing:0.5px;'> Duration </span>
                                </div> 
                            </li>";
                
                $i = 1;
                while($row = mysqli_fetch_array($top_song_query)) {
                    
                    
                    echo "<li  class='tracklistRow' style = \"height: 7vh;\">
                    <div class='trackCount' style= \"margin : 0 0px 0 0;\">
                        <span class='trackNumber'style=\"font-size: 15px;\">
                        <audio class = 'Audio' id = 'Audio".$row['songId']."' src = \"assets/".$row['file_path']."\" ></audio>
                        <img class = 'PlayButton' id ='".$row['songId']."' src='assets/images/icon/play.png'>".$i."
                        </span>
                    </div>
                    
                    <div id= 'songs' class='trackInfo' style =\"margin: 0 0px 5px -10px;\">
                        <img src = \"assets/".$row['album_art_path']."\" style = \"float: left; margin-right: 15px; ;width: 50px; height:50px; object-fit: cover; \">
                        <span class='trackName' style=\"font-size: 17px; color: #fff;\">" . $row['title'] . "</span>
                        <span class='trackArtist' style=\"font-size: 14px;\">" . $row['artist'];
                        if(isset($row['featuring_artist'])) echo ", ".$row['featuring_artist'];
                        echo " &#8226 ".$row['album']."</span>
                    </div>
                    
					
					<div class='trackDuration'\">
						<span class='duration' style=\"font-size: 15px; \">" . $row['duration'] . "</span>
                    </div>
                    
				    </li>";
                    $i++;
		        }
                
                echo "</ul>";
                    
            }
    
   ?>
        
    </div> 
    
</body>
