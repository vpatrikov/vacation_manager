<?php
include "check.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <title>Vacation Manager</title>
</head>

<body>
    <?php
    @session_start();
    if (isset($_SESSION['logged_in'])) {
    ?>
            <header>
                <h1>Vacation Manager</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="teams/teams.php">Teams</a>
                    <a href="projects/projects.php">Projects</a>
                    <a href="vacations/vacations.php">Vacations</a>
                    <?php if ($_SESSION['role'] == 'CEO') { ?>
                    <a href="users/users.php">Users</a>
                    <?php } else { ?>
                    <a href="users/users.php">Team Members</a>
                    <?php } ?>
                    
                </nav>
            </header>
            <form class=div_align action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <p class="text">Welcome, <?php echo $_SESSION['fname'];
                        echo " " . $_SESSION['lname']; ?>! Role: <?php echo $_SESSION['role']; ?></p>

            <?php if (!isset($_POST['log_out'])) { ?>
                        <input class="actionbttns" type="submit" name="log_out" value="Log Out">
                </form>
            <?php
            } else {
                session_destroy();
                header("Location: login/login.php");
            }
            ?>
        <?php
    } else { ?>
        <header>
            <h1>Vacation Manager</h1>
            <nav>
                <a href="register/register.php">Register</a>
                <a href="login/login.php">Login</a>
            </nav>
        </header>
        <p class="text">Welcome! Please login or register.</p>
    <?php
    }
    ?>
</body>

</html>