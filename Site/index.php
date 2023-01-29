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
    if (isset($_SESSION['logged_in'])) {
    ?>
        <header>
            <h1>Vacation Manager</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="teams/teams.php">Teams</a>
                <a href="projects/projects.php">Projects</a>
                <a href="vacations/vacations.php">Vacations</a>
            </nav>
        </header>
        
        <!-- печата username, не знам как да му подам името на човека пробвах с $_SESSION['fname'] = $result[fname] (в login), но не печата нищо. -->
        <p>Welcome, <?php echo $_SESSION['username'];?>!</p> 

        <?php if (!isset($_POST['log_out'])) { ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <footer>
                <input class="actionbttns" type="submit" name="log_out" value="Log Out">
                </footer>
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
    <?php
    }
    ?>
</body>

</html>