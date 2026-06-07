<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$password = $_POST['password'];

/* Check Existing Email */

$check = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE email='$email'"
);

if(mysqli_num_rows($check) > 0){

?>

<!DOCTYPE html>
<html>
<head>

<title>Email Already Registered</title>

<style>

body{
    background:#0F172A;
    color:white;
    font-family:Arial,sans-serif;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;
}

.box{
    background:#111827;
    padding:40px;
    border-radius:15px;
    text-align:center;
    width:500px;
}

.box h1{
    color:#EF4444;
    margin-bottom:15px;
}

.box p{
    margin-bottom:25px;
    color:#CBD5E1;
}

.btn{
    display:inline-block;
    padding:12px 25px;
    background:#00D4FF;
    color:black;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="box">

<h1>Email Already Registered</h1>

<p>
An account already exists with this email address.
Please login or use another email.
</p>

<a href="login.html" class="btn">
Go to Login
</a>

</div>

</body>
</html>

<?php

exit();

}

/* Password Hashing */

$hashedPassword = password_hash(
    $password,
    PASSWORD_DEFAULT
);

/* Insert User */

$sql = "INSERT INTO users
(fullname,email,password)

VALUES

('$fullname','$email','$hashedPassword')";

$result = mysqli_query($conn,$sql);

if($result){

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Registration Successful</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#0F172A;
    color:white;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;
}

.success-box{

    width:600px;
    max-width:90%;

    background:#111827;

    padding:50px 40px;

    border-radius:15px;

    text-align:center;

    box-shadow:0 0 25px rgba(0,212,255,0.25);
}

.success-icon{
    font-size:70px;
    margin-bottom:20px;
}

.success-box h1{
    color:#00D4FF;
    margin-bottom:20px;
}

.success-box p{
    color:#CBD5E1;
    font-size:18px;
    line-height:1.8;
    margin-bottom:30px;
}

.login-btn{

    display:inline-block;

    padding:14px 30px;

    background:#00D4FF;
    color:black;

    text-decoration:none;

    border-radius:10px;

    font-weight:bold;

    transition:.3s;
}

.login-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 0 20px rgba(0,212,255,0.5);
}

</style>

</head>

<body>

<div class="success-box">

<div class="success-icon">🎉</div>

<h1>Registration Successful!</h1>

<p>

Welcome
<strong><?php echo htmlspecialchars($fullname); ?></strong>,

your CyberRakshak account has been created successfully.

You can now log in to report cyber crimes, track complaints and access cyber safety services.

</p>

<a href="login.html" class="login-btn">
Login Now
</a>

</div>

</body>

</html>

<?php

}else{

?>

<!DOCTYPE html>
<html>

<head>

<title>Registration Failed</title>

<style>

body{
    background:#0F172A;
    color:white;

    font-family:Arial,sans-serif;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;
}

.error-box{
    background:#111827;
    padding:40px;
    border-radius:15px;
    text-align:center;
    width:500px;
}

.error-box h1{
    color:#EF4444;
    margin-bottom:15px;
}

.error-box p{
    color:#CBD5E1;
    margin-bottom:25px;
}

.btn{
    display:inline-block;
    padding:12px 25px;

    background:#00D4FF;
    color:black;

    text-decoration:none;
    border-radius:8px;

    font-weight:bold;
}

</style>

</head>

<body>

<div class="error-box">

<h1>Registration Failed</h1>

<p>
Unable to create account at this time.
Please try again later.
</p>

<a href="register.html" class="btn">
Back to Register
</a>

</div>

</body>

</html>

<?php

}

?>
