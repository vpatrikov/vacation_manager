# SQLite with PHP tutorial 
# https://www.youtube.com/watch?v=NB9jc8Nu2t4&list=PLU70qqWW4frENsWYAm-tAKp2ZJQ_dt3WR&index=1
# https://www.simplilearn.com/tutorials/php-tutorial/php-login-form#step_4_open_a_connection_to_a_mysql_database

<?php
    $pdo = new PDO ('sqlite:Database.db');
    
    $statement = $pdo->query("SELECT * FROM Projects");

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    var_dump($rows);
?>