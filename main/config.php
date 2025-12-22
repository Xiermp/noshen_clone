<?php
    $database= "../data/";
    if (!isset($database)){
        echo "databse die or not posible connect";
        die;
    }
    $connect = mysqli_connect("localhost", "rost", "", $database);
    

?>