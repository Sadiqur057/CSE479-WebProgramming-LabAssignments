<?php
include 'db.php';
include 'nav.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id= $_POST['userId'];
    $pass= $_POST['pass'];
    $cpass= $_POST['cpass'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $isAdmin= $_POST['isAdmin'];

    $existSql = "SELECT * FROM `info` WHERE `id` = '$id' AND `email`= '$email'";
    $existRes = mysqli_query($conn,$existSql);
    if($existRes){
        $numRows= mysqli_num_rows($existRes);
        if($numRows==1){
            $userExist= true;
        }else{
            $userExist= false;
        }
    }
    if($pass==$cpass){
        if($userExist==false){
            $sql= "INSERT INTO `info` (`id`, `pass`, `name`, `email`, `isAdmin`) VALUES ('$id', '$pass', '$name', '$email', '$isAdmin');";
            $res= mysqli_query($conn,$sql);
            echo "Account created. Please Login";
        }else{
            echo "User already exists";
        }
    }else{
        echo "Password doesnot matched";
    }
}

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
    <div class="box">
    <form action="signup.php" method="POST">
        <h3>REGISTRATION</h1>
        <label for="userId">ID</label><br>
        <input type="text" name="userId" id="userId"><br>

        <label for="pass">Password</label><br>
        <input type="text" name="pass" id="pass"><br>

        <label for="cpass">Confirm Password</label><br>
        <input type="text" name="cpass" id="cpass"><br>

        <label for="name">Name</label><br>
        <input type="text" name="name"><br>

        <label for="email">Email</label><br>
        <input type="text" name="email"><br>

        <label for="isAdmin">User Type</label>
        <select name="isAdmin" id="isAdmin">
            <option value="1">Admin</option>
            <option value="0">User</option>

        </select><br><br>

        <input type="submit" value="Signup">
        
    </form>
    </div>


    </div>



</body>
</html>