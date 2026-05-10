<?php
include "conn.php";

// Get form data from frontend
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];

// Check if username already exists
$check_sql = "SELECT * FROM sellers WHERE username='$username'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    echo "<div class='content' style='text-align:center;'>
            <h2>Registration Failed</h2>
            <p>Username already exists!</p >
            Go back to register
          </div>";
    exit;
}

// Insert seller data into database
$sql = "INSERT INTO sellers (username, password, phone) 
        VALUES ('$username', '$password', '$phone')";

if (mysqli_query($conn, $sql)) {
    echo "<div class='content' style='text-align:center;'>
            <h2>Registration Successful!</h2>
            <p>You can now login to publish cars</p >
            Go to login
          </div>";
} else {
    echo "<div class='content' style='text-align:center;'>
            <h2>Registration Failed</h2>
            <p>Error: " . mysqli_error($conn) . "</p >
            Go back and try again
          </div>";
}

mysqli_close($conn);
?>