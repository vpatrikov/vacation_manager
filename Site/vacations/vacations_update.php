<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data for Vacations</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    @$ID = $_REQUEST['id'];
    echo "<header><h1>Edit data for record № " . $ID . "</h1></header>";

    if (!isset($_POST['submit'])) {
    ?>
        <form method="post" id=login action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <input class="textboxes" style="display:none" type="number" name="id" value=<?php echo $ID; ?>>
            <input class="textboxes" type="text" onfocus="(this.type = 'date')" placeholder="Enter From When" name="from" required><br>
            <input class="textboxes" type="text" onfocus="(this.type = 'date')" placeholder="Enter Until When" name="until" required><br>
            <input class="textboxes" type="text" onfocus="(this.type = 'date')" placeholder="Date Of Request" name="dor" required><br><br>
            <label for="halfday">Halfday:</label>
            <input type="checkbox" name="halfday">
            <label for="approved">Approved:</label>
            <input type="checkbox" name="approved"><br>
            <input class="textboxes" type="text" placeholder="Declarator" name="declarator" required><br><br>
            <input class="actionbttns" type="submit" name="submit" value="Update Record">
        </form>
    <?php
    } else {
        try {
            $db = new PDO('sqlite:../../Database.db');

            $approved = "false";
            $halfday = "false";
            $from = date("d.m.Y", strtotime($_POST['from']));
            $until = date("d.m.Y", strtotime($_POST['until']));
            $dor = date("d.m.Y", strtotime($_POST['dor']));

            if (isset($_POST['approved'])) {
                $approved = "true";
            }
            if (isset($_POST['halfday'])) {
                $halfday = "true";
            }

            //$db->exec('BEGIN IMMEDIATE');

            $sql = "UPDATE Vacations SET \"from\" = '$from', \"until\" = '$until', 
           \"dor\" = '$dor', \"halfday\" = '$halfday', \"approved\" = '$approved',
           \"declarator\" = '$_POST[declarator]' WHERE \"id\" = '$_POST[id]'";

            //$success=true;
            $success = $db->exec($sql);


            if ($success) {
                header("Location: vacations.php");
                //$db->commit();
            } else {
                echo "There was an error." . $success;
                //$db->rollBack();
            }
        } catch (PDOException $e) {
            print "We had an error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    ?>
    <footer>
        <input onclick="location.href='../index.php'" class="actionbttns" type="submit" value="Return Home">
        <input onclick="location.href='vacations.php'" class="actionbttns" type="submit" value="Return Vacations">
    </footer>
</body>

</html>