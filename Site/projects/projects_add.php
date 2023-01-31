<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Projects Data</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
</head>

<body>
    <header>
        <h1>Add data to Projects</h1>
    </header>
    <?php
    if (!isset($_POST['add'])) {
    ?>
        <form id=login action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="div_align">
                <input class="textboxes" type="text" name="name" id="name" placeholder="Enter Name" required><br><br>

                <input class="textboxes" type="text" name="description" id="description" placeholder="Enter Description" required><br><br>

                <input class="textboxes" type="number" name="team" id="team" placeholder="Enter Team" required><br><br>

                <input class="actionbttns" type="submit" name="add" value="Add Data">
            </div>
        </form>

    <?php
    } else {
        try {
            $db = new PDO('sqlite:../../Database.db');
            $sql = "INSERT INTO Projects (id, name, description, teams) VALUES (NULL, :name, :description, :team)";
            $stmt = $db->prepare($sql);

            $name = filter_input(INPUT_POST, 'name');
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            $description = filter_input(INPUT_POST, 'description');
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);

            $team = filter_input(INPUT_POST, 'team');
            $stmt->bindValue(':team', $team, PDO::PARAM_INT);

            $success = $stmt->execute();
            if ($success) {
                header("Location: projects.php");
            } else {
                echo "There was an error.";
            }

            $db = null;
        } catch (PDOException $e) {
            print "We had an error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    ?>

    <footer>
        <input onclick="location.href='../index.php'" class="actionbttns" value="Home">
        <input onclick="location.href='projects.php'" class="actionbttns" value="Projects page">
    </footer>
</body>

</html>