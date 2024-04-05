<?php 
// 1. Define some constants
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', '1_pt_university');

// 2. create an instance of the new connection
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// 3. check if there is a connection error
if ($connection && $connection->connect_error) {
    echo 'Database Connection Failed' . $connection->connect_error; // se non cé un errore in pagina ci restituisce NULL
    die;
}

// var_dump($connection);
$sql = "SELECT `courses`.`id`, `courses`.`name`, `courses`.`period`, `courses`.`year` FROM `courses` WHERE `period` = 'I semestre' AND `year` = 1;";

$result = $connection->query($sql);

// var_dump($result);

/*
while ($row = $result -> fetch_assoc()) {
   // var_dump($row);
   // var_dump($row['date_of_birth']); 

    ['name' => $name, 'period' => $period, 'year' => $year  ] = $row; // destructuring

    var_dump($name, $period, $year); 

    die;
}*/

/*
SELECT *
FROM `courses`
WHERE `period` = 'I semestre'
AND `year` = 1; */

/*
if (empty($_POST['year_of_birth'])) {
    $sql = "SELECT `students`.`id`, `students`.`name`, `students`.`surname`, `students`.`date_of_birth`
            FROM `students`";
    $result = $connection->query($sql);
}

if (!empty($_POST['year_of_birth'])) {
    $year_of_birth = $_POST['year_of_birth'];
    $sql = "SELECT `students`.`id`, `students`.`name`, `students`.`surname`, `students`.`date_of_birth`
            FROM `students`
            WHERE YEAR(`date_of_birth`) = '$year_of_birth' ";
            //=1990
   // var_dump($sql);
    $result = $connection->query($sql);
}*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Students</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"/>
    </head>

    <body>
        
        <header>
            <nav class="navbar navbar-expand navbar-light bg-light">
                <div class="nav navbar-nav">
                    <a class="navbar-link" href="./index.php">Students</a>
                    <a class="navbar-link" href="./degrees.php">Degrees</a>
                </div>
            </nav>  
        </header>
        <main>
            <div class="container py-4">
                <!--
                <form action="" method="post" class="d-flex mb-5">
                    <input type="number" name="year_of_birth" id="year_of_birth" placeholder="search by year of birth" class="form-control">
                    <button class="btn btn-primary">Search</button>
                    <a href="/" class="text-muted nav-link">Reset</a> 
                </form> -->  
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name Course</th>
                            <th scope="col">Period</th>
                            <th scope="col">Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) :
                            ['id' => $id, 'name' => $name, 'period' => $period, 'year' => $year ] = $row; ?> 
                                <tr>
                                    <th scope="row"><?= $id ?></th>
                                    <td><?= $name ?></td>
                                    <td><?= $period ?></td>
                                    <td><?= $year ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>           
            </div>
    
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        
    </body>
</html>