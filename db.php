<?php
$host = "localhost";   
$dbname = "kwiaciarnia";  
$user = "root";           
$password = "";            

$conn = new mysqli($host, $user, $password, $dbname);

// Sprawdzenie błędu połączenia
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Ustawienie kodowania znaków na UTF-8
$conn->set_charset("utf8mb4");
session_start();
?>
