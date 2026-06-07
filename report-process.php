<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}

include 'db.php';

$user_id = $_SESSION['user_id'];


if($_SERVER["REQUEST_METHOD"] != "POST"){
    die("Invalid Request");
}


$crime_type = mysqli_real_escape_string($conn, $_POST['crime_type']);
$description = mysqli_real_escape_string($conn, $_POST['description']);



$complaint_id = "CYB" . date("Ymd") . rand(1000,9999);


if(!isset($_FILES['evidence']) || $_FILES['evidence']['error'] != 0){
    die("Please upload evidence.");
}

$filename = $_FILES['evidence']['name'];
$tempname = $_FILES['evidence']['tmp_name'];
$filesize = $_FILES['evidence']['size'];

$fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

$allowed = ['jpg','jpeg','png','pdf'];

if(!in_array($fileExt, $allowed)){
    die("Only JPG, JPEG, PNG and PDF files are allowed.");
}

/* Max File Size 5MB */

if($filesize > 5 * 1024 * 1024){
    die("File size should be less than 5MB.");
}


$newFileName = time() . "_" . rand(1000,9999) . "." . $fileExt;

$uploadFolder = "../uploads/";

if(!is_dir($uploadFolder)){
    mkdir($uploadFolder, 0777, true);
}

$folder = $uploadFolder . $newFileName;



if(!move_uploaded_file($tempname, $folder)){
    die("File upload failed.");
}


$sql = "INSERT INTO complaints
(
    complaint_id,
    user_id,
    crime_type,
    description,
    evidence
)
VALUES
(
    '$complaint_id',
    '$user_id',
    '$crime_type',
    '$description',
    '$newFileName'
)";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("Database Error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Complaint Submitted</title>

<style>

body{
    margin:0;
    background:#0F172A;
    color:white;
    font-family:Arial,sans-serif;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.success-box{
    width:500px;
    background:#111827;
    padding:40px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 0 20px rgba(0,212,255,0.3);
}

.success-box h1{
    color:#00D4FF;
    margin-bottom:20px;
}

.success-box h2{
    color:#38BDF8;
    margin-bottom:20px;
}

.success-box p{
    color:#CBD5E1;
    line-height:1.6;
}

.success-box a{
    display:inline-block;
    margin-top:20px;
    padding:12px 25px;
    background:#00D4FF;
    color:black;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
    transition:0.3s;
}

.success-box a:hover{
    background:#38BDF8;
}

</style>

</head>

<body>

<div class="success-box">

    <h1>Complaint Submitted Successfully</h1>

    <h2>Complaint ID: <?php echo $complaint_id; ?></h2>

    <p>
        Your complaint has been registered successfully.
        Please save your Complaint ID for future tracking.
    </p>

    <a href="dashboard.php">
        Go to Dashboard
    </a>

</div>

</body>
</html>
