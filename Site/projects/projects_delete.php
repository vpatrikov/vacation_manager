<?php
$pdo = new PDO("sqlite:../../Database.db");

$id = $_REQUEST['id'];

$sql = 'DELETE FROM Projects '
    . 'WHERE id = :project_id';

$stmt = $pdo->prepare($sql);

$success = $stmt->execute([':project_id' => $id]);

if($success){
    header("Location: /Site/projects/projects.php");
}else{
    echo "There was an error";
}
