<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
    <title>Vacation Manager</title>
</head>

<body>
    <header>
        <h1>Vacations</h1>
        <nav>
            <a href="../register/register.php">Register</a>
            <a href="../login/login.php">Login</a>
            <a href="../index.php">Home</a>
            <a href="../teams/teams.php">Teams</a>
            <a href="../projects/projects.php">Projects</a>
            <a href="../vacations/vacations.php">Vacations</a>
        </nav>
    </header>

    <form method="post">
        <div class="buttons">
            <br>
            <input class="actionbttns" type="submit" name="viewbttn" value="View Data" />
            <input class="actionbttns" type="submit" name="editbttn" value="Edit Data" />
        </div>
    </form>
</body>

</html>