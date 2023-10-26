<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_information";

$conn = mysqli_connect($servername, $username, $password, $database);

$fnameError = $nameError = $emailError = $passError = $ipError = $webError = $mobError = $lnameError = $genderError = $dobError = $infoError = "";
$cleanName= $email= $ip= $web=$dob=$gender=$mob=$info=$dataEntryMessage="";
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
}


// $dbCreate = "CREATE TABLE `user_information`.`user-info` (`id` INT NOT NULL AUTO_INCREMENT , `fname` VARCHAR(20) NOT NULL , `mname` VARCHAR(20) NOT NULL , `lname` VARCHAR(20) NOT NULL , `password` VARCHAR(30) NOT NULL , `ip` VARCHAR(30) NOT NULL , `web` VARCHAR(100) NOT NULL , `dob` VARCHAR(30) NOT NULL , `gender` VARCHAR(10) NOT NULL , `mob` VARCHAR(25) NOT NULL , `info` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";

$emailRegex = "/^[a-z\d\-\_\.]+@([a-z\d]+\.)+[a-z]{2,6}$/i";
$mobRegex = '/^(\+88)?(88)?(01)[3456789][\d]{8}$/';
$infoRegex = '/^[a-z\d]{1,50}$/';
$ipRegex = '/^(25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3}$/';
$passRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])[a-zA-z\d]{7,25}$/";
$webRegex = '/^(https:\/\/)?(http:\/\/)?(www.)?([a-z\d\-]{1,}\.)+[a-z]{2,}$/';
$dobRegex = '/^(([0-3][0-2]\-)|([0-2][0-9]\2)|([0-9])\-)(([0-1][0-9]\-)|([1-9])\-)([1-2][0,9][0-9][0-9])$/';

if ($conn) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mname = $_POST['mname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ip = $_POST['ip'];
        $web = $_POST['web'];
        $info = $_POST['info'];
        $dob = $_POST['dob'];
        $mob = $_POST['mob'];
        $info = $_POST['info'];
        $fullname = $fname . " " . $mname . " " . $lname;
        $nameRegex = '/\s+/';
        $clean = preg_replace($nameRegex, '', $fullname);
        $num = strlen($clean);
        $fnameRegex = '/\s\s+/';
        $cleanName=preg_replace($fnameRegex," ",$fullname);


        if (empty($fname)) {
            $fnameError = "First name is required";
        }
        if (empty($lname)) {
            $lnameError = "Last name is required";
        }
        if (!empty($fullname)) {
            if (!$num >= 4 && $num <= 20) {
                $nameError = "Name must be 4-20 character long";
            }
        }

        if (empty($email)) {
            $emailError = "Email is required!";
        } elseif (!preg_match($emailRegex, $email)) {
            $emailError = "Email is incorrect";
        }

        if (empty($password)) {
            $passError = "Password is required!";
        } elseif (!preg_match($passRegex, $password)) {
            $passError = "Password must contain a uppercase, a lowercase, a number and no special character and in between 7-25 character";
        }

        if (empty($ip)) {
            $ipError = "IP address is required!";
        } elseif (!preg_match($ipRegex, $ip)) {
            $ipError = "IP address is incorrect";
        }

        if (empty($web)) {
            $webError = "Web address is required!";
        } elseif (!preg_match($webRegex, $web)) {
            $webError = "Web address is incorrect";
        }

        if (empty($dob)) {
            $dobError = "Date of Birth is required!";
        } elseif (!preg_match($dobRegex, $dob)) {
            $dobError = "Incorrect Date or Format";
        }

        if (empty($_POST['gender'])) {
            $genderError = "Please select one";
        }

        if (empty($mob)) {
            $mobError = "Phone Number is required.";
        } elseif (!preg_match($mobRegex, $mob)) {
            $mobError = "Please enter a valid number.";
        }

        if (empty($info)) {
            $infoError = "Required";
        } elseif (!preg_match($infoRegex, $info)) {
            $infoError = "Must contain only alphaneumeric characters";
        }
        if (empty($fnameError) && empty($lnameError) && empty($nameError) && empty($emailError) && empty($passError) && empty($ipError) && empty($webError) && empty($dobError) && empty($genderError) && empty($mobError) && empty($infoError)) {

            $sql = "INSERT INTO `user-info` (`fname`, `mname`, `lname`, `email`, `password`, `ip`, `web`, `dob`, `gender`, `mob`, `info`) VALUES ('$fname', '$mname', '$lname', '$email', '$password', '$ip', '$web', '$dob', '{$_POST['gender']}', '$mob', '$info')";

            if (mysqli_query($conn, $sql)) {
                $dataEntryMessage=" Data has been successfully inserted into the database";

                $email_query = "SELECT * FROM `user-info` WHERE `email`='$email'";
                $mob_query = "SELECT * FROM `user-info` WHERE `mob`='$mob'";
                
            } else {
                $dataEntryMessage="Data cannot be inserted";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            max-width: 800px;
            width: 90%;
            margin: 2rem auto;
            border: 2px solid gray;
            padding: 1rem;
        }
        .error {
            color: red;
        }
        .join-name td input {
            width: 100px;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-around;
            max-width: 1200px;
            width: 95%;
            margin: auto;
            height: 50px;
        }
        a{
            text-decoration: none;
        }
        .user-info td, .user-info th{
            width: 500px;
        }
    </style>
    <title>Document</title>
</head>

<body>

    <div class="navbar">
            <div class="nav-items"><a href="/nn/form.php">Home</a></div>
            <div class="nav-items">About us</div>
            <div class="nav-items">Contact us</div>
            <div class="nav-items">Login</div>
            <div class="nav-items">Signup</div>
        </div>
        <div class="errMessage">
            <p><?php 
            echo"$dataEntryMessage";
            ?></p>
        </div>
    <div class="container">
        <h1>
            <center>Registration Form</center>
        </h1>
        <hr><br>
        <table>
            <tr>

            </tr>
            <form METHOD="POST" action="/nn/form.php">

                <tr class="join-name">
                    <th>
                        <label for="fname">First Name:</label>
                    </th>
                    <td colspan="3">
                        <input type="text" name="fname" id="fname">
                        <input type="text" name="mname" id="mname">
                        <input type="text" name="lname" id="lname">
                    </td>
                </tr>
                <tr>
                    <td class="error">
                        <?php
                        echo $fnameError;
                        ?>
                    </td>
                    <td class="error">
                        <?php
                        echo $lnameError;
                        ?>
                    </td>
                    <td class="error">
                        <?php
                        echo $nameError;
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <label for="email">Email:</label>
                    </th>
                    <td><input type="email" name="email" id="email"></td>
                    <td class="error">
                        <?php echo $emailError ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="password">Password:</label>
                    </th>
                    <td><input type="password" name="password" id="password"></td>
                    <td class="error">
                        <?php echo $passError ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="ip">Ip Address:</label>
                    </th>
                    <td><input type="text" name="ip" id="ip"></td>
                    <td class="error">
                        <?php echo $ipError ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="web">Personal Website:</label>
                    </th>
                    <td><input type="web" name="web" id="web"></td>
                    <td class="error">
                        <?php echo $webError ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="dob">Date of Birth</label>
                    </th>
                    <td>
                        <input type="text" name="dob" id="dob" placeholder="date-month-year">
                    </td>
                    <td class="error">
                        <?php echo $dobError ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="gender">Gender</label>
                    </th>
                    <td>
                        <input type="radio" name="gender" id="gender" value="male">Male
                        <input type="radio" name="gender" id="gender" value="female">Female
                        <input type="radio" name="gender" id="gender" value="other">Other
                    </td>
                    <td class="error">
                        <?php echo $genderError ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="mob">Mobile Number:</label>
                    </th>
                    <td><input type="number" name="mob" id="mob"></td>
                    <td class="error">
                        <?php echo $mobError ?>
                    </td>

                </tr>
                <tr>
                    <th>
                        <label for="info">Brief Info:</label>
                    </th>
                    <td>
                        <textarea name="info" id="info" cols="30" rows="30"></textarea>
                    </td>
                    <td class="error">
                        <?php echo $infoError ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <center>
                            <input type="submit" value="Register">
                        </center>
                    </td>
                </tr>

            </form>
        </table>
    </div>
    <div class="container">
    <h1>
            <center>Your Information</center>
        </h1>
        <hr><br>

        <table class="user-info">
            <tr>
                <th>Name:</th>
                <td><?php echo $cleanName ;?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $email;?></td>
            </tr>
            <tr>
                <th>Ip Address:</th>
                <td><?php echo $ip ;?></td>
            </tr>
            <tr>
                <th>Personal Website:</th>
                <td><?php echo $web;?></td>
            </tr>
            <tr>
                <th>Date of Birth:</th>
                <td><?php echo $dob;?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><?php echo $gender;?></td>
            </tr>
            <tr>
                <th>Mobile Number:</th>
                <td><?php echo $mob;?></td>
            </tr>
            <tr>
                <th>Brief Information:</th>
                <td><?php echo $info;?></td>
            </tr>
        </table>
    </div>
</body>

</html>