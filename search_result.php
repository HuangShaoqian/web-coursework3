<?php
include "conn.php";

// Get search conditions
$brand = $_GET['brand'] ?? '';
$model = $_GET['model'] ?? '';
$year = $_GET['year'] ?? '';
$min_price = $_GET['min_price'] ?? '';
$max_price = $_GET['max_price'] ?? '';

// Build SQL query
$sql = "SELECT * FROM cars WHERE 1=1";

if (!empty($brand)) {
    $sql .= " AND brand LIKE '%$brand%'";
}
if (!empty($model)) {
    $sql .= " AND model LIKE '%$model%'";
}
if (!empty($year)) {
    $sql .= " AND year = '$year'";
}
if (!empty($min_price)) {
    $sql .= " AND price >= '$min_price'";
}
if (!empty($max_price)) {
    $sql .= " AND price <= '$max_price'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="logo">Car Selling Platform</div>
        <div class="nav">
            <a href=" ">Home</a >
            <a href="intro.html">Intro</a >
            <a href="user.html">User</a >
            <a href="buyer.html">Buyer</a >
            <a href="seller.html">Seller</a >
        </div>
    </div>

    <div class="buyer-container">
        <h1>Search Results</h1>

        <?php if (mysqli_num_rows($result) == 0): ?>
            <p>No cars found.</p >
        <?php else: ?>
            <?php while ($car = mysqli_fetch_assoc($result)): ?>
                <div class="car-item" style="background:#222; padding:20px; margin:15px 0; border-radius:10px; color:#fff;">
                    <h3 style="color:#3498db; margin:0 0 10px;"><?= $car['brand'] ?> <?= $car['model'] ?></h3>
                    <p>Year: <?= $car['year'] ?></p >
                    <p style="color:#2ecc71; font-weight:bold;">Price: ¥<?= $car['price'] ?></p >
                    <p>Description: <?= $car['description'] ?></p >
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="footer">
        <p>© 2026 Car Selling Website. All rights reserved.</p >
    </div>
</body>
</html>