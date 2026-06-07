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

  <title>Dashboard</title>
  <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="style.css">
</head>

<body>
   <nav class="navbar">

   <div class="logo">
    <img src="cybericon.png" alt="CyberRakshak">
    <span>CyberRakshak</span>
</div>

    <ul class="nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="#awareness">Awareness</a></li>
      <li><a href="report.php">Report Crime</a></li>
      <li><a href="track.php">Track Complaint</a></li>
      <li><a href="login.html">Login</a></li>
      <li><a href="admin-login.php">Admin</a></li>
    </ul>

  </nav>

<div class="dashboard">

  <h1>
    Welcome,
    <?php echo $_SESSION['user_name']; ?>
  </h1>

  <p>
    You are successfully logged in.
  </p>

  <a href="logout.php">
    Logout
  </a>

</div>

</body>
</html>
