<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
    <title>Register</title>
</head>

<body>
    <header>
        <h1>Register</h1>
    </header>
    <?php if (!isset($_POST['register'])) { ?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div id="regist">
                <input class="textboxes" type="text" id="fname" name="fname" placeholder="Enter First Name" maxlength="10"><br><br>
                <input class="textboxes" type="text" id="lname" name="lname" placeholder="Enter Last Name" maxlength="15"><br><br>
                <input class="textboxes" type="text" id="username" name="username" placeholder="Enter Username" maxlength="12"><br><br>
                <input class="textboxes" type="password" id="password" name="password" placeholder="Enter Password" maxlength="10"><br><br>
                <input class="textboxes" type="password" id="passwordRep" name="passwordRep" placeholder="Repeat Password" maxlength="10"><br><br>

                <input class="actionbttns" type="submit" name="register" value="Register"><br><br>

            </div>
        </form>
    <?php
    } else {
        try {
            $db = new PDO('sqlite:../../Database.db');
            $sql = "INSERT INTO Users (id, username, pass, fname, lname) VALUES (NULL, :username, :password, :fname, :lname)";
            $stmt = $db->prepare($sql);

            $username = filter_input(INPUT_POST, 'username');
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);

            $password = filter_input(INPUT_POST, 'password');
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);

            $fname = filter_input(INPUT_POST, 'fname');
            $stmt->bindValue(':fname', $lname, PDO::PARAM_STR);

            $lname = filter_input(INPUT_POST, 'lname');
            $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);

            $success = $stmt->execute();

            if ($success) {

                header("Location: ../index.php");
            } else {
                echo "There was an error.";
            }

            $db = null;
        } catch (PDOException $e) {
            print "We had an error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    ?>
    <footer>
        <input onclick="location.href='../index.php'" type="submit" class="actionbttns" name="return" value="Home">
    </footer>

</body>

</html>