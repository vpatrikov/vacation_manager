<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data In Teams</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
</head>

<body>
    <?php
        $pdo = new PDO("sqlite:../../Database.db");

        $id = $_REQUEST['id'];
        echo "<header><h1>Edit data for record № " . $id . "</h1></header>"
        ?>

    <footer>
        <input onclick="location.href='../index.php'" class="actionbttns" value="Home">
        <input onclick="location.href='teams.php'" class="actionbttns" value="Teams page">
    <footer>
</body>

</html>