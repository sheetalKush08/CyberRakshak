<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

$sql = "INSERT INTO feedback(name, message)
VALUES('$name', '$message')";

$result = mysqli_query($conn, $sql);

if($result){
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Feedback Submitted</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
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
    line-height:1.7;
    margin-bottom:30px;
}

.home-btn{

    display:inline-block;

    padding:14px 30px;

    background:#00D4FF;
    color:black;

    text-decoration:none;
    font-weight:bold;

    border-radius:10px;

    transition:.3s;
}

.home-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 0 20px rgba(0,212,255,0.5);
}

</style>

</head>

<body>

<div class="success-box">

    <div class="success-icon">💬</div>

    <h1>Thank You for Your Feedback!</h1>

    <p>
        Dear <strong><?php echo htmlspecialchars($name); ?></strong>,
        thank you for sharing your valuable feedback and suggestions.
        Your input helps us improve CyberRakshak and provide better
        cyber safety services to citizens.
    </p>

    <a href="../index.html" class="home-btn">
        Return to Home
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

<title>Feedback Failed</title>

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
}

.error-box h1{
    color:#EF4444;
    margin-bottom:15px;
}

.error-box a{
    display:inline-block;
    margin-top:20px;
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

<h1>Feedback Submission Failed</h1>

<p>Please try again later.</p>

<a href="../index.html">Back to Home</a>

</div>

</body>

</html>

<?php

}

?>