<?php
    $host = 'localhost';
    $user = 'root';
    $db = 'databoard';
    require_once "lib/db_upass.php";

    $user = $DB_USER;
    $pass = $DB_PASS;

    $mysqli = new mysqli($host, $user, $pass, $db);

    if(!$mysqli) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>