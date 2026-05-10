<?php
// XAMPP default database configuration
$host = 'localhost';
$user = 'root';
$pwd  = '';
$dbname = 'carshop';

// Create connection
$conn = mysqli_connect($host, $user, $pwd, $dbname);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set UTF-8 encoding
mysqli_set_charset($conn, "utf8");
?>