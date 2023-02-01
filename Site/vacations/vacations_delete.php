<?php
$pdo = new PDO("sqlite:../../Database.db");

$id = $_REQUEST['id'];

$sql = 'DELETE FROM Vacations '
    . 'WHERE id = :vacation_id';

$stmt = $pdo->prepare($sql);

$success = $stmt->execute([':vacation_id' => $id]);

if($success){
    header("Location: vacations.php");
}else{
    echo "There was an error";
}
