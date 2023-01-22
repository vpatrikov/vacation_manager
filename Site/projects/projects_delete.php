<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data For Projects</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1>Delete data in Projects</h1>
        <h3>(select by what you want to delete the data)</h3>
    </header>
    <?php

    function dbquery($selection)
    {
        try {
            $db = new PDO('sqlite:../../Database.db');
            $sql = "DELETE FROM Projects WHERE $selection = :$selection ";
            $stmt = $db->prepare($sql);

            if ($selection == "name") {
                $name = filter_input(INPUT_POST, 'name');

                $success = $stmt->execute([':name' => $name]);
            } else {
                if ($selection == "description") {
                    $teams = filter_input(INPUT_POST, 'description');

                    $success = $stmt->execute([':description' => $teams]);
                } else {
                    if ($selection == "teams") {
                        $teams = filter_input(INPUT_POST, 'teams');

                        $success = $stmt->execute([':teams' => $teams]);
                    }
                }
            }


            if ($success) {
                echo "<p id='msg'>The record has been deleted from the database.</p>";
            } else {
                echo "There was an error.";
            }

            $db = null;
        } catch (PDOException $e) {
            print "We had an error: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    if (!isset($_POST['submit'])) {
    ?>
        <form id=login action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div>
                <input type="checkbox" name="delbyname">
                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name"><br>

                <input type="checkbox" name="delbydes">
                <label for="description">Description:</label><br>
                <input type="text" name="description" id="description"><br>

                <input type="checkbox" name="delbyteam">
                <label for="teams">Team:</label><br>
                <input type=number name="teams" id="teams"><br>
            </div>

            <br><input type="submit" class="actionbttns" name="submit" value="Delete Record">

        </form>
    <?php
    } else {
        if (isset($_POST['delbyname'])) {
            dbquery('name');
        } else {
            if (isset($_POST['delbydes'])) {
                dbquery('description');
            } else {
                if (isset($_POST['delbyteam'])) {
                    dbquery('teams');
                }
            }
        }
    }

    ?>
    <div class="footer">
        <input onclick="location.href='../index.php'" class="actionbttns" value="Home">
        <input onclick="location.href='projects.php'" class="actionbttns" value="Projects page">
    </div>
</body>


</html>