<link rel="stylesheet" href="assets/css/top_chart.css">

<?php include('includes/header.php');

    //session_start();
    if(!isset($_SESSION['username'])) {
        header('location: login.php');
    }
    /*if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}*/
?>

    <h2 id = pageHeading style="text-align: left; padding-top: 30px; padding-left:30px; padding-bottom:20px; color: silver;">You May Like...</h2>
    <div class="gridViewContainer" style="margin-left:30px;">

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


        /*$rand_query = mysqli_query($con, "SELECT DISTINCT songs.title , songs.id AS sid , songs.album , songs.file_path , albums.album_art_path , albums.name FROM songs INNER JOIN albums ON songs.album = albums.id ORDER BY RAND() LIMIT 10;");

    while($row = mysqli_fetch_array($rand_query)) {

        echo "<div class='gridViewItem'
        style=\"display: inline-block; margin-right: 20px; width: 29%; max-width: 200px; min-width: 150px; margin-bottom: 20px; \">
        <span role='link' tabindex='0'  onclick='location.href=\"album_song_view.php?album_id=".$row['sid']. "\"'>
        <audio class = 'Audio' id = 'Audio".$row['sid']."' src = \"assets/".$row['file_path']."\" ></audio>
            <img src=\"assets/". $row['album_art_path'] ."\" style=\"width: 100%;\">
            <div class='gridViewInfo'
            style=\"color: white; font-weight: 300; text-align: center; padding: 5px 0; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;\">"
                . $row['name'] .
            "</div>
          </span>
        </div>";

        }

    echo "</div></div></div>";*/

    ?>

    <?php
        $top_song_query = mysqli_query($con , "SELECT songs.id As songId, songs.title as title, albums.name AS album, artists.name AS artist,
                                               album_art_path, duration, file_path FROM songs INNER JOIN albums ON songs.album = albums.id
                                               INNER JOIN artists ON albums.artist = artists. id
                                               ORDER BY RAND() LIMIT 15");

        if(mysqli_num_rows($top_song_query) > 0) {
                while($row = mysqli_fetch_array($top_song_query)) {


                    echo "
                        <div style=\"display: inline-block; margin-right: 20px; width: 29%; max-width: 200px; min-width: 150px; margin-bottom: 20px; \">
                          <span tabindex='0'>
                            <audio class = 'Audio' id = 'Audio".$row['songId']."' src = \"assets/".$row['file_path']."\" ></audio>
                            <img class = 'PlayButton' id ='".$row['songId']."' src='assets/images/icon/play.png' style='position:absolute;width:200px;z-index:2; opacity:0.1'; > </span>
                            <img src=\"assets/". $row['album_art_path'] ."\" style=\"width: 200px; height:200px; object-fit: cover;  border-radius: 5px; position:relative;z-index:1;' \">
                            <div class='gridViewInfo'
                            style=\"color: white; font-weight: 300; text-align: center; padding: 5px 0; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;\">"
                                . $row['title'] .
                            "</div>
                        </span>
                    </div>";

		        }

            }

   ?>

    </div>


    <script>


        var audio;
        var plays;
        var playbutton;
        playbutton = $('.PlayButton');
        if(playbutton.length>1) console.log("worked!");
        else console.log("not worked!");
        $('.PlayButton').on("click", function(event){
            console.log(event.target.id);
            var id = "Audio" + event.target.id;
            audio = document.getElementById(id);

            if(audio.paused){
                $('.Audio').each(function () {
                    if (!this.paused &&  this.duration > 0) {
                    this.pause();
                    id = (this.id).substring(5);
                    console.log("id of song that was playing = " + id);
                    playbutton = document.getElementById(id);
                    playbutton.src = "assets/images/icon/pause.png";
                    playbutton.style.opacity = "0%";
                    }
                    });
                audio.play();
                event.target.src= "assets/images/icon/play.png";
                event.target.style.opacity = "10%";
            }
            else {
                audio.pause();
                event.target.src= "assets/images/icon/pause.png";
                event.target.style.opacity = "10%";
            }
            if(audio.currentTime === 0) {up(event.target.id);};
        });


        function up(id){
            $.post("includes/updateStreams.php", {songId: id}, function(data){
                var newStream = data;
                plays = document.getElementById("streams" + id);
                console.log(plays.innerHTML + " newStream = " + newStream);
                plays.innerHTML = newStream;
            });

        };

        $('.Audio').on("ended", function () {
                    id = (this.id).substring(5);
                    console.log("id of song that ended = " + id);
                    var playbutton = document.getElementById(id);
                    playbutton.style.opacity = "10%";
                    });

        $('.heart').on("click", function(event){
            id = (event.target.id).substring(5);
            console.log(event.target.id);
            var element = document.getElementById(event.target.id);
            console.log(this.src);
            if(element.src == "http://localhost/artistifia/assets/images/icon/close-heart.png"){
                //already like
                $.post("includes/LikeAndUnlikeSongs.php", {songId: id, fun: "unlike"});
                element.src = 'assets/images/icon/open-heart.webp';
            }
            else {
                $.post("includes/LikeAndUnlikeSongs.php", {songId: id, fun: "like"});
                element.src = "assets/images/icon/close-heart.png";
            }

        });


    </script>





<?php/* include('includes/footer.php');
 openPage(\"album_song_view.php?album_id=" . $row['id'] . "\") */ ?>
