<?php
session_start();
// Restrict access to logged-in users only
if (!isset($_SESSION['seller_id'])) {
    header("Location: user.html");
    exit;
}

include "conn.php";

// Get current logged-in seller ID (foreign key)
$seller_id = $_SESSION['seller_id'];

// Get form data from frontend
$brand = $_POST['brand'];
$model = $_POST['model'];
$year = $_POST['year'];
$price = $_POST['price'];
$description = $_POST['description'];

// Insert car data into database (automatically linked to current seller)
$sql = "INSERT INTO cars (seller_id, brand, model, year, price, description)
        VALUES ('$seller_id', '$brand', '$model', '$year', '$price', '$description')";

if (mysqli_query($conn, $sql)) {
    echo "<div class='content' style='text-align:center;'>
            <h2>Car Published Successfully!</h2>
            <p>Your car information has been successfully listed</p >
            <a href=' ' class='back-btn'>Publish Another Car</a >
            <br><br>
            <a href='seller_dashboard.php' class='back-btn'>Back to Dashboard</a >
          </div>";
} else {
    echo "<div class='content' style='text-align:center;'>
            <h2>Publishing Failed</h2>
            <p>Error: " . mysqli_error($conn) . "</p >
            <a href='seller.html' class='back-btn'>Go back and try again</a >
          </div>";
}

mysqli_close($conn);
?>