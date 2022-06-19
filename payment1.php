<?php
include './database/db.php';
if (!empty($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $logedinuser = mysqli_query($connection, "SELECT * FROM users WHERE id=$id");
  $row = mysqli_fetch_assoc($logedinuser);
} else {
  header("location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cold Springs Rooms</title>
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/rooms.css">
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
        <li><a href="#">Home</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="./userlogout.php">Logout</a></li>
      </ul>
    </nav>
    <div class="toggler"></div>
  </header>
  <!--Confirm Boooking and Payment-->
  <div class="py-container">
    <div class="payment display-rooms">
      <div class="selected-room">
        <h3>Selected Room</h3>
        <table>
          <?php
          $useremail = $row["email"];
          echo $useremail;
          ?>
          <?php
          $sql = "SELECT * FROM bookings WHERE customername='$useremail'";
          $tquery = mysqli_query($connection, $sql);
          ?>
          <thead>
            <th>Booking ID</th>
            <th>Room ID</th>
            <th>Type</th>
            <th>Beds</th>
            <th>Price/Day</th>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>total Price</th>
          </thead>
          <tbody>

            <?php

            while ($row = mysqli_fetch_array($tquery)) {

              echo "<tr>  <form method='POST'>
                          <td class='bookings'>" . $row['bookingid'] . "</td>
                          <td class='bookings'>" . $row['roomid'] . "</td>
                          <td class='bookings'>" . $row['type'] . "</td>
                          <td class='bookings'>" . $row['beds'] . "</td>
                          <td class='bookings'>" . $row['price'] . "</td>
                          <td class='bookings'>" . $row['checkin'] . "</td>
                          <td class='bookings'>" . $row['checkout'] . "</td>
                          <td class='bookings'>" . $row['totalprice'] . "</td>
													</form>
												</tr>";
            }
            ?>
          </tbody>
        </table>
        <button onclick="openmpesa()">Pay with Mpesa</button>
        <button>Pay with Paypal</button>
        <button type="submit" name="cancelbooking" class="cancel1">Cancel, Back to Rooms</button>
      </div>
    </div>
  </div>

  <!-- Mpesa Popup -->
  <div class="mpesa-container" id="mpesa-container">
    <div class="mp-popup">
      <a href="#" onclick="closempesa()">X</a>
      <h3>Mpesa SDK Push</h3>
      <form action="" method="POST">
        <label for="phonenumber">Phone Number:</label>
        <input type="text" required>
        <button type="submit" name="sdk-push">Pay</button>
      </form>
    </div>
  </div>
  <!-- Paypal Popup -->
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
  <script src="./javscript/scrollup.js"></script>
  <script src="./javscript/modal1.js" defer></script>
</body>

</html>