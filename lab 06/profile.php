
<?php
$servername = "localhost";
$username= "root";
$password= "";
$database= "user_information";

$conn= mysqli_connect($servername,$username,$password,$database);

$search_name = "";
$result_set = array();

if (isset($_POST['search'])) {
    $search_name = $_POST['search_name'];
    $sql = "SELECT * FROM `user-info` WHERE  `fname` LIKE '%$search_name%'
    OR `lname` Like '%$search_name%'
    OR `mname` Like '%$search_name%'
    OR `email` Like '%$search_name%'
    OR `ip` Like '%$search_name%'
    OR `web` Like '%$search_name%'
    OR `dob` Like '%$search_name%'
    OR `gender` Like '%$search_name%'
    OR `mob` Like '%$search_name%'
    OR `info` Like '%$search_name%'
    ";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)){
        $result_set[] = $row;
    }
} else {
    $sql = "SELECT * FROM `user-info`";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)){
        $result_set[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        table,tr,td,th{
            border: 2px solid black;
            border-collapse:collapse;
        }
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
    </style>
</head>
<body>
    <div class="container">
        <h1>
            <center>user Information</center>
        </h1>
        <hr><br>
        
        <form method="post" action="">
            <label for="search_name">Search by Name:</label>
            <input type="text" name="search_name" id="search_name" value="<?php echo $search_name; ?>">
            <input type="submit" name="search" value="Search">
        </form>
        
        <table class="user-info">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>IP Address</th>
                <th>Website</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Brief info</th>
            </tr>
            <?php
            $num = 1;
            foreach ($result_set as $row) {

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT) ;

                echo "<tr>";
                echo "<td>$num</td>";
                $name = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];
                echo "<td>$name</td>";
                echo "<td>{$row['email']}</td>";
                // echo "<td>{$hashedPassword}</td>";
                echo "<td>{$row['ip']}</td>";
                echo "<td>{$row['web']}</td>";
                echo "<td>{$row['dob']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['mob']}</td>";
                echo "<td>{$row['info']}</td>";
                echo "</tr>";
                $num++;
            }
            ?>
        </table>
    </div>
</body>
</html>