<?php include('includes/header.php'); ?>
    <?php 
    $artist_id = $_GET['artist_id'];
    
    $artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE artists.id =".$artist_id );
    $artist = mysqli_fetch_array ($artistQuery,  MYSQLI_ASSOC);

    echo"
    <div class=\"entityInfo\"
    style = \"padding: 100px 0px 10px 30px; display: inline-block; width: 100%;\">

    <div class=\"leftSection\" 
    style =\"text-align: center; width: 100%; \">
	<img src=\"assets/" .$artist['image_path']."\" style = \"width: 200px; height:200px; object-fit: cover;  border-radius: 50%; \">
	</div>

    <div class=\"rightSection\"
    style = \"width: 100%;  padding: 5px 10px 5px 20px; box-sizing: border-box;\">   
        <h1 style =\"text-align: center; margin-top: 0px; color: silver\">". $artist['name']. "</h1>
		<p role=\"link\" tabindex=\"0\" ? style =\"color: #939393; font-weight: 200;\"></p>
        <p style =\"text-align:center; color: #939393; font-weight: 200;\">";
        $songQuery = mysqli_query($con, "SELECT count(songs.id) AS sum FROM songs INNER JOIN albums ON songs.album = albums.id
                    WHERE albums.artist =". $artist_id);
        echo mysqli_fetch_array ($songQuery,  MYSQLI_ASSOC)['sum']." songs</p>

	</div>

</div>


<div class=\"tracklistContainer\" style=\"padding: 0px 5px 0px 30px; margin-bottom: 100px ; \" >
    <ul class=\"tracklist\" 
    style=\" background-color: #2b2b2b\">";
		
		$songQuery = mysqli_query($con, "SELECT *, songs.id AS songId, CASE WHEN songs.id IN (Select songs.id FROM songs INNER JOIN 
        playlist_songs ON songs.id = playlist_songs.sid WHERE playlist_songs.pid = (SELECT id FROM playlist WHERE owner ="
        . $_SESSION['userId']." AND name = 'Liked Song')) THEN True ELSE False END AS Fav FROM songs
        INNER JOIN albums ON songs.album = albums.id WHERE albums.artist =". $artist_id." ORDER BY streams DESC LIMIT 5");
        
        echo " <h3 style=\"color: white; margin-left: 10px; padding-bottom: 5px; border-bottom: 1px solid #a0a0a0\"> Popular <h3>";
        
        
         $i=1;
         $song=array();
        while($row = mysqli_fetch_array($songQuery)) {
            $song[]= $row;
			echo "<li  class='tracklistRow'>
                    <div class='trackCount'>
                        <span class='trackNumber'style=\"font-size: 15px;\">
                        <audio class = 'Audio' id = 'Audio".$row['songId']."' src = \"assets/".$row['file_path']."\" ></audio>
                        <img class = 'PlayButton' id ='".$row['songId']."' src='assets/images/icon/play.png'>".$i."
                        </span>
                    </div>
                    
                    <div id= 'songs' class='trackInfo' >
                        
                        <span class='trackName' style=\"font-size: 17px; color: #fff;\">" . $row['title'] . "</span>
                        <span id ='streams".$row['songId']."' class='trackArtist' style=\"font-size: 14px;\">" . $row['streams'];
                        
                        echo "</span>
                    </div>
                    
					<div class='trackDuration'>
						<span class='duration' style=\"font-size: 15px;\">" . $row['duration'] . "</span>
                    </div>
                    
                    <div class = 'trackDuration' style = \"padding-top:-2px; margin-top:-5px;\">";
                    if($row['Fav']) echo "<img class ='heart' id='heart". $row['songId']."' src = 'assets/images/icon/close-heart.png'>";
                    else echo "<img class ='heart' id ='heart".$row['songId']."' src = 'assets/images/icon/open-heart.webp'>";
                    echo "</div>
                    
				</li>";
                $i++;
		}
        echo "</ul></div>";
        
        ?>
<!--onclick = 'play(".$i.", ".$row['songId'].")'!-->
<script src = "includes/PlayAndLikeSong.js"></script>
<!--
<script>
    var audio;
    var plays;
    function play(id, temp) {
        audio = document.getElementById("Audio" + id);
        var button = document.getElementById("play"+ id);
        
        if(audio.paused) {
            audio.play();
            button.src= "assets/images/icon/play.png";
            button.style.opacity = "60%";
        }
        else {
            audio.pause();
            button.src = "assets/images/icon/pause.png";
            button.style.opacity = "20%";
        }
        if(audio.currentTime === 0) {up(id, temp);};
    };
    function up(id, temp){
        $.post("includes/updateStreams.php", {songId: temp}, function(data){
            var newStream = data;
            plays = document.getElementById("streams" + id);
            console.log(plays.innerHTML + " newStream = " + newStream);
            plays.innerHTML = newStream;
        });

    };
    
    
</script>
!-->
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
                    
                    .tracklistRow span {
                        color: #939393;
                        font-weight: 200;
                    }
                    
                    .tracklistRow .trackCount {
                        width: 18%;
                        float: left;
                    }
                    
                    .tracklistRow .trackCount span {
                        visibility: visible;
                    }

                    .heart {
                        width: 35px;
                        cursor: pointer;
                        
                    }
                    .tracklistRow .trackCount img {
                        margin: 0 30px -5px 0px;
                        width: 20px;
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
                        padding-left: 15px;
                     }
                    .trackInfo {
                        width: 40%;
                    }
                    .tracklistRow .trackInfo span {
                        display: block;
                    }
                    
                    .tracklistRow .trackDuration {
                        width: 8%;
                        float: left;
                        text-align: center;
                    }
                    
                    </style>

<h3 style="margin-left: 40px; color: white; padding-top: 5px; padding-bottom: 8px; border-top: 1px solid #a0a0a0; "> Albums <h3>
<div class="gridViewContainer" style= "margin-left: 40px;">
  
    <?php
    $albumQuery = mysqli_query($con, "SELECT * FROM albums  WHERE artist =".$artist_id." ORDER BY release_date desc");

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
    echo "</div></div>";
    
    ?>
</div>
</body>
</html>
