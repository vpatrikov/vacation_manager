<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
</head>

<body>
    <?php
    session_start();
    ?>
    <header>
        <?php if ($_SESSION['role'] == 'CEO') { ?>
            <h1>Users</h1>
        <?php } else { ?>
            <h1>Team Members</h1>
        <?php } ?>

        <?php
        function print_data($statement)
        {
            if (is_string($statement)) {
                echo $statement;
                return;
            }

            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        
            if (count($users) == 0) {
                echo "<p class='text'>Invalid input</p>";
                return;
            } else {
                echo "<br><table border = 1>";
                if ($_SESSION['role'] == 'CEO') {
                    echo "
                <tr>
                    <td><b>ID<b></td>
                    <td><b>Username<b></td>
                    <td><b>Password<b></td>
                    <td><b>First Name<b></td>
                    <td><b>Last Name<b></td>
                    <td><b>Role<b></td>
                    <td><b>Team<b></td>
                    <td><b>Delete<b></td>
                    <td><b>Edit<b></td>
                </tr>";
                } else {
                    echo "
                <tr>
                    <td><b>ID<b></td>
                    <td><b>Username<b></td>
                    <td><b>First Name<b></td>
                    <td><b>Last Name<b></td>
                    <td><b>Role<b></td>
                    <td><b>Team<b></td>
                </tr>";
                }
        
                foreach ($users as $row => $data) {
                    if ($_SESSION['role'] == 'CEO') {
                        echo "<tr>";

                        echo "<td>" . $data['id'] . "." . "</td>";
                        echo "<td>" . $data['username'] . "</td>";
                        echo "<td>" . $data['pass'] . "</td>";
                        echo "<td>" . $data['fname'] . "</td>";
                        echo "<td>" . $data['lname'] . "</td>";
                        echo "<td>" . $data['role'] . "</td>";
                        echo "<td>" . $data['team'] . "</td>";
        
                        echo "<td align='center'>" ?> <a class='a_links' href="users_update.php?id=<?php echo $data['id']; ?>">Edit</a></td><?php
                        echo "<td align='center'>" ?> <a class='a_links' href="users_delete.php?id=<?php echo $data['id']; ?>">Delete</a></td><?php
                        
                        echo "</tr>";
                    } else {
                        echo "<tr>";

                        echo "<td>" . $data['id'] . "." . "</td>";
                        echo "<td>" . $data['username'] . "</td>";
                        echo "<td>" . $data['fname'] . "</td>";
                        echo "<td>" . $data['lname'] . "</td>";
                        echo "<td>" . $data['role'] . "</td>";
                        echo "<td>" . $data['team'] . "</td>";
                        echo "</tr>";
        
                    }
                }
                echo "</table>";
            }
        }
        
        ?>

        <nav>
            <a href="../index.php">Home</a>
            <a href="../teams/teams.php">Teams</a>
            <a href="../projects/projects.php">Projects</a>
            <a href="../vacations/vacations.php">Vacations</a>
            <?php if ($_SESSION['role'] != 'CEO') { ?>
                <a href="users.php">Team Members</a>
            <?php } else { ?>
                <a href="users.php">Users</a>
            <?php } ?>
        </nav>
    </header>

    <form class="div_align scrollabe" method="post">
        <input class="textboxes_filter" style="width:17%;" type="text" name="filter_username" placeholder="Filter by username:">
        <input class="textboxes_filter" style="width:17%;" type="text" name="filter_fname" placeholder="Filter by first name:">
        <input class="textboxes_filter" style="width:17%;" type="text" name="filter_lname" placeholder="Filter by last name:">
        <input class="textboxes_filter" type="text" style="width:12%;" name="filter_role" placeholder="Filter by role:"><br><br>
        <input class="actionbttns" type="submit" name="filter" value="Filter">
    </form>

    <?php
    function generatePaginationLinks($currentPage, $totalPages)
    {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '" ' . ($currentPage == $i ? 'class="active"' : '') . '>' . $i . '</a>';
        }
        echo '</div>';
    }
    
    $team = $_SESSION['team'];
    if (!isset($_POST['filter'])) {
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $recordsPerPage = 10;
        $offset = ($currentPage - 1) * $recordsPerPage;
    
        if ($_SESSION['role'] == 'CEO') {
            $query = "SELECT * FROM Users LIMIT :limit OFFSET :offset";
        } else {
            $query = "SELECT * FROM Users WHERE team = :team LIMIT :limit OFFSET :offset";
        }
        $db = new PDO("sqlite:../../Database.db");
        $statement = $db->prepare($query);
        $statement->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        if ($_SESSION['role'] != 'CEO') {
            $statement->bindValue(':team', $team, PDO::PARAM_STR);
        }
        $statement->execute();
    
        print_data($statement);
    
        $totalCountQuery = ($_SESSION['role'] == 'CEO') ? "SELECT COUNT(*) FROM Users" : "SELECT COUNT(*) FROM Users WHERE team = :team";
        $totalCountStatement = $db->prepare($totalCountQuery);
        if ($_SESSION['role'] != 'CEO') {
            $totalCountStatement->bindValue(':team', $team, PDO::PARAM_STR);
        }
        $totalCountStatement->execute();
        $totalCount = $totalCountStatement->fetchColumn();
    
        $totalPages = ceil($totalCount / $recordsPerPage);
    
        generatePaginationLinks($currentPage, $totalPages);
    } else {
        $username = $_POST['filter_username'];
        $fname = $_POST["filter_fname"];
        $lname = $_POST["filter_lname"];
        $role = $_POST["filter_role"];
    
        $query = "SELECT * FROM Users";
        $conditions = array();
    
        if ($fname) {
            $conditions[] = "fname = '$fname'";
        }
        if ($lname) {
            $conditions[] = "lname = '$lname'";
        }
        if ($username) {
            $conditions[] = "username = '$username'";
        }
        if ($role) {
            $conditions[] = "role = '$role'";
        }
    
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
        $db = new PDO("sqlite:../../Database.db");
        $statement = $db->prepare($query);
        $statement->execute();
    
        print_data($statement);
    
        $totalCountQuery = "SELECT COUNT(*) FROM Users";
        if (!empty($conditions)) {
            $totalCountQuery .= " WHERE " . implode(" AND ", $conditions);
        }
        $totalCountStatement = $db->prepare($totalCountQuery);
        $totalCountStatement->execute();
        $totalCount = $totalCountStatement->fetchColumn();
    
        $recordsPerPage = 10;
        $totalPages = ($totalCount > 0) ? ceil($totalCount / $recordsPerPage) : 1;
    
        generatePaginationLinks(1, $totalPages);
    }
    ?>
    
</body>
</html>
