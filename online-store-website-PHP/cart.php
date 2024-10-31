<?php
session_start();
include "config.php";


$products = [];
$myquery = mysqli_query($connection, "SELECT * FROM `products`");
while ($row = mysqli_fetch_assoc($myquery)) {
    $products[$row['id']] = $row;
}

if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $productId = $_GET['id'];
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="topnav">
        <a href="index.php">Home</a>
        <?php if (!isset($_COOKIE['username'])) { ?>
            <a href="login.php">Log in</a>
        <?php } ?>
        <a href="FAQ.php">FAQ</a>
        <a href="ContactUs.php">Contact Us</a>
        <?php if (isset($_COOKIE['username']) && $_COOKIE['usertype'] == "admin") { ?>
            <a href="Products.php">Products</a>
            <a href="addProducts.php">Add Products</a>
        <?php } ?>
        <?php if (isset($_COOKIE['username'])) { ?>
            <div style="float: right;vertical-align: middle;">
                <a style="color: white;display: inline;float: left;vertical-align: middle;"><?= $_COOKIE['username'] ?></a>&nbsp;&nbsp;
                <a href="logoff.php" class="">Logoff</a>
            </div>
        <?php } ?>
    </div>

    <div class="container">
        <h1>Your Cart</h1>
        <?php if (!empty($_SESSION['cart'])) { ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $productId => $quantity) {
                        $product = $products[$productId];
                        $productTotal = $product['price'] * $quantity;
                        $total += $productTotal;
                    ?>
                        <tr>
                            <td><?= $product['name'] ?></td>
                            <td><?= $quantity ?></td>
                            <td>INR  <?= number_format($product['price'], 2) ?></td>
                            <td>INR  <?= number_format($productTotal, 2) ?></td>
                            <td><a href="cart.php?action=remove&id=<?= $productId ?>" class="btn btn-danger">Remove</a></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                        <td colspan="2">INR  <?= number_format($total, 2) ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
        <?php } else { ?>
            <p>Your cart is empty.</p>
        <?php } ?>
        <a href="products.php" class="btn btn-secondary mt-3">Back to Products</a>
    </div>

    <footer>
        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Quick links</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="login.php">Log in</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <h3>About</h3>
                            <ul>
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 item text">
                            <h3>Online Shop</h3>
                            <p>Communications is at the heart of e-commerce and community.</p>
                        </div>
                        <div class="col item social">
                            <a href="#"><i class="icon ion-social-facebook"></i></a>
                            <a href="#"><i class="icon ion-social-twitter"></i></a>
                            <a href="#"><i class="icon ion-social-snapchat"></i></a>
                            <a href="#"><i class="icon ion-social-instagram"></i></a>
                        </div>
                    </div>
                    <p class="copyright">All right reserved @-Designed by Vanshaj-2024</p>
                </div>
            </footer>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
