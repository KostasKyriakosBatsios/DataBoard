<?php
    // loging out and redirecting to the home page
    session_start();
    session_destroy();
    header("Location: index.php");
    exit();
?>