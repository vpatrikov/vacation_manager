<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Register</title>
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>
    <div id="regist">
        <input class="textboxes" type="text" id="fname" name="fname" placeholder="Enter First Name" maxlength="10"><br><br>
        <input class="textboxes" type="text" id="lname" name="lname" placeholder="Enter Last Name" maxlength="15"><br><br>
        <input class="textboxes" type="text" id="username" name="username" placeholder="Enter Username" maxlength="12"><br><br>
        <input class="textboxes" type="password" id="password" name="password" placeholder="Enter Password" maxlength="10"><br><br>
        <input class="textboxes" type="password" id="passwordRep" name="passwordRep" placeholder="Repeat Password" maxlength="10"><br><br>
        <input class="actionbttns" type="submit" name="register" value="Register"><br><br>
        <input onclick="location.href='../index.php'" type="submit" class="actionbttns" name="return" value="Home">
    </div>
    
</body>
</html>