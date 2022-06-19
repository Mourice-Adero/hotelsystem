<?php
include './../database/db.php';

if(isset($_POST["add-room"])) {
    $type = $_POST["type"];
    $beds = $_POST["beds"];
    $rooms = $_POST["rooms"];
    $image = $_POST["image"];
    $roomid = $_POST["roomid"];
    $price = $_POST["price"];
    $results = mysqli_query($connection, "SELECT * FROM rooms WHERE type='$type' AND roomid='$roomid'");
  if (mysqli_num_rows($results) > 0) {
    echo "<script>alert('Room exists');</script>";
  } else {
      $query = "INSERT INTO rooms (roomid,type,beds,rooms,price,image) VALUES ('$roomid','$type','$beds','$rooms','$price','$image')";
      mysqli_query($connection, $query);
      echo "<script>alert('Registration Successful');</script>";
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add rooms</title>
    <link rel="stylesheet" href="./../css/main.css">
    <link rel="stylesheet" href="../css/adminhome.css">
    <link rel="stylesheet" href="../css/addrooms.css">
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

    <!-- Add rooms form -->
    <div class="room-container">
        <h2>Manage Rooms</h2>
        <form action="" method="POST">
            <div class="inputs">
            <div>
                <label for="roomid">Room-id:</label>
                <label for="type">Type:</label>
                <label for="beds">beds:</label>
                <label for="rooms">rooms:</label>
                <label for="image">Image:</label>
                <label for="price">Price:</label>
            </div>
            <div>
                <input type="text" name="roomid" class="form-control">
                <select name="type" class="form-control" required>
                    <option value selected></option>
                    <option value="Luxery">Luxery Room</option>
                    <option value="Deluxe">Deluxe Room</option>
                    <option value="Guest">Guest House</option>
                    <option value="Single">Singe Room</option>
                </select>
                <select name="beds" class="form-control" required>
                    <option value selected></option>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Tripple">Tripple</option>
                    <option value="Quad">Quad</option>
                </select>
                <select name="rooms" class="form-control" required>
                    <option value selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input type="file" name="image" class="form-control">
                <input type="text" name="price" class="form-control">
            </div>
            </div>
            <div class="btn">
                <button type="submit" name="add-room">ADD</button>
            </div>
        </form>
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
    <script src="./../javscript/scrollup.js"></script>
</body>

</html>