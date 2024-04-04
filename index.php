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
// $sql = "SELECT * FROM `students`";
$sql = "SELECT * FROM `students`
WHERE YEAR(`date_of_birth`)=1990";

$result = $connection->query($sql);

var_dump($result);

/*
while ($row = $result -> fetch_assoc()) {
   // var_dump($row);
   // var_dump($row['date_of_birth']); 

    ['name' => $name, 'surname' => $surname, 'date_of_birth' => $date_of_birth  ] = $row; // destructuring

    var_dump($name, $surname, $date_of_birth); 

    die;
}*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>index php-mysqli-university</title>
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
            <!-- place navbar here -->
        </header>
        <main>
            <div>
                <?php while ($row = $result->fetch_assoc()) :
                    ['name' => $name, 'surname' => $surname, 'date_of_birth' => $date_of_birth  ] = $row; ?>
                        <div>
                            <strong>Name:</strong>
                            <?= $name . ' ' . $surname ?>
                        </div>
                        <div>
                            <strong>Date of birth:</strong>
                            <?= $date_of_birth ?>
                        </div>
                        <hr>
                    
                <?php endwhile; ?>
            </div>
    
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        
    </body>
</html>