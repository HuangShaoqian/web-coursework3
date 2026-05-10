<?php
include "conn.php";

// Get search parameters (search by model and year as required)
$model = isset($_GET['model']) ? $_GET['model'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';

// Build query statement
$sql = "SELECT * FROM cars WHERE model LIKE '%$model%'";
if (!empty($year)) {
    $sql .= " AND year = '$year'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <header class="header">
        <div class="logo">Car Sales Platform</div>
        <nav class="nav">
            <a href=" ">Homepage</a >
            <a href="buyer.html">New Search</a >
            <a href="user.html">Seller Login</a >
        </nav>
    </header>

    <div class="content">
        <h1>Search Results</h1>
        <p>Search criteria: Model = "<?php echo $model; ?>"
            <?php if (!empty($year)) echo ", Year = " . $year; ?>
        </p >
        <hr style="margin: 20px 0;">

        <?php if (mysqli_num_rows($result) > 0) { ?>
            <div class="car-list">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="car-item">
                        <h3><?php echo $row['brand'] . ' ' . $row['model']; ?></h3>
                        <p><strong>Year:</strong> <?php echo $row['year']; ?></p >
                        <p><strong>Price:</strong> ¥<?php echo number_format($row['price'], 2); ?></p >
                        <p><strong>Description:</strong> <?php echo $row['description']; ?></p >
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p style="text-align: center; font-size: 1.2rem; color: #666;">
                No cars found matching your search criteria.
            </p >
            <p style="text-align: center;">
                <a href="buyer.html" class="back-btn">Try another search</a >
            </p >
        <?php } ?>
    </div>

    <footer class="footer">
        <p>© 2025 Car Sales Platform. All Rights Reserved.</p >
    </footer>
</body>
</html>