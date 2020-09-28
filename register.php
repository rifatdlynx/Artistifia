<?php include('includes/server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title = "Artistifia - Register"; echo $title; ?></title>
    <meta name = "description" content="The best place for streaming music.">
    <link rel="icon" type="image/x-icon" href="assets/images/logo/logo.ico">
    <link href="assets\css\login_reg_style.css" rel="stylesheet">
    <link href="assets\css\register.css" rel=" stylesheet">
    <script src="https://kit.fontawesome.com/50b3ba473f.js" crossorigin="anonymous"></script>
</head>
<body class="container full-height-grow">
   <header class="main-header">
        <a href="/" class="logo">
            <img class="logo" src="assets/images/logo/logo_artistifia_login.png">
        </a>
    </header> 
    <section class="register-section">
        <h1 class="register-text">
            Register for more
            <span class="diff-text">amazing</span>
            music!
        </h1>
        <form class="register-form" action="register.php" method="POST">
            <?php include('includes/errors.php') ?>
            <h1>Register</h1>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="First Name" name="fname">
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Last Name" name="lname">
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="input-group">
                <i class="fas fa-envelope-square"></i>
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="pass">
            </div>  
               
                <button type="submit" class="btn2" name="regbtn">Register Now</button>

                <p>
                    Already a user?<a href="login.php"> <b>Login</b></a>
                </p>
        </form>
    </section>  
</body>
</html>