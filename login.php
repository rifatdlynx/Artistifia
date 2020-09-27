<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title = "Artistifia - Login"; echo $title; ?></title>
    <meta name = "description" content="The best place for streaming music.">
    <link rel="icon" type="image/x-icon" href="assets/images/logo/logo.ico">
    <link href="assets\css\login_reg_style.css" rel="stylesheet">
    <link href="assets\css\login.css" rel=" stylesheet">
    <script src="https://kit.fontawesome.com/50b3ba473f.js" crossorigin="anonymous"></script>
</head>
<body class="container full-height-grow">
    <header class="main-header">
        <a href="assets\img\logo\logo.png" class="logo">
            <img class="logo" src="assets\img\logo\logo.png">
            <div class="logo-name">Artistifia</div>
        </a>
    </header> 
    <section class="log-in-section">
        <h1 class="log-in-text">
            Sign up for 
            <span class="different-text">Fun....</span>
        </h1>
        <form class="login-form" action="login.php" method="POST">
            <?php include('includes/errors.php') ?>
            <h1>Login</h1>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="pass">
            </div>

               <button type="submit" class="btn" name="loginbtn">Login</button>

               <p>
                   Not a member yet?<a href="register.php"><b>Register</b></a>
                </p>
           
            
                
        
        </form>
    </section>  
</body>
</html>