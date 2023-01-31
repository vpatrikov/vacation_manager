<?php
$pdo = new PDO("sqlite:../../Database.db");

$id = $_REQUEST['id'];

$sql = 'DELETE FROM Users '
    . 'WHERE id = :user_id';

$stmt = $pdo->prepare($sql);

$success = $stmt->execute([':user_id' => $id]);

if($success){
    header("Location: users.php");
}else{
    echo "There was an error";
}
