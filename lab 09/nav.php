<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
            .flex{
                display: flex;
                justify-content: space-around;
            }
    </style>
    <title>Document</title>
</head>
<body>

    <div class="flex" >
        <?php
 
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $userType = $_SESSION['userType'];
                echo '<a href="profile.php">Profile</a>
                <a href="dashboard.php">Dashboard</a>
                ';
                if($userType==1){
                    echo '                <a href="users.php">Users</a>';
                }
                echo '<a href="logout.php">Logout</a>';
            }else{
                echo '    <a href="login.php">Login</a>
                <a href="signup.php">Signup</a>';
                
            }
        ?>

    </div>
</body>
</html>