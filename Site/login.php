<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Vacation Manager</title>
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>
    
    <div id="login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" maxlength="10"><br><br>
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" maxlength="10"><br><br>
        <button >Log In</button>
    </div>
    <button><a href="index.php">Return to Home</a></button>
    <script src="prj.js"></script>
</body>

</html>
<?php
    $pdo = new PDO ('sqlite:../Database.db');


    
?>