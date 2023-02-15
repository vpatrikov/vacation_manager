<?php
session_start();
$logged_in;
@$var = $_SESSION['logged_in'];
if ($var) {
    $logged_in = true;
    
    $db = new PDO('sqlite:../Database.db');
    $name_query = "SELECT fname, lname, role, team FROM Users WHERE username = '" . $_SESSION['username'] . "'";
    $stmt = $db->prepare($name_query);

    $stmt->execute();

    $result = $stmt->fetchAll();

    if(count($result) > 0)
    {
        $_SESSION['fname'] = $result[0]["fname"];
        $_SESSION['lname'] = $result[0]["lname"];
        $_SESSION['role'] = $result[0]["role"];
        $_SESSION['team'] = $result[0]["team"];
    }else{
        echo "There is an error.";
    }
} else {
    $logged_in = false;
}
