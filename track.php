<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Track Complaint</title>
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="style.css">
<style>

body{
    min-height:100vh;
    background:#0F172A;
}
.form-container{
    height:calc(100vh - 80px);
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.form-box{
    width:500px;
    background:#111827;
    padding:40px;
    border-radius:15px;
    box-shadow:0 0 20px rgba(0,212,255,0.3);
    text-align:center;
}

.form-box h2{
    color:#00D4FF;
    margin-bottom:25px;
    font-size:32px;
}

.form-box input{
    width:100%;
    padding:15px;
    margin-bottom:20px;

    border:none;
    outline:none;

    border-radius:10px;

    background:#1E293B;
    color:white;

    font-size:16px;
}

.form-box button{
    width:100%;
    padding:15px;

    border:none;
    border-radius:10px;

    background:#00D4FF;
    color:black;

    font-size:16px;
    font-weight:bold;

    cursor:pointer;
    transition:0.3s;
}

.form-box button:hover{
    background:#38BDF8;
    transform:translateY(-2px);
    box-shadow:0 0 15px rgba(0,212,255,0.5);
}

.form-box input::placeholder{
    color:#94A3B8;
}

/* Mobile Responsive */

@media(max-width:768px){

    .form-box{
        width:95%;
        padding:30px 20px;
    }

    .form-box h2{
        font-size:26px;
    }

}

</style>

</head>

<body>
	<nav class="navbar">

    <div class="logo">
        <img src="cybericon.png" alt="CyberRakshak">
    <span>CyberRakshak</span>
    </div>

    <ul class="nav-links">

        <li><a href="index.html">Home</a></li>

        <li><a href="index.html#awareness">Awareness</a></li>

        <li><a href="report.php">Report Crime</a></li>

        <li><a href="track.php">Track Complaint</a></li>

        <li><a href="admin-login.php">Admin</a></li>
         <li><a href="index.html#footer">Contact</a></li>

    </ul>

</nav>


<div class="form-container">

<form
action="track-process.php"
method="POST"
class="form-box"
>

<h2>Track Complaint</h2>

<input
type="text"
name="complaint_id"
placeholder="Enter Complaint ID"
required
>

<button type="submit">
Track Status
</button>

</form>

</div>

</body>
</html>
