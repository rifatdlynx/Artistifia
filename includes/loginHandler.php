<?php include('includes/mysqlConnection.php');

if(isset($_POST['loginbtn'])) {
	//Login button was pressed
	$username = $_POST['username'];
    $pass = $_POST['pass'];
    
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$pass'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) == NULL) {
        echo "";
    }
    else {
        $_SESSION['username'] = $username;
        header('location: index.php');
    }

}




?>