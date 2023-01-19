<?php
    $pdo = new PDO ('sqlite:Database.db');
    
    $statement = $pdo->query("SELECT * FROM Projects");

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    var_dump($rows);
?>