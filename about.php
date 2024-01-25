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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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

        <!-- Info Content -->
        <div id="info">
            <h1 class="big-header">Developers of Data<span style="color: #3bdea8;">Board</span></h1>
            <div class="dev-section">
                <div class="devs">
                    <div class="sect">
                        <img src="img/alex.jpg" alt="" class="developer">
                    </div>
                    <div class="dev-name">
                        Alexandros Oikonomou<br/>
                        <a href="https://github.com/alexoiik" class="our-social" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="devs">
                    <div class="sect">
                        <img src="img/kostas.jpg" alt="" class="developer">
                    </div>
                    <div class="dev-name">
                        Kostas Kyriakos Batsios<br/>
                        <a href="https://github.com/KostasKyriakosBatsios" class="our-social" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
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