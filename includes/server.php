<?php include('includes/mysqlConnection.php');

$email = "";
$username = "";
$fname = "";
$lname = "";
$errors = array();


//click registerbtn
if(isset($_POST['regbtn'])) {
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);

  //checking whether the fields are filled properly or not
  if(empty($fname)) {
    array_push($errors, "First name is required");
  }

  if(empty($lname)) {
    array_push($errors, "Last name is required");
  }

  if(empty($username)) {
    array_push($errors, "User name is required");
  }

  if(empty($email)) {
    array_push($errors, "Email is required");
  }

  if(empty($pass)) {
    array_push($errors, "Password is required");
  }

  $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  //checking user into db
  if($user) {
    if($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  //echo "Total error: " . count($errors);

  //insert new data
  if(count($errors) == 0) {
    $password = md5($pass);

    $query = "INSERT INTO users (email, username, password, first_name, last_name) VALUES ('".$email."', '".$username. "', '".$password."',
    '".$fname."', '".$lname."')";
    mysqli_query($con, $query);
    $_SESSION['username'] = $username;
    $q = mysqli_query($con, "SELECT id FROM users WHERE username = \"". $_SESSION['username']."\"");
    echo "<script> console.log(".$_SESSION['userId']."); </script>";
    
    header('location: index.php');
  }

}

//click loginbtn
if(isset($_POST['loginbtn'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);

  if(empty($username)) {
    array_push($errors, "Username is required");
  }

  if(empty($pass)) {
    array_push($errors, "Password is required");
  }

  if(count($errors) == 0) {
    $password = md5($pass);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $results = mysqli_query($con, $query);
    if(mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      header('location: index.php');
    }
    else {
      array_push($errors, "Wrong username/password");
    }
  }
}

?>