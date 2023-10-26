<?php

include 'db.php';
include 'nav.php';
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("location: login.php");
}
$name=$_SESSION['name'];
$userType=$_SESSION['userType'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    
    <div class="container">
        <div class="profile-box">
            <h2>Welcome <?php echo $name ?></h2>
            <a href="dashboard.php">Profile</a><br>
            <a href="changePass.php">Change Password</a><br>
            <?php if($userType==1){
                echo"<a href='users.php'>View Users</a><br>";
            } 
            
            ?>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>

</html>