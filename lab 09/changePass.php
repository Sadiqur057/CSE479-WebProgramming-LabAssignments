<?php
   include "nav.php";
   include "db.php";
   if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("location: login.php");
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
    <div class="box-3" style="border:2px solid black ;padding: 10px ;width:200px; margin:100px auto" >
        <form action="changePass.php" method="POST">
            <h3>Change Password</h3>
            <label for="currpass">Current Password</label><br>
            <input type="text" name="currpass" id="currpass"><br>

            <label for="newpass">Password</label><br>
            <input type="text" name="newpass" id="newpass"><br>
            <label for="newcpass">Retype Password</label><br>
            <input type="text" name="newcpass" id="newcpass"><br><br>

            <input type="submit" value="Update">
        </form>
    </div>


    <?php
 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $currpass = $_POST['currpass'];
        $newpass = $_POST['newpass'];
        $newcpass = $_POST['newcpass'];
        $id = $_SESSION['id'];
        $sno = $_SESSION['sno'];
        if ($newpass == $newcpass) {
            $sql = "UPDATE `info` SET `pass` = '$newpass' WHERE `info`.`sno` = '$sno' AND `info`.`pass`='$currpass'";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo "Success";
                header("location: dashboard.php");
            } else {
                echo "failed";
            }
        }
    }
    ?>

    </div><br><br>
</body>

</html>