<?php
include 'db.php';
include 'nav.php';

echo "<br>";
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("location: login.php");
}
$id = $_SESSION['id'];
$sno = $_SESSION['sno'];
$pass = $_SESSION['pass'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$userType = $_SESSION['userType'];
if($userType==1){
    $user = "Admin";
}else{
    $user= "User";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    </style>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <td colspan=2>Profile</td>
            </tr>
            <tr>
                <td>ID</td>
                <td><?php echo $id ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $name ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email ?></td>
            </tr>
            <tr>
                <td>User Type</td>
                <td><?php echo $user ?></td>
            </tr>
        </table>
    </div>
 
    
</body>
</html>