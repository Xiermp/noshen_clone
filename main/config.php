<?php
    $db_host = "localhost";
    $db_user = "rost";
    $db_pass = "";
    $db_name = "noshen"; // The actual name of your database in MySQL

    $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>