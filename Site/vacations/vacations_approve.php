<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Requests</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1>Approve Requests</h1>
    </header>
    <?php
    session_start();
    $db = new PDO('sqlite:../../Database.db');

    $sql_query;
    $team = $_SESSION['team'];
    if ($_SESSION['role'] == "CEO") {
        $sql_query = "SELECT * FROM Vacations WHERE approved='false'";
    } else {
        $sql_query = "SELECT * FROM Vacations WHERE approved='false' AND team='$team'";
    }
    $statement = $db->query($sql_query);
    $vacations = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (count($vacations) == 0) {
        echo "<p class=text>There are no vacations to approve!</p>";
    } else {
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
                <td><b>Approve<b></td>

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
            echo "<td align='center'>" ?> <a class='a_links' href="approve.php?id=<?php echo $data['id']; ?>">Approve</a></td>
    <?php
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>
    <footer>
        <input class=actionbttns type="submit" onclick="location.href='../index.php'" value="Return Home">
        <input class=actionbttns type="submit" onclick="location.href='vacations.php'" value="Vacations Page">
    </footer>
</body>

</html>