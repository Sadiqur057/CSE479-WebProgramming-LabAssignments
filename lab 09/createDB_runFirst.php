<!-- Run this file once to create database and tables required to run the project -->

<?php
$server= 'localhost';
$user= 'root';
$pwd= '';
$db= 'users';

$conn= mysqli_connect($server,$user,$pwd,$db);
if($conn){
    echo "Database connected <br> <br>";
}

// Create database
$createDB = "CREATE DATABASE users";
mysqli_connect($conn,$createDB);

// Create table
$createTable= "CREATE TABLE `users`.`info` (`sno` INT(8) NOT NULL AUTO_INCREMENT , `id` VARCHAR(30) NOT NULL , `pass` VARCHAR(30) NOT NULL , `name` VARCHAR(30) NOT NULL , `email` VARCHAR(30) NOT NULL , `isAdmin` BOOLEAN NOT NULL , PRIMARY KEY (`sno`), UNIQUE (`id`), UNIQUE (`email`)) ENGINE = InnoDB";
mysqli_connect($conn,$createTable);

?>