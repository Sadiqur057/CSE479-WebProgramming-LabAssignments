<?php
$servername = "localhost";
$username = "root";
$password = '';
$database = "db";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

  $sql = "SELECT * FROM `table-1`";
  $result = mysqli_query($conn, $sql);
  
  echo "<table>";
  echo "<tr><th>name</th><th>magnitude</th><th>magnitude</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row['name'] . "</td><td>" . $row['magnitude'] . "</td><td>" . $row['distance'] . "</td></tr>";
  }
  echo "</table>";
  
  mysqli_close($conn);
?>