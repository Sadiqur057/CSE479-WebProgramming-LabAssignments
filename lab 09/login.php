<?php
include 'nav.php';
?>

<div class="box-2">


<?php
include 'db.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $id= $_POST['userId'];
        $pass= $_POST['pass'];

        $sql= "SELECT * FROM `info` WHERE id='$id' AND pass = '$pass'";
        $res= mysqli_query($conn,$sql);

        if($res){
            $row= mysqli_fetch_assoc($res);
            $numRows= mysqli_num_rows($res);
            if($numRows==1){
                $sno = $row['sno'];
                $name = $row['name'];
                $email = $row['email'];
                $userType = $row['isAdmin'];
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sno']="$sno";
                $_SESSION['id']="$id";
                $_SESSION['pass']="$pass";
                $_SESSION['name']="$name";
                $_SESSION['email']="$email";
                $_SESSION['userType']="$userType";
                header("Location: dashboard.php");
            }else{
                echo"user not found";
            }
        }else{
            echo"user not found";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .box{
            border: 2px solid black;
            width: 180px;
            padding: 10px 20px;
            margin: 20px 10px;
            
        }
        .box-2{
            border: 2px solid black;
            width: 180px;
            padding: 10px 20px;
            margin: 80px 10px;
            height: 200px;
            
        }
        .container{
            display: flex;
            justify-content: space-around;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="login.php" method="POST">
    <h3>LOGIN</h1>
    <label for="userId">ID</label><br>
    <input type="text" name="userId" id="userId"><br>

    <label for="pass">Password</label><br>
    <input type="text" name="pass" id="pass"><br>

    <input type="submit" value="Login">
    
</form>
    </div>
</div>
</body>
</html>