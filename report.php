<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

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

  <title>Report Crime</title>
  <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="css/style.css">
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
    width:550px;
    background:#111827;
    padding:40px;
    border-radius:15px;
    box-shadow:0 0 20px rgba(0,212,255,0.3);
}

.form-box h2{
    color:#00D4FF;
    text-align:center;
    margin-bottom:30px;
}

.form-box select,
.form-box textarea,
.form-box input[type="file"]{
    width:100%;
    padding:14px;
    margin-bottom:20px;

    border:none;
    outline:none;

    border-radius:8px;

    background:#1E293B;
    color:white;

    font-size:15px;
}


.form-box textarea{
    height:140px;
    resize:none;
}

.form-box input[type="file"]{
    cursor:pointer;
}

/* Button */

.form-box button{
    width:100%;
    padding:14px;

    border:none;
    border-radius:8px;

    background:#00D4FF;
    color:black;

    font-weight:bold;
    cursor:pointer;

    transition:0.3s;
}

.form-box button:hover{
    background:#38BDF8;
    transform:translateY(-2px);
    box-shadow:0 0 15px rgba(0,212,255,0.5);
}
@media(max-width:768px){

    .form-box{
        width:95%;
        padding:30px 20px;
    }

}

</style>
</head>

<body>
  <nav class="navbar">

    <div class="logo">
        <img src="assets/cybericon.png" alt="CyberRakshak">
    <span>CyberRakshak</span>
    </div>

    <ul class="nav-links">

        <li><a href="index.html">Home</a></li>

        <li><a href="index.html#awareness">Awareness</a></li>

        <li><a href="report.php">Report Crime</a></li>

        <li><a href="track.php">Track Complaint</a></li>

        <li><a href="login.html">Login</a></li>

        <li><a href="admin-login.php">Admin</a></li>

    </ul>

</nav>

<div class="form-container">

  <form 
    action="php/report-process.php" 
    method="POST"
    enctype="multipart/form-data"
    class="form-box"
  >

    <h2>Report Cyber Crime</h2>

    <select name="crime_type" required>

      <option value="">
        Select Crime Type
      </option>

      <option>Phishing</option>
      <option>OTP Fraud</option>
      <option>UPI Scam</option>
      <option>Identity Theft</option>
      <option>Social Media Hack</option>

    </select>

    <textarea
      name="description"
      placeholder="Describe the incident"
      required
    ></textarea>

    <input
      type="file"
      name="evidence"
      required
    >

    <button type="submit">
      Submit Complaint
    </button>

  </form>

</div>

</body>
</html>