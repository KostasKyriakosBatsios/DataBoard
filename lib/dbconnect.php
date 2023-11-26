<?php
    $host = 'localhost';
    $db = 'databoard';

    $con = mysqli_connect($host, "root", "", $db);

    if(!$con) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>