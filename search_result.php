<link rel="stylesheet" href="assets/css/search.css">

<body>
    <?php include('includes/header.php');
    if(isset($_POST['search'])) {
        $search_term = $_POST['search'];
    }
    else {
        $search_term = "Looking For Somethings?";
    }
    ?>
  
    <form action="search_result.php" method = "post"> 
    <div class="wrapper">
        <div class="search_box">
            <input type="text" name="search" placeholder= "<?php echo "Search result for " . $search_term ; ?>">
            <input type="image" src="assets/images/icon/search.png" alt="search_submit" class="fa-search">
        </div>
    </div>
    </form>
    
    <?php
        if(isset($_POST['search'])) {
            $search_keyword = mysqli_real_escape_string($con , $_POST['search']);
            $search_result = mysqli_query($con , "SELECT songs.id As songId, songs.title, albums.name AS album, artists.name AS artist, 
        album_art_path, duration, file_path FROM songs INNER JOIN albums ON songs.album = albums.id INNER JOIN artists ON albums.artist = artists. id WHERE songs.title LIKE '%$search_keyword%' OR songs.featuring_artist LIKE '%$search_keyword%' OR albums.name LIKE '%$search_keyword%' OR artists.name LIKE '%$search_keyword%'");
            $search_query_result = mysqli_num_rows($search_result);
            $i=1;
            if($search_query_result > 0) {
                
                echo "
                    <div class=\"tracklistContainer\" style=\"padding: 0px 0px 5px 30px\" >
    <ul class=\"tracklist\" 
    style=\" background-color: #2b2b2b\">";
                    
                    echo "<li class='tracklistRow' style=\"padding: 5px 10px 5px 0px; margin-bottom: 5px; border-top: 1px solid #a0a0a0; border-bottom: 1px solid #a0a0a0;\">
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
                
                
                while($row = mysqli_fetch_array($search_result)) {
                    
                    
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
                        echo "&#9702 ".$row['album']."</span>
                    </div>
                    
					
					<div class='trackDuration'\">
						<span class='duration' style=\"font-size: 15px; \">" . $row['duration'] . "</span>
                    </div>
                    
				</li>";
                $i++;
		}
        echo "</ul>";
                    
            }
            else {
                echo "<h2 style=\"padding-left:80px; color: #FFF;\">No Song Found ...<h2>";
            }
        }
    
   ?>
    
    
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
                     }
                    
                    .tracklistRow .trackInfo span {
                        display: block;
                    }
                    
                    .tracklistRow .trackDuration {
                        width: 12%;
                        float: left;
                        text-align: right;
                    }
                    

                
                    </style>
      
</body>