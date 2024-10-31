<?php

session_start();
include "config.php";


if (!isset($_COOKIE['username'])) {
   
    header("Location: login.php");
    exit();
}


if (empty($_SESSION['cart'])) {
 
    header("Location: products.php");
    exit();
}

$products = [];
$myquery = mysqli_query($connection, "SELECT * FROM `products`");
while ($row = mysqli_fetch_assoc($myquery)) {
    $products[$row['id']] = $row;
}

$totalAmount = 0;
foreach ($_SESSION['cart'] as $productId => $quantity) {
    $product = $products[$productId];
    $totalAmount += $product['price'] * $quantity;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 22px;
            color: #666;
            margin-bottom: 30px; 
        }
        img {
            max-width: 300px; 
            height: auto;
            display: block;
            margin: 0 auto; 
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
        <p>Total Amount: <?= $totalAmount ?></p>
        <img src="images\myQr.jpg" alt="QR Code">
    </div>
</body>
</html>

