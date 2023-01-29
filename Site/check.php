<?php
session_start();
$logged_in;
@$var = $_SESSION['logged_in'];
if($var)
{
    $logged_in = true;
}else{
    $logged_in = false;
}
?>