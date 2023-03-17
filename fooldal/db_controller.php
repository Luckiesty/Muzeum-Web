<?php 
    $DB_servername = "localhost";
    $DB_username = "root";
    $DB_password = "";
    $DB_name = "darkbluemoon";

    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);

    if($conn->connect_error)
    {
        die("Adatbázishoz való csatlakozás sikertelen volt." . $conn->connect_error);
    }
    echo "Sikeres volt a csatlakozás.";
?>