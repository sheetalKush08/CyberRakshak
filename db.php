<?php

$host = "localhost";
$user = "root";
$password = "your password";
$database = "your db name";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>
