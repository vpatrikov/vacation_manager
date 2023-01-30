<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit projects data</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico?v=1"/>
</head>

<body>
    <header>
        <h1>Add data for teams</h1>
    </header>
    <?php
    if (!isset($_POST['add'])) {
    ?>
        <form id=login action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="div_align">
                <input class="textboxes" type="text" name="name" id="name" placeholder="Enter Name"><br>
                <input class="textboxes" type="number" name="project" id="project" placeholder="Enter Project"><br><br>
                <input type="submit" class="actionbttns" name="add" value="Add Data">
            </div>
        </form>

        <?php
    } else {
        try {
            $db = new PDO('sqlite:../../Database.db');
            $sql = "INSERT INTO Teams (id, name, project) VALUES (NULL, :name, :project)";
            $stmt = $db->prepare($sql);

            $name = filter_input(INPUT_POST, 'name');
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            $project = filter_input(INPUT_POST, 'project');
            $stmt->bindValue(':project', $project, PDO::PARAM_INT);

            $success = $stmt->execute();
            if ($success) {
                header("Location: teams.php");
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
        <input onclick="location.href='teams.php'" class="actionbttns" value="Teams page">
    </footer>
</body>

</html>