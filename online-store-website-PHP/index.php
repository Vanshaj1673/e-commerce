<!DOCTYPE html>
<html lang="en">
<head>
<title>Your website name</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

<style>
https://epicbootstrap.com/snippets/footer-dark
</style>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- <div class="header">
  <img src = "logo3.png" width="150" height="150"> 
  <h1> sport spirit <h1>
</div> -->

<div class="topnav">
   <a href="index.php">Home </a>
  
     <?php if(!isset($_COOKIE['username'])){ ?>
     <a href="login.php">Log in </a>
     <?php }?>
                 
  <a href="FAQ.php">FAQ</a>
  <a href="ContactUs.php">Contact Us</a>
  <?php if(isset($_COOKIE['username']) && $_COOKIE['usertype']=="admin"){ ?>
   <a href="Products.php">Products</a>
  <a href="addProducts.php">Add Products</a>
  <?php }?>
  
   <?php if(isset($_COOKIE['username']) ){ ?>
  <div style="float: right;vertical-align: middle;"> <a style=" color: white;display: inline;float: left;vertical-align: middle;"><?= $_COOKIE['username']?></a>&nbsp;&nbsp;<a href="logoff.php" class="">Logoff</a></div>
  <?php }?>
</div>

<div class="landingIMG">
  <img src="images/Logo.png" alt="Logo" class="logo">
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
                            <li><a href="addproducts.php">Add Products</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="product.php">Product</a></li>
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
                        <h3> Online Shop </h3>
                        <p>Communications is at the heart of e-commerce and community. </p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">All right reserved ©-Designed by Vanshaj-2024</p>
            </div>
        
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>


