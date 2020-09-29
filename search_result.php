<link rel="stylesheet" href="assets/css/search.css">

<body>
    <?php include('includes/header.php');
    if(isset($_POST['search'])) {
	   $term = urldecode($_POST['search']);
    }
    else {
	   $term = "";
    }
    ?>

    <form action="search_result.php" method = "post">
    <div class="wrapper" style="padding-right:50px;height:8vh;">
        <div class="search_box">
            <input type="text" name="search" placeholder= "<?php echo "Search result for '" . $term . "'" ; ?>">
            <input type="image" src="assets/images/icon/search.png" alt="search_submit" class="fa-search">
        </div>
    </div>
    </form>

    <? php if($term == "") exit(); ?>

    <div class="tracklistContainer" style="padding-top:50px;">
	<h2 style="color: #FFF; background-color: #2b2b2b; padding-left:60px;">Songs</h2>
	<ul class="tracklist">

    <?php
        $search_keyword = mysqli_real_escape_string($con , $_POST['search']);
        $song_query = mysqli_query($con , "SELECT songs.id As songId, songs.title, albums.name AS album, artists.name AS artist,
                                           album_art_path, duration, file_path FROM songs INNER JOIN albums ON songs.album = albums.id
                                           INNER JOIN artists ON albums.artist = artists. id
                                           WHERE songs.title LIKE '%$search_keyword%' LIMIT 5");


        if(mysqli_num_rows($song_query) == 0) {
            echo "<span class='noResults'>No songs found matching " . $term . "</span>";
        }

            else if(mysqli_num_rows($song_query) > 0) {

                echo "
                    <div class=\"tracklistContainer\" style=\"padding: 0px 0px 5px 0px\" >
                        <ul class=\"tracklist\" style=\" background-color: #2b2b2b\">
                            <li class='tracklistRow' style=\"padding: 5px 10px 5px 0px; margin-bottom: 0px; border-top: 0px solid #a0a0a0; border-bottom: 0px solid #a0a0a0;\">
					           <div class='trackCount'>
				                  <span class='trackNumber' style=\"padding: 0px 0px 0px 63px;\" >Play</span>
                               </div>
				                <div class='trackInfo' style =\"margin: 0 0px 5px 10px; padding-left: 40px;\">
				                <span class='trackName'style=\"padding: 0px 0px 0px 10px;\"> Track Name </span>
					           </div>
					           <div class='trackDuration' style =\"\">
				                    <span class='duration'> Duration </span>
                                </div>
                            </li>";


                while($row = mysqli_fetch_array($song_query)) {


                    echo "<li  class='tracklistRow' style = \"height: 7vh;\">
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

				    </li>";
		        }

                echo "</ul>";

            }

   ?>

    </div>

















    <div class="tracklistContainer" style="text-align: left">
	<h2 style="color: #FFF; padding-top:50px; background-color: #2b2b2b;">Artists</h2>

      <?php
            $search_keyword = mysqli_real_escape_string($con , $_POST['search']);
            $artist_query = mysqli_query($con , "SELECT * FROM artists WHERE artists.name LIKE '%$search_keyword%' LIMIT 7");


            if(mysqli_num_rows($artist_query) == 0) {
                echo "<span class='noResults' style='padding-bottom:30px;'>No artists found matching " . $term . "</span>";
		    }

            else if(mysqli_num_rows($artist_query) > 0) {


                while($row = mysqli_fetch_array($artist_query)) {


                    echo "<div class='gridViewItem' style=\"display: inline-block; margin-right: 20px; width: 29%; max-width: 200px; min-width: 150px; margin-bottom: 20px; text-align: center;\">
                            <span role='link' tabindex='0'  onclick='location.href=\"artist_song_view.php?artist_id=".$row['id']. "\"'>
                                <img src=\"assets/". $row['image_path'] ."\" style=\"width: 150px; height:150px; object-fit: cover;  border-radius: 50%; \">
                                <div class='gridViewInfo' style=\"color: #d1d1d1; font-size:13px; font-weight: 400; text-align: center; padding: 15px 0; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; text-align: center;\">".$row['name']."</div>
                            </span>
                        </div>";




                    /*
                    <li  class='tracklistRow' style = \"height: 9vh;\">
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

				    </li>";

                    */
		        }

            }
            else {
                echo "";
            }

   ?>
        </div>















        <div class="tracklistContainer" style="text-align: left">
	       <h2 style="color: #FFF; background-color: #2b2b2b;">Albums</h2>
	       <ul class="tracklist" style="background-color: #2b2b2b;">

            <?php
            $search_keyword = mysqli_real_escape_string($con , $_POST['search']);
            $album_query = mysqli_query($con , "SELECT * FROM albums WHERE albums.name LIKE '%$search_keyword%' LIMIT 7");


            if(mysqli_num_rows($album_query) == 0) {
                echo "<span class='noResults'>No album found matching " . $term . "</span>";
		    }

            else if(mysqli_num_rows($song_query) > 0) {


                while($row = mysqli_fetch_array($album_query)) {


                    echo "<div class='gridViewItem' style=\"display: inline-block; margin-right: 20px; width: 29%; max-width: 200px; min-width: 150px; margin-bottom: 20px; text-align: center;\">
                             <span role='link' tabindex='0'  onclick='location.href=\"album_song_view.php?album_id=".$row['id']. "\"'>
                                 <img src=\"assets/". $row['album_art_path'] ."\" style=\"width: 150px; height: 150px;\">
                                    <div class='gridViewInfo' style=\"color: #d1d1d1; font-size:13px;  font-weight: 400; text-align: center; padding: 5px 0; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;\">"
                                        . $row['name'] .
                                    "</div>
                              </span>
                          </div>";
            };
            }
            else {
                echo "";
            }

            ?>
        </div>


























<script>
    var audio;
    var plays;

    $('.PlayButton').on("click", function(event){

        var id = "Audio" + event.target.id;
        audio = document.getElementById(id);

        if(audio.paused){
            $('.Audio').each(function () {
                if (!this.paused &&  this.duration > 0) {
                this.pause();
                id = (this.id).substring(5);
                console.log("id of song that was playing = " + id);
                var playbutton = document.getElementById(id);
                playbutton.src = "assets/images/icon/pause.png";
                playbutton.style.opacity = "20%";
                }
                });
            audio.play();
            event.target.src= "assets/images/icon/play.png";
            event.target.style.opacity = "60%";
        }
        else {
            audio.pause();
            event.target.src= "assets/images/icon/pause.png";
            event.target.style.opacity = "20%";
        }
        if(audio.currentTime === 0) {up(event.target.id);};
    });

    function up(id){
        $.post("includes/updateStreams.php", {songId: id});

    };

</script>

</body>
