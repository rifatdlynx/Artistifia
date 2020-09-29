<!doctype html>
<?php include('includes/userInSession.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title = "Artistifia - Home"; echo $title; ?></title>
    <meta name = "description" content="The best place for streaming music.">
    <link rel="icon" type="image/x-icon" href="assets/images/logo/logo.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/sidenav.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/footer.css" media="screen">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function openPage(url) {

if(url.indexOf("?") == -1) {
    url = url + "?";
}

var encodedUrl = encodeURI(url);
$("#mainContent").load(encodedUrl);
$("body").scrollTop(0);
history.pushState(null, null, url);
} </script>
<header>
        <img class="logo" src="assets/images/logo/logo_artistifia.png" alt="logo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="top_chart.php">Top Charts</a></li>
            </ul>
        </nav>
        <div class="padder"></div>
        <a href="#"><button class="account"><img src="assets/images/icon/00_account.png"></button></a>
        <a href="#" class="username"><?php echo $_SESSION['userId']; ?></a>
        <a href="logout.php"><button class="logout_btn">Log Out</button></a>
</header>


    <body>


        <div id="mainContainer">

		<div id="topContainer" style ="min-height: 100%; width: 100%;">
        <?php include('includes/side_nav.php') ?>
			<div id="mainViewContainer" style ="margin-left: 220px; padding-bottom: 90px; width: calc(100% - 220px);">
				<div id="mainContent" style = "padding: 0 60px;">
