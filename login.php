<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include 'db.php';

if(!isset($_POST['email']) || !isset($_POST['password'])){
    header("Location: login.html");
    exit();
}

$email = trim($_POST['email']);
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if($result && mysqli_num_rows($result) == 1){

    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password'])){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];

        header("Location: dashboard.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Login Failed</title>

<style>

body{
    background:#0F172A;
    color:white;
    font-family:Arial,sans-serif;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
}

.error-box{
    background:#111827;
    padding:40px;
    border-radius:15px;
    text-align:center;
    width:500px;
    box-shadow:0 0 20px rgba(255,0,0,0.2);
}

.error-box h1{
    color:#EF4444;
    margin-bottom:20px;
}

.error-box p{
    color:#CBD5E1;
    margin-bottom:25px;
    line-height:1.6;
}

.error-box a{
    display:inline-block;
    padding:12px 25px;
    background:#00D4FF;
    color:black;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
}

.error-box a:hover{
    background:#38BDF8;
}

</style>

</head>

<body>

<div class="error-box">

    <h1>Login Failed</h1>

    <p>
        Invalid Email or Password.<br>
        Please check your credentials and try again.
    </p>

    <a href="login.html">
        Back to Login
    </a>

</div>

</body>
</html>
