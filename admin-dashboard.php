<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin-login.php");
    exit();
}

include 'php/db.php';

/* Dashboard Statistics */

$total = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM complaints")
);

$pending = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM complaints WHERE status='Pending'")
)['total'];

$investigating = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM complaints WHERE status='Investigating'")
)['total'];

$resolved = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM complaints WHERE status='Resolved'")
)['total'];

/* Complaints */

$sql = "SELECT * FROM complaints ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CyberRakshak Admin Dashboard</title>
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

/* Heading */

.dashboard-title{
    text-align:center;
    margin:30px 0;
    color:#00D4FF;
}

/* Stats */

.stats-container{
    width:90%;
    margin:auto;

    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
}

.card{
    width:220px;
    background:#111827;

    padding:25px;

    border-radius:12px;

    text-align:center;

    box-shadow:0 0 15px rgba(0,212,255,0.2);
}

.card h2{
    color:#00D4FF;
    font-size:36px;
    margin-bottom:10px;
}


.table-container{
    width:95%;
    margin:40px auto;
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    color:black;
}

th{
    background:#00D4FF;
    color:black;
}

th,td{
    padding:15px;
    text-align:center;
    border:1px solid #ddd;
}

select{
    padding:8px;
}

button{
    padding:8px 12px;
    border:none;
    background:#00D4FF;
    font-weight:bold;
    cursor:pointer;
    border-radius:5px;
}

button:hover{
    background:#38BDF8;
}

.view-btn{
    background:#10B981;
    color:white;
    padding:8px 12px;
    border-radius:5px;
    text-decoration:none;
}

.view-btn:hover{
    opacity:0.9;
}


@media(max-width:768px){

    .navbar{
        flex-direction:column;
        gap:15px;
    }

    .nav-links{
        flex-wrap:wrap;
        justify-content:center;
    }

}

</style>

</head>

<body>

<nav class="navbar">

<div class="logo">
    <img src="assets/cybericon.png" alt="Logo">
    <span>CyberRakshak</span>
</div>

<ul class="nav-links">

<li><a href="index.html">Home</a></li>

<li><a href="admin-logout.php">Logout</a></li>

</ul>

</nav>

<h1 class="dashboard-title">
CyberRakshak Admin Dashboard
</h1>

<div class="stats-container">

<div class="card">
    <h2><?php echo $total; ?></h2>
    <p>Total Complaints</p>
</div>

<div class="card">
    <h2><?php echo $pending; ?></h2>
    <p>Pending</p>
</div>

<div class="card">
    <h2><?php echo $investigating; ?></h2>
    <p>Investigating</p>
</div>

<div class="card">
    <h2><?php echo $resolved; ?></h2>
    <p>Resolved</p>
</div>

</div>


<div class="table-container">

<table>

<tr>

<th>ID</th>
<th>Complaint ID</th>
<th>Crime Type</th>
<th>Status</th>
<th>Evidence</th>
<th>Update Status</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['complaint_id']; ?></td>

<td><?php echo $row['crime_type']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a
class="view-btn"
href="uploads/<?php echo $row['evidence']; ?>"
target="_blank">

View File

</a>

</td>

<td>

<form action="php/update-status.php" method="POST">

<input
type="hidden"
name="id"
value="<?php echo $row['id']; ?>"
>

<select name="status">

<option value="Pending"
<?php if($row['status']=="Pending") echo "selected"; ?>>
Pending
</option>

<option value="Investigating"
<?php if($row['status']=="Investigating") echo "selected"; ?>>
Investigating
</option>

<option value="Resolved"
<?php if($row['status']=="Resolved") echo "selected"; ?>>
Resolved
</option>

<option value="Rejected"
<?php if($row['status']=="Rejected") echo "selected"; ?>>
Rejected
</option>

</select>

<button type="submit">
Update
</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>