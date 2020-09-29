<?php
    //$user = $_POST['user'];
    $user = 4;
	$con = mysqli_connect("localhost", "root", "", "artistifia");
    $songQuery = mysqli_query($con, "SELECT *, CASE WHEN songs.id IN (Select songs.id FROM songs INNER JOIN playlist_songs
        ON songs.id = playlist_songs.sid WHERE playlist_songs.pid = (SELECT id FROM playlist WHERE owner = 4 AND name = 'Liked Song')) THEN True ELSE False END AS Fav  
        FROM songs WHERE album = 4 ORDER BY track_no");
        if($songQuery == false) echo "failed";
        else echo "success";
        