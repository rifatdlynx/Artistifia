<div class="sidenav" >
    <div style="background-color: #1f1f1f;">
        <table style="background-color: #1f1f1f;">
            <tr >
                <td style=" background-color: #1f1f1f;">
                <a href="Albums_list.php" id='albums' style="padding-right:30px;">Albums</a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable" style="margin-top: 5px"><img src="assets/images/icon/album.png"></button></td>
            </tr>
            <tr>
                <td style=" background-color: #1f1f1f;">
                <a href="Artists_list.php" id='artists' style="padding-right:30px;">Artists</a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable" style="margin-top: 5px"><img style=" background-color: #1f1f1f;" src="assets/images/icon/artists.png"></button></td>
            </tr>
            <tr>
                <td style=" background-color: #1f1f1f; border-bottom:1px solid #fff;">
                <a href="Genre_list.php" id='genre' style="margin-bottom: 5px">Genre</a></td>
                <td style=" background-color: #1f1f1f; border-bottom:1px solid #fff;"><button class="editable" style="margin-bottom: 5px; padding-right:20px;"><img  style=" background-color: #1f1f1f;" src="assets/images/icon/genre.png"></button></td>
            </tr>

            <tr>
            <tr>
                <td style="padding-right:0px; background-color: #1f1f1f;" ><a href="liked_song.php" style="margin-top: 5px">Liked Songs</a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable" style="margin-top: 5px"><img src="assets/images/icon/liked_songs.png"></button></td>
            </tr>

            <tr>
                <td style= "padding-right:0px; padding-bottom:3px; background-color: #1f1f1f;">
                <a href="userDetails.php"><?php echo $_SESSION['username']; ?></a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable"><img src="assets/images/icon/01_account.png" style="width: 15px; height: 15px; background-color: #1f1f1f;"></button></td>

            </tr>
        </table>
    </div>


</div>
