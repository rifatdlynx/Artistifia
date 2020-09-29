<?php include('includes/header.php'); 
        echo "
        <script>
                $ (\".active\").removeClass(\"active\");
                $(\"#genre\").addClass(\"active\");
            
    </script>";
    ?>
    
    <h2 id = pageHeading style="text-align: left; padding-top: 90px; padding-left:70px; padding-bottom:20px; color: silver;"></h2>
    <div class="gridViewContainer" style="margin-left:30px; text-align: center;">

    <?php
        $genreQuery = mysqli_query($con, "SELECT Genre.id, Genre.name FROM Genre INNER JOIN Songs ON Songs.genre = Genre.id GROUP BY genre Order By sum(songs.id) desc");

        while($row = mysqli_fetch_array($genreQuery)){
        echo "
        <div class='gridViewItem' style=\"display: inline-block; width: 500px; margin-left: 10px; margin-right: 100px; margin-bottom: 20px;\">
        <span role='link' tabindex='0'  onclick='location.href=\"genre_song_view.php?genre_id=".$row['id']."\"'>
            <div class='gridViewInfo' 
            style=\"border: 5px solid #999999; background-color: #4f4f4f; color: white; font-weight: 300; text-align: center; padding: 5px 0; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;\">
            <h2 class = \"genreName\" style = \"background-color: #4f4f4f;\">".$row['name']."</h2> </div>
          </span>
        </div>
        ";
        }
    ?>
<style>
    .gridViewItem:hover, .gridViewInfo:hover, .genreName :hover{
        cursor: pointer;
        border: 3px outset white;
    }

 </style>