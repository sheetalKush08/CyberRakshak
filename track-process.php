<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . '/db.php';

// CHECK FORM SUBMISSION
if(!isset($_POST['complaint_id'])){
    header("Location: ../track.php");
    exit();
}

$complaint_id = mysqli_real_escape_string($conn, $_POST['complaint_id']);

$sql = "SELECT * FROM complaints WHERE complaint_id='$complaint_id'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Track Complaint Status</title>

<style>

/* BODY */
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

/* MAIN BOX */
.track-box{
    background:#111827;
    padding:40px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 0 20px rgba(0,212,255,0.3);
    width:420px;
    animation:fadeIn 0.4s ease-in-out;
}

/* ANIMATION */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

/* TITLE */
.track-box h1{
    color:#00D4FF;
    margin-bottom:20px;
}

/* TEXT */
.track-box h2{
    margin:12px 0;
}

/* DESCRIPTION */
.track-box p{
    color:#CBD5E1;
}

/* STATUS */
.status{
    padding:8px 12px;
    border-radius:6px;
    font-weight:bold;
    display:inline-block;
    margin-top:10px;
}

/* COLORS */
.pending{ background:#F59E0B; color:black; }
.investigating{ background:#3B82F6; }
.resolved{ background:#10B981; }
.rejected{ background:#EF4444; }

/* BUTTON */
.track-box a{
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

.track-box a:hover{
    background:#38BDF8;
    transform:translateY(-2px);
}

/* NOT FOUND */
.notfound{
    color:#EF4444;
}

/* MOBILE */
@media(max-width:500px){
    .track-box{
        width:90%;
        padding:25px;
    }
}

</style>

</head>

<body>

<?php if($result && mysqli_num_rows($result) > 0){ 
    $row = mysqli_fetch_assoc($result);
?>

<div class="track-box">

<h1>Complaint Status</h1>

<h2>Complaint ID: <?php echo $row['complaint_id']; ?></h2>

<h2>Crime Type: <?php echo $row['crime_type']; ?></h2>

<h2>
Status:
<span class="status <?php echo strtolower($row['status']); ?>">
<?php echo $row['status']; ?>
</span>
</h2>

<p><?php echo $row['description']; ?></p>

<a href="../track.php">Track Another Complaint</a>

</div>

<?php } else { ?>

<div class="track-box notfound">

<h1>No Complaint Found</h1>

<p>Please check your Complaint ID and try again.</p>

<a href="../track.php">Try Again</a>

</div>

<?php } ?>

</body>
</html>