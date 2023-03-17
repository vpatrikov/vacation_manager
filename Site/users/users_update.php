<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    @$ID = $_REQUEST['id'];
    $db = new PDO("sqlite:../../Database.db");
    $name_query = "SELECT * FROM Users WHERE id = $ID";

    $statement = $db->query($name_query);

    $names = $statement->fetch(PDO::FETCH_ASSOC);
    $fname = $names['fname'];
    $lname = $names['lname'];

    echo "<header><h1>Edit the role & team for " . $fname . " " . $lname . "</h1></header>";

    if (!isset($_POST['submit'])) {
    ?>
        <form method="post" id=login action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <input class="textboxes" style="display:none" type="number" name="id" value=<?php echo $ID; ?>>
            <input class="textboxes" type="text" name="role" placeholder="Enter New Role:" required><br>
            <input class="textboxes" type="number" name="team" placeholder="Enter New Team:" required><br><br>
            <input class="actionbttns" type="submit" name="submit" value="Update User">
        </form>
    <?php
    } else {
        try {
            $role = $_POST['role'];
            $team = $_POST['team'];
            @$id = $_POST['id'];

            $query = "UPDATE Users SET team = '$team', 'role' = $role WHERE id = $id";
            $statement2 = $db->query($query);

            $success = $db->exec($query);

            if ($success) {
                header("Location: users.php");
            } else {
                echo "There was an error";
            }
        } catch (PDOException $e) {
            print "We had an error: " . $e->getMessage() . "<br/>";
            die();
        }

        $db = null;
    }
    ?>
</body>

</html>