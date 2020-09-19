<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistifia</title>
    <meta name = "description" content="The best place for streaming music.">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/sidenav.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/footer.css" media="screen">
</head>

<body>
    <?php include('includes/header.php') ?>
    <?php include('includes/side_nav.php') ?>
    <?php include('includes/footer.php') ?>
    
    
    <div class="album_art">
        <?php
            for ($x=1;$x<=7;$x+=1) {
                echo "
                <div class=\"single_album_art\">
                <img src=\"assets/album_art/".$x.".jpg\">
                <p style= \" color : #FFF\"> Music Name " .$x. "
                </div>
                ";
            }
        ?>
    </div>
    
    
    <div class="album_art">
        <?php
            for ($x=9;$x>=3;$x-=1) {
                echo "
                <div class=\"single_album_art\">
                <img src=\"assets/album_art/".$x.".jpg\">
                <p style= \" color : #FFF\"> Music Name " .$x. "
                </div>
                ";
            }
        ?>
    </div>
    
    <div class="album_art">
        <?php
            for ($x=3;$x<=8;$x+=1) {
                echo "
                <div class=\"single_album_art\">
                <img src=\"assets/album_art/".$x.".jpg\">
                <p style= \" color : #FFF\"> Music Name " .$x. "
                </div>
                ";
            }
        ?>
    </div>
    
</body>
