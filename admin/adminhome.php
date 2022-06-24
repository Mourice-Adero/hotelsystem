<?php
include './../database/db.php';
if (!empty($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $logedinuser = mysqli_query($connection, "SELECT * FROM admins WHERE id=$id");
  $row = mysqli_fetch_assoc($logedinuser);
} else {
  header("location: ./adminlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cold Springs Admin Home</title>
  <link rel="stylesheet" href="./../css/main.css">
  <link rel="stylesheet" href="../css/adminhome.css">
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
        <li><a href="./../home.php">Main Page</a></li>
        <li><a href="./logout.php">Loguot</a></li>
      </ul>
    </nav>
    <div class="toggler"></div>
  </header>

  <!--Welcome Admin-->
  <h1>Welcome <?php echo $row["firstname"]; ?> <span><?php echo $row["lastname"]; ?></span></h1>
  <!--Admin Operations-->
  <div class="op-container">
    <div class="col-1">
      <button class="toggle-btn is-active">Manage Admins</button>
      <button class="toggle-btn">Manage Rooms</button>
      <button class="toggle-btn">Manage Bookings</button>
    </div>
    <div class="col-2">
      <!--Manage admins-->
      <div class="admin-container is-active">
        <h2>Manage Admins</h2>
        <button><a href="./adminadd.php">Add Admin</a></button>
        <table>
          <?php
          $sql = "SELECT * FROM admins";
          $tquery = mysqli_query($connection, $sql);
          ?>
          <thead>
            <th>ID</th>
            <th>Fist Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($tquery)) {
              echo "<tr>
													<td>" . $row['id'] . "</td>
													<td>" . $row['firstname'] . "</td>
													<td>" . $row['lastname'] . "</td>
													<td>" . $row['email'] . "</td>
												</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!--Manage rooms-->
      <div class="admin-container">
        <h2>Manage Rooms</h2>
        <button><a href="./addrooms.php">Add room</a></button>
        <table>
          <?php
          $sql = "SELECT * FROM rooms";
          $tquery = mysqli_query($connection, $sql);
          ?>
          <thead>
            <th>Room ID</th>
            <th>Type</th>
            <th>Beds</th>
            <th>Status</th>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($tquery)) {
              echo "<tr>
													<td>" . $row['roomid'] . "</td>
													<td>" . $row['type'] . "</td>
													<td>" . $row['beds'] . "</td>
													<td>" . $row['status'] . "</td>                    
												</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!--Manage Bookings-->
      <div class="admin-container">
        <h2>Pending Bookings</h2>
        <form method="post"><button type="submit" name="clearbooking">Clear Pending Bookings</button></form>
        <?php
        if (isset($_POST["clearbooking"])) {
          $clear = mysqli_query($connection,"DELETE FROM bookings");
          echo "<script>alert('Pending Bookings cleared')</script>";
        }
        ?>
        <table>
          <?php
          $sql = "SELECT * FROM bookings";
          $tquery = mysqli_query($connection, $sql);
          ?>
          <thead>
            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Room ID</th>
            <th>Type</th>
            <th>Beds</th>
            <th>Price</th>
            <th>Check in</th>
            <th>Check Out</th>
            <th>Duration</th>
            <th>Total Price</th>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($tquery)) {
              echo "<tr>
													<td>" . $row['bookingid'] . "</td>
													<td>" . $row['customername'] . "</td>
													<td>" . $row['roomid'] . "</td>
													<td>" . $row['type'] . "</td>
													<td>" . $row['beds'] . "</td>
													<td>" . $row['price'] . "</td>
													<td>" . $row['checkin'] . "</td>
													<td>" . $row['checkout'] . "</td>
													<td>" . $row['duration'] . "</td>
													<td>" . $row['totalprice'] . "</td>
												</tr>";
            }
            ?>
          </tbody>
        </table>
        <h2>Confirmed Bookings</h2>
        <table>
          <?php
          $sql = "SELECT * FROM confirmedbookings";
          $tquery = mysqli_query($connection, $sql);
          ?>
          <thead>
            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Phone Number</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Total Price</th>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($tquery)) {
              echo "<tr>
													<td>" . $row['bookingid'] . "</td>
													<td>" . $row['customername'] . "</td>
													<td>" . $row['checkin'] . "</td>
													<td>" . $row['checkout'] . "</td>
													<td>" . $row['totalprice'] . "</td>
													<td>" . $row['phonenumber'] . "</td>
												</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--Footer-->
  <hr />
  <footer>
    <p>
      &copy; 2022 COLD SPRINGS. All Rights Reseverd | Designed by
      <span>"Best Team Ever"</span>
    </p>
  </footer>
  <!--scroll up-->
  <a href="#" class="to-top">
    <h2>Up</h2>
  </a>
  <script src="./../javscript/tabs.js"></script>
  <script src="./../javscript/scrollup.js"></script>
</body>

</html>