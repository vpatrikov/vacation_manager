<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data In Projects</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1>Update data in Projects</h1>
    </header>

    <?php
    $pdo = new PDO("sqlite:../../Database.db");
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
        echo "<div class='table'>";
        echo "<tr>";
        echo "<td>" . $data['id'] . "." .  "</td>";
        echo "<td><input class='update_inp' type='text' value=" . $data['name'] . ">" .  "</td>";
        #echo "<td>" . $data['description'] . "</td>";
        echo "<td><input class='update_inp' type='text' value=" . $data['description'] . ">" .  "</td>";
        echo "<td><input class='update_inp' type='number' value=" . $data['teams'] . ">" .  "</td>";
        echo "</tr>";
        echo "</div>";
    }

    echo "</table>";
    ?>

    <br>
    <input type="submit" class="update_submit actionbttns" value="Update Data">
    <div class="footer">
        <input onclick="location.href='../index.php'" class="actionbttns" value="Home">
        <input onclick="location.href='projects.php'" class="actionbttns" value="Projects page">
    </div>
</body>
<script src="../script.js"></script>
</html>