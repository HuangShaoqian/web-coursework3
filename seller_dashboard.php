<?php
session_start();
// Restrict access to logged-in users only
if (!isset($_SESSION['seller_id'])) {
    header("Location: user.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <header class="header">
        <div class="logo">Car Sales Platform</div>
        <nav class="nav">
            <a href="homepage.html">Homepage</a>
            <a href="seller_dashboard.php">Dashboard</a>
            <a href="seller.html">Add Car</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="content">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>You have successfully logged in to the seller dashboard. You can now publish car information.</p>
        <div class="entry" style="grid-template-columns: 1fr; max-width: 400px; margin: 40px auto;">
            <div class="box">
                <h2>Publish New Car</h2>
                <p>Add information about the car you want to sell</p>
                <a href="seller.html">Publish Now</a>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>© 2025 Car Sales Platform. All Rights Reserved.</p>
    </footer>
</body>
</html>