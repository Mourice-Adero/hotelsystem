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
          $sql = "SELECT * FROM bookings WHERE customername='$useremail' && confirmed='no'";
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
            if($row = mysqli_fetch_array($tquery)){
              $bkid = $row['bookingid'];
              $amount = $row['price'];
            }
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
        <form method="POST"><button type="submit" name="cancelbooking" class="cancel1">Cancel</button></form>
        <?php
          if(isset($_POST["cancelbooking"])) {
            $delquery = "DELETE FROM bookings WHERE bookingid='$bkid'";
            $del = mysqli_query($connection,$delquery);
            echo "<script>alert('Booking canlcelled')</script>";
            header("location: ./rooms.php");
          }
        ?>
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
        <input name="Phonenumber" type="text" required value="+254">
        <label for="amount">Ksh:</label>
        <input name="amount" type="text" value="<?php $row['price']; ?>">
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
  <script src="./javscript/modals.js" defer></script>
</body>

</html>