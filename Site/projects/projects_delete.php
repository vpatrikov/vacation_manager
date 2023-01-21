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
    </header>

    <div class="div_align">
        <form method="get">
            <label for="name">Delete by name.</label>
            <input type="checkbox" name="name" id="name" onclick="visible('name', 'name_input')"><br>

            <div class="checkbox_input" id="name_input">
                <label for="name_input">Enter name:</label><br>
                <input type="text" name="name_input">
            </div>


            <label for="description">Delete by description.</label>
            <input type="checkbox" name="description" id="description" onclick="visible('description', 'des_input')"><br>
            <div class="checkbox_input" id="des_input">
                <label for="des_input">Enter description:</label><br>
                <input type="text" name="des_input">
            </div>


            <label for="teams">Delete by team.</label>
            <input type="checkbox" name="teams" id="teams" onclick="visible('teams', 'teams_input')">

            <div class="checkbox_input" id="teams_input">
                <label for="teams_input">Enter team:</label><br>
                <input type="number" name="teams_input">
            </div>

            <br><br><br><br><br><br><br><br><br><input class="actionbttns" type="submit" name="submit" value="Submit">
        </form>
    </div>
    <?php
    if (isset($_GET['submit'])) {
        
        @$var1 = $_GET['name'];
        @$var2 = $_GET['description'];
        @$var3 = $_GET['teams'];

        if (isset($var1)) {
            echo "Option 1 submitted successfully";
        } else {
            if (isset($var2)) {
                echo "Option 2 submited successfully";
            } else {
                if (isset($var3)) {
                    echo "Option 2 submited successfully";
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

<script src="../script.js"></script>

</html>