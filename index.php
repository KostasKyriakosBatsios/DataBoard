<!-- process login -->
<?php
    require_once "dbconnect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
        $result = $mysqli->query($sql);

        if ($result->num_row > 0) {
            // proper username and password
            session_start();
            $_SESSION["username"] = $username;
            header("location: databoard.php");
            exit();
        }

        // login failed
        $message = "Wrong username or password. Try again";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <script defer src="js/script.js"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <title>DataBoard</title>
        <link rel="shortcut icon" href="img/DataBoard.png" type="image/">
    </head>
    <body>
        <!-- Header (top bar) -->
        <header>
            <h2 class="logo">Data<span style="color: #3bdea8;">Board</span></h2>
            <nav class="navigation">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <button class="login-btn">Login</button>
            </nav>
        </header>
        <!-- Login form -->
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
                    <!-- php operation for signing in to DataBoard -->
                    <input type="submit" value="Sign In" class="signin-btn">
                </form>
            </div>
        </div>
        <!-- Installation of Ionics -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>