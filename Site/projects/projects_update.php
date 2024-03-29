<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data for Projects</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
</head>

<body>
    <?php
    $pdo = new PDO("sqlite:../../Database.db");

    @$ID = $_REQUEST['id'];

    echo "<header><h1>Edit data for record № " . $ID . "</h1></header>";

    if (!isset($_POST['submit'])) {
    ?>
        <form id=login action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <input class="textboxes" style="display:none" type="number" name="id" value=<?php echo $ID; ?>>
            <input class="textboxes" type="text" name="name" placeholder="Update Name" required><br>
            <input class="textboxes" type="text" name="description" placeholder="Update Description" required><br>
            <input class="textboxes" type="number" name="team" placeholder="Update Team" required><br>
            <br><input class="actionbttns" type="submit" name="submit" value="Update Record" required>
        </form>
    <?php
    } else {
        try {
            $db = new PDO('sqlite:../../Database.db');
            $name = $_POST['name'];
            $description = $_POST['description'];
            $teams = $_POST['team'];
            @$id = $_POST['id'];

            $sql = "UPDATE Projects SET name='$name', description='$description', teams=$teams WHERE id=$id";

            $success = $db->exec($sql);
            if ($success) {
                header("Location: projects.php");
            } else {
                echo "There was an error.";
            }
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