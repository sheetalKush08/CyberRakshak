<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: ../admin-login.php");
    exit();
}

include 'db.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    die("Invalid Request");
}

$id = mysqli_real_escape_string($conn, $_POST['id']);
$status = mysqli_real_escape_string($conn, $_POST['status']);

$sql = "UPDATE complaints
        SET status='$status'
        WHERE id='$id'";

$result = mysqli_query($conn, $sql);

if($result){
    header("Location: ../admin-dashboard.php");
    exit();
}else{
    die("Database Error: " . mysqli_error($conn));
}
?>