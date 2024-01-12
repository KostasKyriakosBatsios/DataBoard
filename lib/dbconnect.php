<?php
    $host = 'localhost';
    $db = 'databoard';
    require_once "db_upass.php";
    
    $user = $DB_USER;
    $pass = $DB_PASS;

    $mysqli = new mysqli($host, $user, $pass, $db);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // The calculation of Total View Times.
    require_once "total_view_times.php";
?>