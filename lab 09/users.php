<?php

include 'db.php';
include 'nav.php';
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("location: login.php");
}
echo "<br>";

$id = $_SESSION['id'];
$sno = $_SESSION['sno'];
$pass = $_SESSION['pass'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$userType = $_SESSION['userType'];
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


<?php


    if($userType==1){
        
        echo '<table>
        <tr>
                <td colspan="4">Users</td>

            <tr>
        </tr>
            <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>User Type</td>

        </tr>';
        $sql= "SELECT * FROM `info` ";
        $res= mysqli_query($conn,$sql);

        while($row= mysqli_fetch_assoc($res)){
            if($row['isAdmin']==1){
                $user="Admin";
            }else{
                $user="User";
            }
            echo '
                <td> '.$row['id'] .'</td>
                <td> '. $row["name"].'</td>
                <td> '.$row["email"] .'</td>
                <td> '.$user .'</td>
            </tr>
            
            ';

            
        }
        echo '</table>';

    }
?>
</div>
</body>
</html>