<?php
include "./database/db.php";
if (isset($_POST['signup'])) {
    $fname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $query = mysqli_query($connection, "INSERT INTO subscription VALUES ('$fname','$phonenumber','$email')");
    if ($query) {
        echo "<script>alert('You are now subscribrd to news letter');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cold Springs Hotel</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/home.css">

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
                <li><a href="#about">About</a></li>
                <li><a href="#gallary">Gallary</a></li>
                <li><a href="#rooms">Rooms</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contacts">Contact Us</a></li>
            </ul>
        </nav>
        <div class="toggler"></div>
    </header>
    <!--Banner-->
    <div class="banner">
        <div class="banner-text">
            <h2>COLD SPRINGS</h2>
            <h3>We know what you love</h3>
            <p>Welcome to Cold Springs Hotel</p>
        </div>
        <div class="learn-more">
            <button id="learnmore" onclick="openlearn()">LEARN MORE</button>
        </div>
        <div class="learn-container" id="learner">
            <div class="learn-content">
                <a class="closelearn" onclick="closelearn()">X</a>
                <h3>Cold Springs in Brief</h3>
                <p>Our hotel provides the following services:</p>
                <ul>
                    <li>Best Online Hotel Reservations</li>
                    <li>We have friendly reception</li>
                    <li>Different room types available at afordable prices</li>
                </ul>
            </div>
        </div>
    </div>
    <!--Ribbon-->
    <div class="ribbon">
        <h3>Get started and find amaizing experience with Cold Springs Hotel</h3>
    </div>
    <!--Welcome-->
    <div class="welcome">
        <div class="welcome-head">
            <h3>EXPERIENCE A GOOD STAY. ENJOY FANTASTIC OFFERS</h3>
            <h4>FIND OUR FRIENDLY WELCOMING RECEPTION</h4>
        </div>
        <div class="welcome-body">
            <div class="feature">
                <div><i class="fa-solid fa-bed"></i></div>
                <h5>MASTER BEDROOMS</h5>
            </div>
            <div class="feature">
                <div><i class="fas fa-swimming-pool"></i></div>
                <h5>NICE AND WARM POOL</h5>
            </div>
            <div class="feature">
                <div><i class="fa-solid fa-coffee"></i></div>
                <h5>LARGE CAFE</h5>
            </div>
            <div class="feature">
                <div><i class="fa-solid fa-wifi"></i></div>
                <h5>WIFI COVERAGE</h5>
            </div>
        </div>
    </div>
    <!--About-->
    <div class="about" id="about">
        <div class="about-txt">
            <h3>About Cold Springs Hotel</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum est quos repellendus repellat inventore beatae ut ex deserunt eaque aperiam? Atque odit dolor minus quibusdam magnam aliquam voluptas laudantium magni!</p>
        </div>
        <div class="about-img">
            <img src="./images/hotel1.jpg" alt="about image">
            <img src="./images/hotel1.jpg" alt="about image">
            <img src="./images/hotel1.jpg" alt="about image">
        </div>
    </div>
    <!--Our Services-->
    <div class="services">
        <div class="service-txt">
            <h3>Our Services</h3>
        </div>
        <div class="service">
            <div>Icon</div>
            <h4>The Best of Services</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, dolor.</p>
            <ul>
                <li>Decorated Rooms</li>
                <li>Proper Air Conditioning</li>
            </ul>
        </div>
        <hr>
        <div class="service">
            <div>Icon</div>
            <h4>The Best of Services</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, dolor.</p>
            <ul>
                <li>Decorated Rooms</li>
                <li>Proper Air Conditioning</li>
            </ul>
        </div>
    </div>
    <!--Gallery-->
    <div class="gallery" id="gallery">
        <h3>Our Gallery</h3>
        <div class="gallery-container">
            <img src="./images/luxery1.jpg" alt="gallery image">
            <img src="./images/luxery2.jpg" alt="gallery image">
            <img src="./images/single.jpg" alt="gallery image">
            <img src="./images/deluxe1.jpg" alt="gallery image">
            <img src="./images/deluxe3.jpg" alt="gallery image">
            <img src="./images/guest2.jpg" alt="gallery image">
            <img src="./images/doublebeds.jpg" alt="gallery image">
            <img src="./images/single2.jpg" alt="gallery image">
            <img src="./images/deluxe2.jpg" alt="gallery image">
            <img src="./images/guest2.jpg" alt="gallery image">
            <img src="./images/luxery4.jpg" alt="gallery image">
            <img src="./images/commonroom.jpg" alt="gallery image">


        </div>
    </div>
    <!--Rooms-->
    <div class="rooms" id="rooms">
        <h3>Rooms and Rates</h3>
        <div class="cartegories">

            <div class="cartegory">
                <img src="./images/luxery3.jpg" alt="room image">
                <p>Luxury</p>
                <div>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p>Price between 6,200 and 7,500</p>
            </div>
            <div class="cartegory">
                <img src="./images/deluxe1.jpg" alt="room image">
                <p>Deluxe</p>
                <div>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p>Price between 4,800 and 5,500</p>
            </div>


            <div class="cartegory">
                <img src="./images/guest3.jpg" alt="room image">
                <p>Guest Houses</p>
                <div>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p>Price between 3,200 and 4,000</p>
            </div>
            <div class="cartegory">
                <img src="./images/single.jpg" alt="room image">
                <p>Single rooms</p>
                <div>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p>Price between 1,800 and 2,500</p>
            </div>
        </div>
        <div class="view-rooms">
            <a href="./rooms.php">View Rooms</a>
        </div>
    </div>
    <!--Team-->
    <div class="team" id="team">
        <h3>Meet Our Team</h3>
        <div class="team-container">
            <ul>
                <li><button class="toggle-member"><img src="./images/member1.jpg" alt="Team member"></button></li>
                <li><button class="toggle-member"><img src="./images/member1.jpg" alt="Team member"></button></li>
                <li><button class="toggle-member is-active"><img src="./images/member1.jpg" alt="Team member"></button></li>
                <li><button class="toggle-member"><img src="./images/member1.jpg" alt="Team member"></button></li>
            </ul>
            <div class="member-details is-active">
                <img src="./images/member1.jpg" alt="Member pic">
                <div class="details">
                    <h4>Member Name123</h4>
                    <p>Brief description about the member</p>
                    <div class="social-contacts">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook"></a></i></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp"></a></i></li>
                            <li><a href="#"><i class="fab fa-linkedin"></a></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="member-details">
                <img src="./images/member1.jpg" alt="Member pic">
                <div class="details">
                    <h4>Member Name123</h4>
                    <p>Brief description about the member</p>
                    <div class="social-contacts">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook"></a></i></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp"></a></i></li>
                            <li><a href="#"><i class="fab fa-linkedin"></a></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="member-details">
                <img src="./images/member1.jpg" alt="Member pic">
                <div class="details">
                    <h4>Member Name123</h4>
                    <p>Brief description about the member</p>
                    <div class="social-contacts">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook"></a></i></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp"></a></i></li>
                            <li><a href="#"><i class="fab fa-linkedin"></a></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="member-details">
                <img src="./images/member1.jpg" alt="Member pic">
                <div class="details">
                    <h4>Member Name123</h4>
                    <p>Brief description about the member</p>
                    <div class="social-contacts">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook"></a></i></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp"></a></i></li>
                            <li><a href="#"><i class="fab fa-linkedin"></a></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Visitors Experience-->

    <!--Contact Us-->
    <div class="contact-us" id="contacts">
        <h3>Contact Us</h3>
        <div class="contact-form">
            <div class="mail-form">
                <h4>Sign Up for Our News Letter</h4>
                <form action="" method="post">
                    <label for="fullname">Full Name:</label>
                    <input type="text" name="fullname">
                    <label for="phonenumber">Phone Number:</label>
                    <input type="text" name="phonenumber">
                    <label for="email">Email:</label>
                    <input type="text" name="email">
                    <button id="sendnow" name="signup">Sign Up</button>
                </form>
            </div>
            <div class="connect">
                <h4>Connect With Us</h4>
                <p><span>Phone:</span>+254768786878</p>
                <p><span>Email:</span>COLDSPRINGS@GMAIL.COM</p>
                <p><span>Address:</span>Mombasa Road, Nairobi</p>
            </div>
        </div>
    </div>
    <!--Footer-->

    <hr>
    <footer>
        <p>&copy; 2022 COLD SPRINGS. All Rights Reseverd | Designed by <span>"Best Team Ever"</span></p>
    </footer>
    <!--scroll up-->
    <a href="#" class="to-top">
        <h2>Up</h2>
    </a>
    <script src="./javscript/modals.js" defer></script>
    <script src="/javscript/scrollup.js" defer></script>
</body>

</html>