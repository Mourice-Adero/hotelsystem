<?php
include './../database/db.php';
if (!empty($_SESSION["id"])) {
  header("location: ./adminhome.php");
}
if (isset($_POST["register"])) {
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $results = mysqli_query($connection, "SELECT * FROM admins WHERE email = '$email'");
  if (mysqli_num_rows($results) > 0) {
    echo "<script>alert('Username or Email already taken');</script>";
  } else {
    if ($password == $cpassword) {
      $query = "INSERT INTO admins VALUES ('','$firstname','$lastname','$email','$password')";
      mysqli_query($connection, $query);
      echo "<script>alert('Registration Successful');</script>";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("location: ./adminhome.php");
    } else {
      echo "<script>alert('Password does not match');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Registration</title>
  <link rel="stylesheet" href="./../css/main.css">
  <link rel="stylesheet" href="./../css/login.css">
</head>

<body>
  <!--header-->
  <header>
    <div class="title-description">
      <h1>COLD <span>SPRINGS</span></h1>
      <p>Your deeam hotel</p>
    </div>
    <nav class="navbar">
      <ul>
        <li><a href="./../home.php">Home</a></li>
        <li><a href="./adminlogin.php">Login</a></li>
      </ul>
    </nav>
    <div class="toggler"></div>
  </header>
  <!--Login Form-->
  <h1 class="message">Administrator Registration Page</h1>
  <div class="main-container">
    <div class="login-container">
      <h2>Register</h2>
      <form action="" method="post">
        <label for="firstname">First Name: </label>
        <input type="text" name="firstname" id="emailname">
        <label for="lastname">Last Name: </label>
        <input type="text" name="lastname" id="emailname">
        <label for="email">Email: </label>
        <input type="text" name="email" id="emailname">
        <label for="password">Password:</label>
        <input type="password" name="password">
        <label for="cpassword">Confirm Password:</label>
        <input type="password" name="cpassword">
        <button type="submit" name="register">Register</button>
        <p>Already Registered? <a href="./adminlogin.php">Login</a></p>
      </form>
    </div>
  </div>

  <!--Footer-->
  <hr>
  <footer>
    <p>&copy; 2022 COLD SPRINGS. All Rights Reseverd | Designed by <span>"Best Team Ever"</span></p>
  </footer>
</body>

</html>