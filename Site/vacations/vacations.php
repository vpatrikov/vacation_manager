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
        <?php
        if(!isset($_POST['addbttn'])){
        
        
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
        }else{
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

        $statement = $db->query("SELECT * FROM Vacations");
        $vacations = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php
        echo "<br><table border = 1>";

        echo "
            <tr>
                <td><b>ID<b></td>
                <td><b>From<b></td>
                <td><b>Until<b></td>
                <td><b>Date Of Request<b></td>
                <td><b>Halfday<b></td>
                <td><b>Aprooved<b></td>
                <td><b>Declarator<b></td>
                <td><b>Edit<b></td>
                <td><b>Delete<b></td>

            </tr>";

        foreach ($vacations as $row => $data) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "." . "</td>";
            echo "<td>" . $data['from'] . "</td>";
            echo "<td>" . $data['until'] . "</td>";
            echo "<td>" . $data['dor'] . "</td>";
            echo "<td>" . $data['halfday'] . "</td>";
            echo "<td>" . $data['approved'] . "</td>";
            echo "<td>" . $data['declarator'] . "</td>";
            echo "<td align='center'>" ?> <a class='a_links' href="vacations_update.php?id=<?php echo $data['id'];?>">Edit</a></td><?php
            echo "<td align='center'>" ?> <a class='a_links' href="vacations_delete.php?id=<?php echo $data['id'];?>">Delete</a></td>
        <?php
            echo "</tr>";
        }

        echo "</table>";
    }else{
        header("Location: vacations_add.php");
    }
        ?>
    </div>
    <form class="buttons" method="post">
                <br>
                <input class="actionbttns" type="submit" name="addbttn" value="Add Data">
        </form>
</body>

</html>