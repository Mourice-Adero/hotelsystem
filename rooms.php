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
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <link rel="stylesheet" type="text/css" href="./css/rooms.css">
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
        <li><a href="./home.php">Home</a></li>
        <li><a href="./home.php/#contacts">Contact Us</a></li>
        <li><a href="./userlogout.php">Logout</a></li>
      </ul>
    </nav>
    <div class="toggler"></div>
  </header>
  <h1>Welcome <?php echo $row["firstname"]; ?> <span><?php echo $row["lastname"]; ?></span></h1>
  <?php
  $useremail = $row["email"];
  ?>

  <!--Rooms Cartegories-->
  <div class="selections">
    <a href="#luxery">Luxery Rooms</a>
    <a href="#deluxe">Deluxe Rooms</a>
    <a href="#guest-houses">Guest Houses Rooms</a>
    <a href="#single-rooms">Single Rooms</a>
  </div>
  <div class="rooms-container">
    <h3 id="luxery">Luxury Rooms</h3>
    <div class="cartegory">
      <div class="display-rooms">
        <table>
          <?php
          $sql = "SELECT * FROM rooms WHERE type='Luxery' AND status='Available'";
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

              echo "<tr>  <form method='POST'>
                          <td class='bookings'><input class='bookinput' type='text' value='" . $row['roomid'] . "'></td>
                          <td class='bookings'><input class='bookinput' type='text' value='" . $row['type'] . "'></td>
                          <td class='bookings'><input class='bookinput' type='text' value='" . $row['beds'] . "'></td>
                          <td class='bookings'><input class='bookinput' type='text' value='" . $row['status'] . "'></td>
													</form>
												</tr>";
            }
            ?>
          </tbody>
        </table>
        <button id="book-btn" class="book-btn" onclick="openmodal()">Book Now</button>
      </div>
    </div>
    <!-- Select room form -->
    <?php
    if (isset($_POST["go-payment"])) {
      $rid = $_POST["rid"];
      $rtype = $_POST["rtype"];
      $nbeds = $_POST["nbeds"];
      $date1 = date_create($_POST["checkin"]);
      $date2 = date_create($_POST["checkout"]);
      $interval = $date1->diff($date2);
      $duration = $interval->days;
      $checkin = date_format($date1, "y/m/d");
      $checkout = date_format($date2, "y/m/d");
      $price = "";
      $cname = $useremail;
      $now = date('y/m/d');
      $sql = "SELECT * FROM rooms WHERE type='Luxery' AND status='Available'";
      $tquery = mysqli_query($connection, $sql);
      $row = mysqli_fetch_array($tquery);
      if (mysqli_query($connection, $sql)) {
        if ($checkin >= $now) {
          if ($checkout >= $checkin) {
            if ($rid == $row['roomid'] && $rtype == $row['type']) {
              if ($rtype == "Luxery" && ($nbeds == 'Tripple' || $nbeds == "Quad")) {
                $price = 7500;
              } else if ($rtype == "Luxery" && ($nbeds == "Double" || $nbeds == "Single")) {
                $price = 6200;
              } else if ($rtype == "Deluxe" && ($nbeds == "Tripple" || $nbeds == "Quad")) {
                $price = 5500;
              } else if ($rtype == "Deluxe" && ($nbeds == "Double" || $nbeds == "Single")) {
                $price = 4800;
              } else if ($rtype == "Guest" && ($nbeds == "Tripple" || $nbeds == "Quad")) {
                $price = 4000;
              } else if ($rtype == "Guest" && ($nbeds == "Double" || $nbeds == "Single")) {
                $price = 3200;
              } else if ($rtype == "Single" && ($nbeds == "Tripple" || $nbeds == "Quad")) {
                $price = 2500;
              } else if ($rtype == "Single" && ($nbeds == "Double" || $nbeds == "Single")) {
                $price = 1800;
              }
              $totalprice = $price * $duration;
              $squery = "INSERT INTO bookings (bookingid,customername,roomid,type,beds,price,checkin,checkout,duration,totalprice) VALUES ('','$cname','$rid','$rtype','$nbeds','$price','$checkin','$checkout','$duration','$totalprice')";
              $execquery = mysqli_query($connection, $squery);
              if ($execquery) {
                echo "<script>alert('Booking successful');</script>";
                header("location: ./payment1.php");
              } else {
                echo "<script>alert('Booking failed, contact us for help');</script>";
              }
            } else
              echo "<script>alert('room Currently not availlable, Please select the room listed in the rooms section')</script>";
          } else {
            echo "<script>alert('Invalid check out date! Date should be after check in date')</script>";
          }
        } else {
          echo "<script>alert('You can not book a past date')</script>";
        }
      } else {
        echo "<script>alert('System is currently under maintenance, try later')</script>";
      }
    }
    ?>
    <div class="selectform-section" id="popup">
      <div class="cnt">
        <?php echo $useremail; ?>
        <a href="" id="closepopup" class="closepopup" onclick="closemodal()">X</a>
        <h4>Choose Room Specifics</h4>
        <form action="" method="POST" class="select-room">
          <label for="rid">Room ID</label>
          <input type="text" name="rid" class="form" required>
          <label for="rtype">Type</label>
          <select name="rtype" id="rtype" class="form" required>
            <option></option>
            <option value="Luxery">Luxery Room</option>
            <option value="Deluxe">Deluxe Room</option>
            <option value="Guest">Guest Room</option>
            <option value="Single">Singe Room</option>
          </select>
          <label for="nbeds">Beds</label>
          <select name="nbeds" class="form" required>
            <option value selected></option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Tripple">Tripple</option>
            <option value="Quad">Quad</option>
          </select>
          <label for="checkin">Check In</label>
          <input type="date" name="checkin" class="form" required>
          <label for="checkout">Check Out</label>
          <input type="date" name="checkout" class="form" required>
          <button type="submit" name="go-payment" class="form">Proceed to Checkout</button>
        </form>
      </div>
    </div>
    <h3 id="deluxe">Deluxe</h3>
    <div class="cartegory">
      <div class="display-rooms">
        <table>
          <?php
          $sql = "SELECT * FROM rooms WHERE type='Deluxe' AND status='Available'";
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

              echo "<tr>  <form method='POST'>
  <td class='bookings'><input class='bookinput' type='text' value='" . $row['roomid'] . "'></td>
  <td class='bookings'><input class='bookinput' type='text' value='" . $row['type'] . "'></td>
  <td class='bookings'><input class='bookinput' type='text' value='" . $row['beds'] . "'></td>
  <td class='bookings'><input class='bookinput' type='text' value='" . $row['status'] . "'></td>
  </form>
  </tr>";
            }
            ?>
          </tbody>
        </table>
        <button id="book-btn" class="book-btn" onclick="openmodal()">Book Now</button>
      </div>
    </div>

    <h3 id="guest-houses">Guest Houses</h3>
    <div class="cartegory">
      <div class="display-rooms">
        <table>
          <?php
          $sql = "SELECT * FROM rooms WHERE type='Guest' AND status='Available'";
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

              echo "<tr>  <form method='POST'>
                          <td class='bookings'><input class='bookinput' type='text' value='" . $row['roomid'] . "'></td>
                          <td class='bookings'><input class='bookinput' type='text' value='" . $row['type'] . "'></td>
                          <td class='bookings'><input class='bookinput' type='text' value='" . $row['beds'] . "'></td>
                          <td class='bookings'><input class='bookinput' type='text' value='" . $row['status'] . "'></td>
													</form>
                          </tr>";
            }
            ?>
          </tbody>
        </table>
        <button id="book-btn" class="book-btn" onclick="openmodal()">Book Now</button>
      </div>
    </div>
    <h3 id="single-rooms">Single Rooms</h3>
    <div class="cartegory">
      <div class="display-rooms">
        <table>
          <?php
          $sql = "SELECT * FROM rooms WHERE type='Single' AND status='Available'";
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

              echo "<tr>  <form method='POST'>
                            <td class='bookings'><input class='bookinput' type='text' value='" . $row['roomid'] . "'></td>
                            <td class='bookings'><input class='bookinput' type='text' value='" . $row['type'] . "'></td>
                            <td class='bookings'><input class='bookinput' type='text' value='" . $row['beds'] . "'></td>
                            <td class='bookings'><input class='bookinput' type='text' value='" . $row['status'] . "'></td>
													</form>
                    </tr>";
            }
            ?>
          </tbody>
        </table>
        <button id="book-btn" class="book-btn" onclick="openmodal()">Book Now</button>
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
  <script src="./javscript/scrollup.js"></script>
  <script src="./javscript/modals.js" defer></script>
</body>

</html>