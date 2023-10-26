<?php

$servername = "localhost";
$username = "root";
$password = '';
$database = "db";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else {
    echo "Connection Successfull";
  }


$xml = simplexml_load_file("lab7.xml");


foreach ($xml->children() as $data) {
    $sql = "INSERT INTO `table-1` (name,magnitude,distance) VALUES ('" . $data->name . "', '" . $data->magnitude . "', '" . $data->distance . "')";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>