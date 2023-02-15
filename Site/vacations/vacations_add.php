<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1>Request Vacation</h1>
    </header>
    <?php
    session_start(); 
    if (!isset($_POST['add'])) {
    ?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="div_align scrollable">
                <input class="textboxes" type="text" onfocus="(this.type='date')" name="from" placeholder="Date From" required><br>
                <input class="textboxes" type="text" onfocus="(this.type='date')" name="until" placeholder="Date Until" required><br>
                <input class="textboxes" type="text" onfocus="(this.type='date')" name="dor" placeholder="Date Of Request" required><br><br>
                <label for="halfday">Halfday:</label>
                <input type="checkbox" name="halfday"><br>
                <input class="textboxes" type="text" name="declarator" placeholder="Declarator" required><br><br>
                <input type="submit" class="actionbttns" name="add" value="Add Data">
            </div>
        </form>
    <?php
    } else {
        try {
            $db = new PDO("sqlite:../../Database.db");

            $halfday = "false";
            $from = date("d.m.Y", strtotime($_POST['from']));
            $until = date("d.m.Y", strtotime($_POST['until']));
            $dor = date("d.m.Y", strtotime($_POST['dor']));

            if (isset($_POST['halfday'])) {
                $halfday = "true";
            }

            $sql = "INSERT INTO Vacations (id, 'from', until, dor, halfday, approved, declarator) 
            VALUES (NULL, \"$from\", \"$until\", \"$dor\", \"$halfday\", 'false', '$_POST[declarator]')";

            $success = $db->exec($sql);
            if ($success) {
                if($_SESSION['role'] == "CEO" || $_SESSION['role'] == "Team Lead")
                {
                    header("Location: vacations.php");
                } else {
                    header("Location: ../index.php");
                    echo "Vacation successfully requested";
                }
            } else {
                echo "There was an error.";
            }
            $db = null;
        } catch (PDOException $e) {
            print "We had an error: " . $e->getMessage() . "<br/>";
            echo $sql;
            die();
        }
    }
    ?>

    <footer>
        <input class=actionbttns type="submit" onclick="location.href='../index.php'" value="Return Home">
        <?php if($_SESSION['role'] == "CEO" || $_SESSION['role'] == "Team Lead"){
        ?>
        <input class=actionbttns type="submit" onclick="location.href='vacations.php'" value="Vacations Page">
        <?php }?>
    </footer>
</body>
</html>