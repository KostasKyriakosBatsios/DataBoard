<?php
    $host = 'localhost';
    $user = 'root';
    $db = 'databoard';
    require_once "db_upass.php";
    
    $user = $DB_USER;
    $pass = $DB_PASS;

    $mysqli = new mysqli($host, $user, $pass, $db);

    // checking if the connection to MySQL has failed
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // Calculating the total view intervals.
    require_once "total_view_intervals.php";
?>