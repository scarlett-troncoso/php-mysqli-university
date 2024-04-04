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

var_dump($connection);
$sql = "SELECT * FROM `students`";
$result = $connection->query($sql);
?>