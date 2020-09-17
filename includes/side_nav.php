<div class="sidenav">
    <div style="background-color: #1f1f1f;">
        <table style="background-color: #1f1f1f;">
            <tr>
                <td style=" background-color: #1f1f1f;"><a href="#" class="active" style="padding-right:30px;">Liked Songs</a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable" style="margin-top: 5px"><img src="assets/images/liked_songs.png"></button></td>
            </tr>
            <tr>
                <td style=" background-color: #1f1f1f; border-bottom:1px solid #fff;"><a href="#" style="margin-bottom: 5px">History</a></td>
                <td style=" background-color: #1f1f1f; border-bottom:1px solid #fff;"><button class="editable" style="margin-bottom: 5px; padding-right:20px;"><img src="assets/images/history.png"></button></td>
            </tr>
            <tr>
            <tr>
                <td style="padding-right:0px; background-color: #1f1f1f;"  ><a href="#"  style="margin-top: 5px">Create Playlist</a></td>
                <td style=" background-color: #1f1f1f;"><button class="editable" style="margin-top: 5px"><img src="assets/images/create_playlist.png"></button></td>
            </tr>
            
            <?php
                for ($x = 1; $x <= 20; $x+=1) {
                     echo "
                     
                     <tr>
                     
                        <td style= \"padding-right:0px; padding-bottom:3px; background-color: #1f1f1f;\">
                        <a href=\"#\">Playlist " , $x , "</a></td>
                    
                        <td style=\" background-color: #1f1f1f;\"><button class=\"editable\"><img src=\"assets/images/editable15px.png\"></button></td>
                    
                    </tr>";
                }
            ?>
        </table>
    </div>
    
    
</div>
