
    <?php include('includes/header.php'); 
        echo "
        <script>
                console.log(\"clicked!\");
                $ (\".active\").removeClass(\"active\");
                $(\"#albums\").addClass(\"active\");
            
    </script>"; ?>
    
    <h2 id = pageHeading style="text-align: left; padding-top: 90px; padding-left:70px; padding-bottom:20px; color: silver;">Albums</h2>
    <div class="gridViewContainer" style="margin-left:30px;">
    <?php
    $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY release_date desc");

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
    echo "</div></div></div>";
    
    ?>
    </div>

<!-- openPage(\"album_song_view.php?album_id=" . $row['id'] . "\") >