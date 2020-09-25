
    <?php include('includes/header.php'); ?>
    
    <h2 id = pageHeading style="text-align: left; padding-top: 90px; padding-left:70px; padding-bottom:20px; color: silver;">Albums</h2>
    <div class="gridViewContainer" style="text-align: center;">
    <?php
    $albumQuery = mysqli_query($con, "SELECT * FROM artists ORDER BY name");

    while($row = mysqli_fetch_array($albumQuery)) {
        
        echo "<div class='gridViewItem' 
        style=\"display: inline-block; margin-right: 20px; width: 29%; max-width: 200px; min-width: 150px; margin-bottom: 20px; \">
        <span role='link' tabindex='0'  onclick='location.href=\"artist_song_view.php?artist_id=".$row['id']. "\"'>
            <img src=\"assets/". $row['image_path'] ."\" style=\"width: 200px; height:200px; object-fit: cover;  border-radius: 50%; \">
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
</body>
</html>
