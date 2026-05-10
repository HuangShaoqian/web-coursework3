<?php
session_start(); // Start session (required for session management)
include "conn.php";

// Get form data from frontend
$username = $_POST['username'];
$password = $_POST['password'];

// Query database to verify credentials
$sql = "SELECT * FROM sellers WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Login successful: save seller info to session
    $seller = mysqli_fetch_assoc($result);
    $_SESSION['seller_id'] = $seller['seller_id'];
    $_SESSION['username'] = $seller['username'];
    
    // Redirect to seller dashboard
    header("Location: seller_dashboard.php");
} else {
    echo "<div class='content' style='text-align:center;'>
            <h2>Login Failed</h2>
            <p>Invalid username or password!</p>
            <a href='user.html' class='back-btn'>Go back to login</a>
          </div>";
}

mysqli_close($conn);
?>