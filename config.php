<?php

session_start();

$host = "10.180.50.215:3306"; 
$user = "yeseras1";
$password = "Its1b5?26"; 
$dbname = "p1"; 
$con = mysqli_connect($host, $user, $password,$dbname);
// database connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}