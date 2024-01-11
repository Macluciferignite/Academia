<?php
$servername = "localhost:3306"; // Replace with your database server name or IP address
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "project1"; // Replace with the name of the database you created

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Uncomment the line below if you want to set character set (optional)
// mysqli_set_charset($connection, "utf8");

// Now you have a valid $connection variable to use in your database queries
?>
