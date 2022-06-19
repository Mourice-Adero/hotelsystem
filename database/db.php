<?php
    session_start();
    $connection = mysqli_connect("localhost","root","","coldsprings");
    if(!$connection) {
        echo "Can't connect  to database";
    }
?>