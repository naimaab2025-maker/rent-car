<?php
// MySQL connection parameters
$host = "localhost";
$user = "root";
$password = "123";
$dbname = "rentcar";

// Create connection
$conn= mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";

