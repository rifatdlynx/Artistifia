<link rel="stylesheet" href="assets/css/search.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<body>
    <?php include('includes/header.php') ?>

    <form action="search_result.php" method = "post">
    <div class="wrapper" style="padding-right:50px;height:8vh;">
        <div class="search_box">
            <input type="text" name="search" placeholder="Looking For Somethings...?" onfocus="this.value = this.value">
            <input type="image" src="assets/images/icon/search.png" alt="search_submit" class="fa-search">
        </div>
    </div>
    </form>



</body>
