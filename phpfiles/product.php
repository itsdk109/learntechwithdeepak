<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'ecommerce';

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id='$product_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
    <div class="product-details-container">
        <div class="product-image">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
        </div>
        <div class="product-info">
            <h2><?php echo $row['name']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <p class="price">₹<?php echo $row['price']; ?></p>
            <div class="buttons">
                <button onclick="addToCart(<?php echo $row['id']; ?>)">Add to Cart</button>
                <button onclick="buyNow(<?php echo $row['id']; ?>)">Buy Now</button>
            </div>
        </div>
    </div>
    <?php
    } else {
        echo "<p>Product not found.</p>";
    }
    ?>
    <script src="../javascript/script.js"></script>
</body>
</html>
