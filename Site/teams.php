<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vacation Manager</title>
</head>

<body>
    <header>
        <h1>Teams</h1>
        <nav>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <a href="index.php">Home</a>
            <a href="teams.php">Teams</a>
            <a href="projects.php">Projects</a>
            <a href="vacations.php">Vacations</a>
        </nav>
    </header>

    <?php

    $pdo = new PDO('sqlite:../Database.db');

    if (isset($_POST['viewbttn'])) {
        printdata($pdo);
    } else if (array_key_exists('editbttn', $_POST)) {
        editdata();
    }
    function printdata($pdo)
    {
        $statement = $pdo->query("SELECT * FROM Teams");
        $teams = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo "<br><table border = 1 width = 400 height = 500>";

            echo "
            <tr>
            <td><b>ID<b></td>
            <td><b>Name<b></td>
            <td><b>Project<b></td>
            </tr>";

        foreach ($teams as $row => $data) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "." . "</td>";
            echo "<td>" . $data['name'] . "</td>";
            echo "<td>" . $data['project'] . "</td>";
            echo "</tr>";

            # display table as list
            # echo "<li class='print'>" . $team ['id'] . ". " . $team['name'] . "" . $team['project'] . "</li>";
        }

        echo "</table>";
    }
    function editdata()
    {
        echo "This is edit data that is selected";
    }
    ?>

    <form method="post">
        <div id="buttons">
            <br>
            <input class="actionbttns" type="submit" name="viewbttn" value="View Data" />
            <input class="actionbttns" type="submit" name="editbttn" value="Edit Data" />
        </div>
    </form>
</body>

</html>