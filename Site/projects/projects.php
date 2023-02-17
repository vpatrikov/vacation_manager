<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacation Manager</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
</head>

<body>
    <header>

        <h1>Projects</h1>
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
                <a href="projects.php">Projects</a>
                <?php
                if($_SESSION['role'] != "CEO" && $_SESSION['role'] != "Team Lead"){?>
                <a href="../vacations/vacations_add.php">Request Vacation</a>
                <?php } else { ?>
                <a href="../vacations/vacations.php">Vacations</a>
                <?php }?>
                <a href="../users/users.php">Team Members</a>
            </nav>
        <?php
        }
        ?>
    </header>

    <div class="div_align scrollable">
        <?php
        if ($_SESSION['role'] == "CEO") {
        if (!isset($_POST['addbttn'])) {
            
                $pdo = new PDO('sqlite:../../Database.db');

                $statement = $pdo->query("SELECT * FROM Projects");
                $projects = $statement->fetchAll(PDO::FETCH_ASSOC);

                echo "<br><table border = 1>";

                echo "
            <tr>
                <td><b>ID<b></td>
                <td><b>Name<b></td>
                <td><b>Description<b></td>
                <td><b>Teams<b></td>
                <td><b>Edit<b></td>
                <td><b>Delete<b></td>
            </tr>";

                foreach ($projects as $row => $data) {
                    echo "<tr>";
                    echo "<td>" . $data['id'] . "." . "</td>";
                    echo "<td>" . $data['name'] . "</td>";
                    echo "<td>" . $data['description'] . "</td>";
                    echo "<td>" . $data['teams'] . "</td>";
                    echo "<td align='center'>" ?> <a class='a_links' href="projects_update.php?id=<?php echo $data['id']; ?>">Edit</a></td> <?php
                    echo "<td align='center'>" ?> <a class='a_links' href="projects_delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
        <?php
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                header("Location: projects_add.php");
            }
        } else {
            $pdo = new PDO('sqlite:../../Database.db');

                $statement = $pdo->query("SELECT * FROM Projects");
                $projects = $statement->fetchAll(PDO::FETCH_ASSOC);

                echo "<br><table border = 1>";

                echo "
            <tr>
                <td><b>ID<b></td>
                <td><b>Name<b></td>
                <td><b>Description<b></td>
                <td><b>Teams<b></td>
            </tr>";

                foreach ($projects as $row => $data) {
                    echo "<tr>";
                    echo "<td>" . $data['id'] . "." . "</td>";
                    echo "<td>" . $data['name'] . "</td>";
                    echo "<td>" . $data['description'] . "</td>";
                    echo "<td>" . $data['teams'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
        }
        ?>

        <form method="post"><?php
            if($_SESSION['role'] == "CEO"){?>
            <div class="buttons">
                <br>
                <input class="actionbttns" type="submit" name="addbttn" value="Add Data">
            </div><?php
            } else {}?>
        </form>
    </div>
</body>

</html>