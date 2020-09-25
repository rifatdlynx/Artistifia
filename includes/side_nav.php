<div class="sidenav">
    <div style="background-color: #1f1f1f;">
        <table style="background-color: #1f1f1f;">
            <tr>
                <td style=" background-color: #1f1f1f;"><a href="#" class="active" style="padding-right:30px;">Albums</a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable" style="margin-top: 5px"><img src="assets/images/icon/album.png"></button></td>
            </tr>
            <tr>
                <td style=" background-color: #1f1f1f;"><a href="#" style="padding-right:30px;">Artists</a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable" style="margin-top: 5px"><img style=" background-color: #1f1f1f;" src="assets/images/icon/artists.png"></button></td>
            </tr>
            <tr>
                <td style=" background-color: #1f1f1f; border-bottom:1px solid #fff;"><a href="#" style="margin-bottom: 5px">Genre</a></td>
                <td style=" background-color: #1f1f1f; border-bottom:1px solid #fff;"><button class="editable" style="margin-bottom: 5px; padding-right:20px;"><img  style=" background-color: #1f1f1f;" src="assets/images/icon/genre.png"></button></td>
            </tr>
            
            <tr>
            <tr>
                <td style="padding-right:0px; background-color: #1f1f1f;"  ><a href="#"  style="margin-top: 5px">Create Playlist</a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable" style="margin-top: 5px"><img src="assets/images/icon/create_playlist.png"></button></td>
            </tr>
            
            <?php
                for ($x = 1; $x <= 3; $x+=1) {
                     echo "
                     
                     <tr>
                     
                        <td style= \"padding-right:0px; padding-bottom:3px; background-color: #1f1f1f;\">
                        <a href=\"#\">Playlist " , $x , "</a></td>
                    
                        <td style=\" background-color: #1f1f1f;\"><button class=\"editable\"><img src=\"assets/images/icon/editable15px.png\"></button></td>
                    
                    </tr>";
                }
            ?>
        </table>
    </div>
    
    
</div>
