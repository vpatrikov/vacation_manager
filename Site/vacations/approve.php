<?php
    $db = new PDO('sqlite:../../Database.db');
    
    $id = $_REQUEST['id'];

    $sql = "UPDATE Vacations SET approved = 'true' WHERE id = '$id'";
    
    $success = $db->exec($sql);

    if($success){
        header("Location: vacations_approve.php");
    }else{
        echo "There was an error";
    }
?>