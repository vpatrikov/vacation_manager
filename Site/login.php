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
        <h1>Register</h1>
    </header>


    <div id="regist">
        <label for="fname">Име:</label>
        <input type="text" id="fname" name="fname" maxlength="10"><br><br>
        <label for="lname">Фамилия:</label>
        <input type="text" id="lname" name="lname" maxlength="15"><br><br>
        <label for="nickname">Username:</label>
        <input type="text" id="nickname" name="nickname" maxlength="12"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="10"><br><br>
        <label for="passwordRep">Repeat password:</label>
        <input type="password" id="passwordRep" name="passwordRep" maxlength="10"><br><br>
        <button onclick="addUser()">
            <h4>Register!</h4>
        </button>
        <p id="isisnt" style="font-size:medium">0</p>
    </div>

    <div id="login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" maxlength="10"><br><br>
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" maxlength="10"><br><br>
        <button onclick="logIn()">Log In</button>
    </div>
    <button><a href="index.php">Return to Home</a></button>
    <script src="prj.js"></script>
</body>

</html>