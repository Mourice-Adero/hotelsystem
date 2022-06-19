<?php
include './../database/db.php';
if (!empty($_SESSION["id"])) {
  header("location: ./adminhome.php");
}
if (isset($_POST["adm-login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $getuser = mysqli_query($connection, "SELECT * FROM admins WHERE email='$email'");
  $row = mysqli_fetch_assoc($getuser);
  if (mysqli_num_rows($getuser) > 0) {
    if ($password = $row["password"]) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("location: ./adminhome.php");
    } else {
      echo "<script>alert('Wrong username or password');</script";
    }
  } else {
    echo "<script>alert('User Not Regstered');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cold Springs Admin Login Page</title>
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
        <li><a href="home.php">Home</a></li>
        <li><a href="registration.php">Register</a></li>
      </ul>
    </nav>
    <div class="toggler"></div>
  </header>
  <!--Login Form-->
  <h1 class="message">Welcome Admin</h1>
  <div class="main-container">
    <div class="login-container">
      <h2>Login</h2>
      <form action="" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email" id="emailname">
        <label for="password">Password:</label>
        <input type="password" name="password">
        <button type="submit" name="adm-login">Login</button>
        <p>Not Registered? <a href="./../admin/adminregistration.php">Register</a></p>
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