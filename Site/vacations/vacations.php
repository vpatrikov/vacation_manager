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
<?php
function print_data($sql_query)
{
?>
    <div class="div-align scrollabe">
        <?php
        $db = new PDO("sqlite:../../Database.db");

        $statement = $db->query($sql_query);
        $vacations = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo "<br><table border = 1>";

        echo "
            <tr>
                <td><b>ID<b></td>
                <td><b>From<b></td>
                <td><b>Until<b></td>
                <td><b>Date Of Request<b></td>
                <td><b>Halfday<b></td>
                <td><b>Approved<b></td>
                <td><b>Declarator<b></td>
                <td><b>Team<b></td>
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
            echo "<td>" . $data['team'] . "</td>";
            echo "<td align='center'>" ?> <a class='a_links' href="vacations_update.php?id=<?php echo $data['id']; ?>">Edit</a></td><?php
            echo "<td align='center'>" ?> <a class='a_links' href="vacations_delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
    <?php
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>
    </div>

    <body>
        <header>
            <h1>Vacations</h1>
            <?php
            if (!isset($_POST['addbttn'])) {

                session_start();
                if (!isset($_POST['checkbttn'])) {
            ?>
                        <nav>
                            <a href="../index.php">Home</a>
                            <a href="../teams/teams.php">Teams</a>
                            <a href="../projects/projects.php">Projects</a>
                            <a href="vacations.php">Vacations</a>
                            <?php if ($_SESSION['role'] == 'CEO') { ?>
                            <a href="../users/users.php">Users</a>
                            <?php } else { ?>
                            <a href="../users/users.php">Team Members</a>
                            <?php } ?>
                        </nav>
        </header>
        <?php
                    $team = $_SESSION['team'];
                    $user = $_SESSION['username'];
                    if ($_SESSION['role'] == "CEO") {
                        print_data("SELECT * FROM Vacations WHERE approved='true'");
                    } else if ($_SESSION['role'] == "Team Lead") {
                        print_data("SELECT * FROM Vacations WHERE approved='true' AND team='$team'");
                    } else {
                        print_data("SELECT * FROM Vacations WHERE declarator='$user'");
                    }
        ?>
<?php
                } else {
                    header("Location: vacations_approve.php");
                }
            } else {
                header("Location: vacations_add.php");
            }
?>
<form class="buttons" method="post">
    <br>
    <input class="actionbttns" type="submit" name="addbttn" value="Add Data">
    <?php if ($_SESSION['role'] == "CEO" || $_SESSION['role'] == "Team Lead") { ?>
    <input class="actionbttns" type="submit" name="checkbttn" value="Check Requests">
    <?php }?>
</form>
    </body>

</html>