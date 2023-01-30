<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico?v=1">

    <title>Vacation Manager</title>
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>
    <?php

    function display_incorrect_pass(){
        ?>
                <div class="div_align">
                    <p style="font-size:25px">Incorrect username or password</p>
                    <input onclick="location.href='../index.php'" class="actionbttns" type="submit" value="Home">
                </div>
                <?php
    }

    if (!isset($_POST['submit'])) {?>
        <form id="login" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <input class="textboxes" type="text" id="username" name="username" placeholder="Enter Username" maxlength="10"><br><br>
            <input class="textboxes" type="password" id="pass" name="pass" placeholder="Enter Password" maxlength="10"><br><br>
            <input class="actionbttns" type="submit" name="submit" id="submit" value="Log in"><br><br>
        </form>
        <div id="login">
        <input onclick="location.href='../index.php'" type="submit" class="actionbttns" name="return" value="Home">
        </div>
    <?php
    } else {
        $db = new PDO('sqlite:../../Database.db');

        $username = $_POST['username'];
        $password = $_POST['pass'];

        $query = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";
        $result = $db->query($query);
        $user = $result->fetchAll();

        if ($user) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header("Location: ../index.php");
        } else {
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = $db->query($query);

            if ($result->fetchAll()) {
                display_incorrect_pass();
            } else {
                display_incorrect_pass();
            }
        }
    }
    ?>
</body>

</html>