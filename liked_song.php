<?php include('includes/header.php'); ?>
<?php 
    echo"
    <div class=\"entityInfo\"
    style = \"padding: 100px 0px 10px 30px; display: inline-block; width: 100%;\">

    <div class=\"rightSection\"
    style = \"width: 100%;  padding: 5px 10px 5px 20px; box-sizing: border-box;\">   
        <h1 style =\"text-align: center; margin-top: 0px; color: silver\"> Liked Songs</h1>
		<p role=\"link\" tabindex=\"0\" ? style =\"color: #939393; font-weight: 200;\"></p>
        <p style =\"text-align:center; color: #939393; font-weight: 200;\">";
        $songQuery = mysqli_query($con, "SELECT count(songs.id) AS sum FROM songs INNER JOIN playlist_songs ON 
        songs.id = playlist_songs.sid WHERE playlist_songs.pid = (SELECT id FROM playlist WHERE owner ="
        .$_SESSION['userId']." AND name = 'Liked Song')");
        echo mysqli_fetch_array ($songQuery,  MYSQLI_ASSOC)['sum']." songs</p>

	</div>

</div>

<div class='tracklistContainer' style=\"padding: 0px 0px 5px 30px;\" >
    <ul class=\"tracklist\" 
    style=\" background-color: #2b2b2b;\">";
        
    
		$songQuery = mysqli_query($con, "SELECT songs.id As songId, songs.title, songs.featuring_artist, albums.name AS album,
        artists.name AS artist, album_art_path, duration, file_path, playlist_songs.inOrder FROM songs INNER JOIN albums ON songs.album = albums.id 
        INNER JOIN artists ON albums.artist = artists. id INNER JOIN playlist_songs ON 
        songs.id = playlist_songs.sid WHERE playlist_songs.pid = (SELECT id FROM playlist WHERE owner ="
        .$_SESSION['userId']." AND name = 'Liked Song')");
        
        echo "<li class='tracklistRow' style=\"padding: 5px 10px 5px 0px; margin-bottom: 5px; 
        border-top: 1px solid #a0a0a0; border-bottom: 1px solid #a0a0a0;\">
					<div class='trackCount'>
						<span class='trackNumber' style=\"padding: 0px 0px 0px 63px;\" > </span>
                    </div>
                    
					<div class='trackInfo' style =\"margin: 0 0px 5px 10px; padding-left: 40px;\">
						<span class='trackName'style=\"padding: 0px 0px 0px 10px;\"> Track Name </span>
						
					</div>
					
					<div class='trackDuration' style =\"\">
						<span class='duration'> Duration </span>
                    </div>
                    
                </li>";
        
         $i=1;
        
        while($row = mysqli_fetch_array($songQuery)) {
            
			echo "<li  class='tracklistRow' style = \"height: 9vh;\">
                    <div class='trackCount' style= \"margin : 0 0px 0 0;\">
                        <span class='trackNumber'style=\"font-size: 15px;\">
                        <audio class = 'Audio' id = 'Audio".$row['songId']."' src = \"assets/".$row['file_path']."\" ></audio>
                        <img class = 'PlayButton' id ='".$row['songId']."' src='assets/images/icon/play.png' > </span>
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
                    <div class = 'trackDuration' style = \"padding-top:-2px; margin-top:-5px;\">
                    <img class ='heart' id='heart". $row['songId']."' src = 'assets/images/icon/close-heart.png'>";
                    "</div>
				</li>";
                $i++;
		}
        echo "</ul>";
        ?>
<script src = "includes/PlayAndLikeSong.js"></script>
<script>
    $('.heart').on("click", function(){
        location.reload();
        
    });</script>

<style>
                    .tracklistRow {
                        height: 5vh;
                        padding: 15px 10px;
                        list-style: none;
                        background-color: #2b2b2b;
                    }
                    #songs:hover{
                        border: outset;
                    }
                    .heart {
                        width: 35px;
                        cursor: pointer;
                        
                    }
                    .tracklistRow span {
                        
                        color: #939393;
                        font-weight: 200;
                    }
                    
                    .tracklistRow .trackCount {
                        
                        width: 12%;
                        float: left;
                    }
                    
                    .tracklistRow .trackCount span {
                        visibility: visible;
                    }
                    
                    .tracklistRow .trackCount img {
                        margin: 15px 0px -5px 40px;
                        width: 25px;
                        cursor: pointer;
                        opacity : 10%;
                    }
                    .tracklistRow .trackCount img:hover {
                        opacity :100%;
                    }
                    .tracklistRow .trackInfo {
                        width: 65%;
                        float: left;
                        color: #fff;
                        margin-left: -4px;
                        margin-bottom: 7px;
                     }
                    
                    .tracklistRow .trackInfo span {
                        display: block;
                    }
                    
                    .tracklistRow .trackDuration {
                        width: 9%;
                        float: left;
                        text-align: right;
                    }
                    

                
                    </style>
</div>

</body>
</html>
