<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit projects data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Edit data for Projects</h1>
    </header>
    <?php
    if(!isset($_POST['submit'])){
    ?>

    <form id=login>
        <div class="div_align">
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" required><br>
            <label for="description">Description:</label><br>
            <input type="text" name="description" id="description" required><br>
            <label for="team">Team:</label><br>
            <input type="number" name="team" id="team" required><br><br>
            <input type="submit" class="actionbttns" value="Add Data">
        </div>
    </form>
        <?php
    } else {
        try{
            $db = new PDO('sqlite:/../Database.db');
        }
    }
        ?>
    <div class="footer">
            <button><a href="index.php">Return to Home</a></button>
            <button><a href="projects.php">Return to Projects page</a></button>
        </div>
</body>

</html>