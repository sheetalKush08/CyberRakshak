<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Login - CyberRakshak</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="style.css">

<style>

body{
    min-height:100vh;
    background:#0F172A;
    padding-top:0px;
}

.admin-container{
    height:calc(100vh - 100px);
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.form-box{
    width:400px;
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

.form-box input{
    width:100%;
    padding:14px;
    margin-bottom:20px;
    border:none;
    border-radius:8px;
    background:#1E293B;
    color:white;
}

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

<div class="admin-container">

    <div class="form-box">

        <h2>Admin Login</h2>

        <form action="admin-login-process.php" method="POST">

            <input
            type="email"
            name="email"
            placeholder="Admin Email"
            required>

            <input
            type="password"
            name="password"
            placeholder="Password"
            required>

            <button type="submit">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>
