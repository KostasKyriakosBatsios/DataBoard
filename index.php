<!-- Process of Login -->
<?php
    require_once "lib/dbconnect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            // Proper username and password.
            session_start();
            $_SESSION["username"] = $username;
            header("location: dashboard.php");
            exit();
        }

        // Login Failed.
        $message = "Wrong username or password. Please try again.";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DataBoard</title>
        <link href="img/logo1.png" rel="icon">
        <link rel="stylesheet" href="css/style.css">
        <!-- CSS Files & Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    </head>
    <body>
        <!-- Header (Top Bar) -->
        <header id="top-bar">
            <h2 class="logo"><img src="img/logo1.png" width="25px" height="25px"> Data<span style="color: #3bdea8;">Board</span></h2>
            <nav class="navigation">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <button class="login-btn">Login</button>
            </nav>
        </header>

        <!-- Main Content -->
        <div id="main">
            <div class="about-app">
                <h1 class="intro">Welcome to Data<span style="color: #3bdea8;">Board</span></h1>
                <p class="description">A Dashboard that offers data and comprehensive information about videos. DataBoard provides a holistic overview of video performance, including users, views and durations.</p>
                
                <div class="features">
                    <h2 class="intro">Discover the <span style="color: #3bdea8;">Features</span></h2>
                    <h3>• Recent Data:</h3>
                    <p class="desc">Stay in the loop with the latest updates. Our Recent Data section offers a snapshot of the most recent activities, ensuring you're always up-to-date with the freshest information.</p>
                    <h3>• Top Videos:</h3>
                    <p class="desc">Explore the Top Videos section to see which content is making waves. Gain valuable insights about which videos get the most views.</p>
                    <h3>• Analytics:</h3>
                    <p class="desc">Our Analytics section provides a deep dive into recent users, statistics of video durations, and also characteristics of views.</p>
                </div>
            </div>
            <div class="main-logo">
                <img src="img/logo1.png" width="400px" height="400px">
            </div>
        </div>

        <!-- Login Form -->
        <div class="wrapper">
            <span class="icon-close">
                <ion-icon name="close"></ion-icon>
            </span>
            <div class="form-box login">
                <h2>Login</h2>
                <?php
                    if (isset($message)) {
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                ?>
                <form action="" method="post">
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person"></ion-icon>
                        </span>
                        <input type="text" id="username" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input type="password" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <!-- PHP operation for signing in DataBoard -->
                    <input type="submit" value="Sign In" class="signin-btn">
                </form>
            </div>
        </div>
        
        <!-- Installation of Ionics -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- Using 'ScrollReveal' by: https://github.com/jlmakes/scrollreveal -->
        <script src="https://unpkg.com/scrollreveal"></script>
        <!-- JS Scripts -->
        <script src="js/script.js"></script>
    </body>
</html>