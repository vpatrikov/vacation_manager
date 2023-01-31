<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
</head>

<body>
    <header>
        <h1>Users</h1>
        <?php
        session_start();
        if ($_SESSION['role'] == 'CEO') {
        ?>
            <nav>
                <a href="../index.php">Home</a>
                <a href="../teams/teams.php">Teams</a>
                <a href="../projects/projects.php">Projects</a>
                <a href="../vacations/vacations.php">Vacations</a>
                <a href="../users/users.php">Users</a>
            </nav>
        <?php
        } else {
        ?>
            <nav>
                <a href="../index.php">Home</a>
                <a href="../teams/teams.php">Teams</a>
                <a href="../projects/projects.php">Projects</a>
                <a href="../vacations/vacations.php">Vacations</a>
            </nav>
        <?php
        }
        ?>
    </header>
    <div class="div-align scrollabe">
        <?php
        $db = new PDO("sqlite:../../Database.db");

        $statement = $db->query("SELECT * FROM Users");
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php
        echo "<br><table border = 1>";

        echo "
            <tr>
                <td><b>ID<b></td>
                <td><b>Username<b></td>
                <td><b>Password<b></td>
                <td><b>First Name<b></td>
                <td><b>Last Name<b></td>
                <td><b>Role<b></td>
                <td><b>Team<b></td>
                <td><b>Delete<b></td>
            </tr>";

        foreach ($users as $row => $data) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "." . "</td>";
            echo "<td>" . $data['username'] . "</td>";
            echo "<td>" . $data['pass'] . "</td>";
            echo "<td>" . $data['fname'] . "</td>";
            echo "<td>" . $data['lname'] . "</td>";
            echo "<td>" . $data['role'] . "</td>";
            echo "<td>" . $data['team'] . "</td>";
            echo "<td align='center'>" ?> <a class='a_links' href="users_delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
        <?php
            echo "</tr>";
        }

        echo "</table>";
        ?>
    </div>
</body>

</html>