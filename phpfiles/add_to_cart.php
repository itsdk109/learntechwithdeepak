<?php
session_start();

$productId = $_GET['id'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!in_array($productId, $_SESSION['cart'])) {
    $_SESSION['cart'][] = $productId;
    $response = ['message' => 'Product added to cart successfully!'];
} else {
    $response = ['message' => 'Product is already in the cart!'];
}

echo json_encode($response);
?>
