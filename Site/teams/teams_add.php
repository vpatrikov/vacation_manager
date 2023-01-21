<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit projects data</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1>Edit data for teams</h1>
    </header>
    <?php
    if(!isset($_POST['add'])){
    ?>
    <form id=login action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="div_align">
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" required><br>
            <label for="team">Project:</label><br>
            <input type="number" name="project" id="project" required><br><br>
            <input type="submit" class="actionbttns" name="add" value="Add Data">
            <input onclick="location.href='teams_delete.php'" class="actionbttns" name="delete" value="Delete Data">
            <input onclick="location.href='teams_update.php'" class="actionbttns" name="edit" value="Edit Data">
        </div>
    </form>

    <?php
    } else {
        try{
            $db = new PDO('sqlite:../../Database.db');
            $sql = "INSERT INTO Teams (id, name, project) VALUES (NULL, :name, :project)";
            $stmt = $db->prepare($sql);

            $name = filter_input(INPUT_POST, 'name');
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            $project = filter_input(INPUT_POST, 'project');
            $stmt->bindValue(':project', $project, PDO::PARAM_INT);

            $success = $stmt->execute();
            if($success){
                echo "<p id='msg'>The team has been added to the database.</p>";
            }else{
                echo "There was an error."; 
            }

            $db = null;
            
        } catch(PDOException $e){
            print "We had an error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
        ?>

    <div class="footer">
            <input onclick="location.href='../index.php'" class="actionbttns" value="Home">
            <input onclick="location.href='teams.php'" class="actionbttns" value="Teams page">
        </div>
</body>

</html>