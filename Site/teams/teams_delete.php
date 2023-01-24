<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data In Teams</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
</head>

<body>
    <header>
        <h1>Delete data in Teams</h1>
        <h3>(select by what you want to delete the data)</h3>
    </header>
    <?php

    function dbquery($selection)
    {
        try {
            $db = new PDO('sqlite:../../Database.db');
            $sql = "DELETE FROM Teams WHERE $selection = :$selection ";
            $stmt = $db->prepare($sql);

            if ($selection == "name") {
                $name = filter_input(INPUT_POST, 'name');

                $success = $stmt->execute([':name' => $name]);
            } else {
                if ($selection == "project") {
                    $project = filter_input(INPUT_POST, 'project');

                    $success = $stmt->execute([':project' => $project]);
                }
            }


            if ($success) {
    ?>
                <div class="completed">
                    <p id='msg'>The record has been deleted from the database.</p>
                    <input onclick="location.href='teams_add.php'" class="actionbttns" value="Edit more data">
                </div>
        <?php
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

                <input type="checkbox" name="delbyproject">
                <label for="project">Team:</label><br>
                <input type="number" name="project" id="project"><br>
            </div>

            <br><input type="submit" class="actionbttns" name="submit" value="Delete Record">

        </form>
    <?php
    } else {
        if (isset($_POST['delbyname'])) {
            dbquery('name');
        } else {
            if (isset($_POST['delbyproject'])) {
                dbquery('project');
            } else {
                if (isset($_POST['delbyproject'])) {
                    dbquery('project');
                }
            }
        }
    }

    ?>
    <div class="footer">
        <input onclick="location.href='../index.php'" class="actionbttns" value="Home">
        <input onclick="location.href='teams.php'" class="actionbttns" value="Teams page">
    </div>
</body>


</html>