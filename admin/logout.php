<?php
    include './../database/db.php';
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("location: ./adminlogin.php");
?>