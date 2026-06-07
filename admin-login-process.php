<?php

session_start();

include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE email='$email'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1){

    $admin = mysqli_fetch_assoc($result);

    if($password == $admin['password']){

        $_SESSION['admin_id'] = $admin['id'];

        header("Location: ../admin-dashboard.php");
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
        Invalid Admin Email or Password.
        Please try again with correct credentials.
    </p>

    <a href="../admin-login.php">
        Back to Admin Login
    </a>

</div>

</body>
</html>